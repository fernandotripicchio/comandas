<?
 class PedidosController extends AppController {
  var $name = 'Pedidos';
  public $helpers = array("Html","Form", "Paginator");
  var $components = array("RequestHandler");
  var $uses = array('Pedido', 'Producto', 'Tipo','User', 'Cliente', 'Cadete', 'Item', 'Caja', 'Stock', 'MovimientoStock');
  //var $paginate = array('limit' => 50,'order' => array('Cliente.id' => 'asc'));
 
  
  function beforeFilter() {
     parent::beforeFilter();
     $this->layout = "board";
  }
 

  /**
   * Admin functions, only the admin user can uses these functions
   */
 
public function county()  {
    $sql  = "select * from country order by printable_name ASC";
    $county = $this->User->query($sql);
    $this->set(compact("county"));
}
        
  
public function getCadetes(){
    $cadetes   = $this->Cadete->find("all", array("order" => "nombre ASC","recursive" => -1));
    
    $new_cadetes = array();
    $i = 0;
    foreach ($cadetes as $cadete){
      $new_cadetes[$i] = array("id" => $cadete["Cadete"]["id"], "nombre" => $cadete["Cadete"]["nombre"]);
      $i++;
    }
    $cadetes = $new_cadetes;
    $this->set(compact("cadetes"));
}

public function getProductos(){
    $productos = $this->Producto->find("all", array("order" => "nombre ASC","recursive" => -1));

    $new_productos = array();
    $i = 0;
    foreach ($productos as $producto){
      $new_productos[$i] = array("id" => $producto["Producto"]["id"], "nombre" => $producto["Producto"]["nombre"]);
      $i++;
    }
    $productos = $new_productos;
    $this->set(compact("productos"));
}

 public function resetForm(){
     $pedidosSession = Array (  "cliente" => "", "estado" => "activos" ,"tipo_pedido" => "todos", "demora" => "0", "numero_pedido" =>"", "cadete" => 0, "producto" => 0,  "fecha_desde" =>"",  "fecha_hasta" =>"" );             
     $this->setSessionKeys("Pedidos", $pedidosSession);
     return $pedidosSession;
 }
 
 
 public function builtCondition($keys){
     $condition = " 1 ";
     foreach ($keys as $key => $value) {
         //echo "$key --- $value";
         if ($key == "cliente" && $value!="") {
             $condition.= " AND Cliente.nombre like '$value%' ";
         }
         if ($key == "tipo_pedido" && $value != "todos") {
             $condition.= " AND Pedido.tipo = '$value' ";
         }      
         
         if ($key == "numero_pedido" && $value){
             $condition.= " AND Pedido.id = $value ";
         }
         if ($key == "estado" && $value == "activos") {
             $condition .= " AND (Pedido.estado = 'Mesa Abierta' or Pedido.estado = 'En Cocina' or Pedido.estado = 'En Camino' )";
         }
         if ($key == "estado" && $value == "no_activos") {
             $condition .= " AND (Pedido.estado = 'Cancelado' or Pedido.estado = 'Cerrado')  ";
         }   
         
         if ($key == "fecha_desde" && $value != "") {             
             $fechaformatoingles= $this->fechaSpanishDB($value);
             $condition .= " AND Pedido.fecha >= '$fechaformatoingles'";
         }   
         
         if ($key == "fecha_hasta" && $value != "") {             
             $fechaformatoingles= $this->fechaSpanishDB($value);
             $condition .= " AND Pedido.fecha <= '$fechaformatoingles'";
         }   
         
         
         if ($key == "producto" && $value != "0") {             
             
             $condition .= " AND Pedido.id in  ( select pedido_id as id from items where producto_id = $value )";
         }           
         
         
         if ($key == "cadete" && $value != "0") {             
             
             $condition .= " AND Pedido.cadete_id = $value";
         }           
     }
     return $condition;
 }
 
  function index($estado = "activos") {
     $this->getCadetes();
     $this->getProductos();
     //Set Session variables
     if ($this->request->is('post') ){
                    if (isset($this->data["keys"])) {
                          $this->setSessionKeys("Pedidos", $this->data["keys"]);
                          $pedidosSession = $this->Session->read("Pedidos");
                          
                    } else {
                        die("Error en la busqueda");
                    }
     } else {
         $pedidosSession = $this->Session->read("Pedidos");
         if (!isset($pedidosSession)){
              $pedidosSession = $this->resetForm();   
         }
     }     
     
     if ($this->request->is('post')  && isset($this->data["Reset"])){
         $pedidosSession = $this->resetForm();
         
     }     
     
     if ($this->request->is('get') ){
          $this->Session->write("Pedidos.estado", $estado );
          $pedidosSession["estado"] = $estado;
     }    
     
     $condition_form = $this->builtCondition($pedidosSession);
     //Consulta principal
     $pedidos = $this->Pedido->query("Select Pedido.id, Pedido.estado, Pedido.fecha, Pedido.tipo, Pedido.demora_pedido,Pedido.mesa,Pedido.cadete_id,
                                       Cliente.nombre, Cadete.nombre from pedidos as Pedido
                                       left join clientes as Cliente on Pedido.cliente_id = Cliente.id
                                       left join cadetes as Cadete on Pedido.cadete_id = Cadete.id
                                       where $condition_form
                                       order by Pedido.fecha ASC");

     //Seteo las variables
     $this->set(compact("pedidos"));     
     $this->set(compact("pedidosSession"));
     
  }

  function add(){
    $options=array('delivery'=>'Delivery','mostrador'=>'Mostrador', 'mesa' => 'Mesa');
    $attributes=array('legend'=>false, 'default'=> 'delivery', 'class' => 'radioTipoPedido');
    $mesas = array();
    for($i=1; $i < 16; $i++){
        $mesas[$i] = "Mesa $i";
    }
    $attributes_mesas=array('legend'=>false, 'id' => 'pedidosMesa');

    
    if (!empty($this->data)) {
	if ($this->saveData($this->data)) {
		$this->Session->setFlash(__('Se guardo el pedido con éxito', true));
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Session->setFlash(__('El pedido no se pudo guardar. Por favor intente de nuevo.', true));

	}

    }

    $this->set(compact("options"));
    $this->set(compact("attributes"));
    $this->set(compact("mesas"));
    $this->set(compact("attributes_mesas"));
  }


 function cancelar($id = null) {
    $this->Pedido->id = $id;
    if (!$this->Pedido->exists()) {
            throw new NotFoundException(__('Pedido invalido'));
    }

    if ($this->request->is('get')) {
        $this->request->data = $this->Pedido->read();
        $pedido = $this->request->data["Pedido"];
        $items = $this->getItems($id);
        $this->set(compact("items"));        
        $this->set(compact("pedido"));
    } else {
         
         $ok = $this->Pedido->save($this->request->data["Pedidos"]);
         
        
        if ($ok) {
           
            $this->Session->setFlash('Se cancelo con éxito');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('No se pudo cancelar el pedido.');
        }
    }
 }


 function cerrar($id = null) {
     
    $this->Pedido->id = $id;
    if (!$this->Pedido->exists()) {
            throw new NotFoundException(__('Pedido invalido'));
    }

    if ($this->request->is('get')) {
        $this->request->data = $this->Pedido->read();
        $pedido = $this->request->data["Pedido"];
        $items = $this->getItems($id);
        $this->set(compact("items"));        
        $this->set(compact("pedido"));
    } else {
        
         $ok = $this->Pedido->save($this->request->data["Pedidos"]);
         
         //Cierro la caja         
         $this->ingresarCaja($id);
         $this->registrarStock($id);
        if ($ok) {
            $this->Session->setFlash("Se Cerro el pedido $id con éxito");
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('No se pudo cancelar el pedido.');
        }
    }
 }

 
function show($id = null) {
    $pedido = $this->Pedido->find("first", array("conditions" => array("Pedido.id" => $id),"recursive" => -1));
    $items = $this->getItems($id);
    $this->set(compact("items"));
    $this->set(compact("pedido"));
} 

function edit($id = null) {
    $this->Pedido->id = $id;
    if (!$this->Pedido->exists()) {
            throw new NotFoundException(__('Pedido invalido'));
    }
    if ($this->request->is('get')) {
        $this->request->data = $this->Pedido->read();
        $pedido = $this->request->data["Pedido"];
        $items = $this->getItems($id);
        $this->set(compact("items"));         
        $this->set(compact("pedido"));
    } else {
        if ($this->Pedido->save($this->request->data)) {
            $this->Session->setFlash('Se modifico el pedido con éxito');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('No se pudo modificar el pedido.');
        }
    }
}


function getItems($pedidoId){
    $sql = "Select Item.precio, Producto.nombre from items Item
            inner join productos Producto on Producto.id = Item.producto_id
            where Item.pedido_id = $pedidoId";
    $items = $this->Item->query($sql);
    return $items;
}

  function add_productos(){
    $this->layout = 'ajax';
    $productos = $this->Producto->find("all",array("order" => array("Tipo.nombre, Producto.nombre ASC"),"recursive" => 1));
    $tipos     = $this->Tipo->find("all", array("order" => array("Tipo.nombre ASC"),  "recursive" => -1));
    $this->set(compact("productos"));
    $this->set(compact("tipos"));
  }

  function add_clientes(){
    $this->layout = 'ajax';
    $this->paginate = array(
        'Cliente' => array(
            'limit' => 20,
            'order' => array('Cliente.id' => 'desc')
        )
    );
    $clientes = $this->paginate('Cliente');
     $this->set(compact("clientes"));

  }


 public function actions_pedidos(){
   if ($this->data["asignar_cadete"] == "Asignar Cadetes"){
       $cadetes = $this->data["Cadetes"];
       foreach ($cadetes as $key => $cadete) {
              $pedido = array();
              $pedido["Pedido"]["id"] = $key;
              $pedido["Pedido"]["cadete_id"] = $cadete;
              $pedido["Pedido"]["estado"] = "En Camino";
              $pedido["Pedido"]["demora_pedido"] = date("Y-m-d H:i:s");
              $this->Pedido->save($pedido);
              
       }
   }
   $this->redirect(array('action' => 'index'));
 }


 private function registrarStock($pedidoId){
    $items = $this->Item->find("all", array("conditions" => array("pedido_id" => $pedidoId), "recursive" => 0));
    $pedido_id = $pedidoId;
    foreach ($items as $item) {
        if ($item["Producto"]["tipo_id"] == "8") {
            $cantidad = $item["Item"]["cantidad"];
            $producto_id = $item["Item"]["producto_id"];
            $this->registrarMovimientoStock($pedido_id, $producto_id, $cantidad);
            
        }
    }
    
 }
 
 private function registrarMovimientoStock($pedido_id, $producto_id, $cantidad){
     
     $ret = false;
     $tipo        = "egreso";
     $ingreso     = 0 ;
     $egreso      =  $cantidad ;
     $usuario_id  = $this->Auth->user("id");     
     $motivo      = "Se descuenta $cantidad por uso en pedido nro: $pedido_id";
          
     $result_stock = $this->Stock->find('first', array('conditions' => array('Stock.producto_id' => $producto_id) , "recursive" => -1 ));
     //Veo si guardo o actualizo
     $stock = $mov_stock = array();
     
     $stock["producto_id"] = $producto_id;

     $mov_stock["tipo"]        = $tipo;
     $mov_stock["ingreso"]     = $ingreso;
     $mov_stock["egreso"]      = $egreso;
     $mov_stock["fecha"]       = date("Y-m-d H:i:s");
     $mov_stock["usuario_id"]  = $usuario_id;
     $mov_stock["motivo"]      = $motivo;
     
     //Si no hay stock lo creo
     if (!$result_stock) {
           $stock["cantidad"] = $ingreso;
           $this->Stock->create();
           $ret = $this->Stock->save($stock);
           $stock_id = $this->Stock->id;           
           if ($ret ) {
              $mov_stock["stock_id"] = $stock_id;
              $this->MovimientoStock->create();
              $this->MovimientoStock->save($mov_stock);
           } else {
               $ret = false;
           }
           
           
     } else {
           $stock["cantidad"] = $ingreso;
           $stock["id"] = $result_stock["Stock"]["id"];
           $stock["cantidad"] = $result_stock["Stock"]["cantidad"] + ( $tipo == "ingreso" ? $ingreso : -1*$egreso);               
           $ret = $this->Stock->save($stock);           
           if ( $ret ) {
              $mov_stock["stock_id"] = $stock["id"];
              $this->MovimientoStock->create();
              $this->MovimientoStock->save($mov_stock);
           } else {
               $ret = false;
           }
     }
     return $ret;
     
 }
 
 
 
private function ingresarCaja($pedidoId){
  $caja = array();

  $pedido = $this->Pedido->find("first", array("conditions" => array("Pedido.id" => $pedidoId), "recursive" => -1));
  
  $ingreso = ($pedido["Pedido"]["tipo"] == "mesa") ? $pedido["Pedido"]["total"] : $pedido["Pedido"]["paga_con"];
  $egreso  = $pedido["Pedido"]["vuelto"];
  $total   = $pedido["Pedido"]["total"];
  
  //print_r($pedido["Pedido"]);
  //echo $ingreso.".....";
  //die;
  $caja["Caja"]["ingresos"] = $ingreso;
  $caja["Caja"]["egresos"]  = $egreso;
  $caja["Caja"]["pedido_id"] = $pedidoId;
  $caja["Caja"]["tipo_movimiento_id"] = 3;
  $caja["Caja"]["user_id"] = $this->Auth->user("id");
  $caja["Caja"]["fecha"] = date("Y-m-d H:i:s");
  $caja["Caja"]["motivo"] = "Ingreso correspondiente al pedido nro $pedidoId, de un total de $total, el cliente pago con $ingreso y se dio un vuelto de $egreso";
  //print_r($caja);
  //die;
  $this->Caja->Create();
  $this->Caja->save($caja);
}



//Function que guarda el nuevo pedido
private function saveData($data) {
  $pedido = array();
  $items = array();
  if ($data["Pedidos"]["tipo"]!="mesa"){
      if ($data["Pedidos"]["Cliente"]["nuevo"] == "1") {
          $cliente = array();
          $cliente["nombre"]    = $data["Pedidos"]["nombre"];
          $cliente["direccion"] = $data["Pedidos"]["direccion"];
          $cliente["telefono"] = $data["Pedidos"]["telefono"];

          $this->Cliente->create();
          $this->Cliente->save($cliente);
          $pedido["cliente_id"] = $this->Cliente->id;
          //print_r($pedido);
          //die();

      } else {
          $pedido["cliente_id"] = $data["Pedidos"]["Cliente"]["id"];
      }

  }
  $pedido["tipo"]  = $data["Pedidos"]["tipo"];  
  $pedido["total"]  = $data["Pedidos"]["total_pedido"];  
  $pedido["observaciones"]  = $data["Pedidos"]["observaciones"];
  $pedido["fecha"] = date('Y-m-d H:i:s');
  $pedido["user_id"] = $this->Auth->User("id");


  if ($pedido["tipo"] == "mesa"){
    $estado = "Mesa Abierta";
    $pedido["paga_con"]  = 0;
    $pedido["vuelto"]  = 0;
    $pedido["mesa"] =$data["Pedidos"]["mesa"];

  }
  else {
    $estado = "En Cocina";
    $pedido["paga_con"]  = $data["Pedidos"]["paga_con"];
    $pedido["vuelto"]  = $data["Pedidos"]["vuelto"];
    $pedido["mesa"] = 0;
  }
  $pedido["estado"] = $estado;




  $this->Pedido->create();
  $ok_pedido = $this->Pedido->save($pedido);
  $pedidoId = $this->Pedido->id;


  //Guardo Productos
  $productos = $data["Producto"];
  $i = 0;
  foreach ($productos as $producto){
    $items[$i]  = array();
    $nuevo_item = array();

    $nuevo_item["Item"]["producto_id"]      = $producto["id"];
    $nuevo_item["Item"]["pedido_id"]        = $pedidoId;
    $nuevo_item["Item"]["precio"]           = $producto["precio"];
    $nuevo_item["Item"]["cantidad"]         = $producto["cantidad"];
    $nuevo_item["Item"]["observaciones"]    = $producto["observaciones"];
    $items[$i] = $nuevo_item;
    $i++;
    
    //Generar el Stock
  }

  if ( $ok_pedido ){
     $this->Item->create();
     $ok_item = $this->Item->saveAll($items);
  }
  return true;
}



  function admin_index() {
     $this->layout = "default";
     $pedidos = $this->Pedido->find("all", array("order" => "Pedido.fecha ASC"));
     $this->set(compact("pedidos"));
  }
}
?>
