<?
 class PedidosController extends AppController {
  var $name = 'Pedidos';
  public $helpers = array("Html","Form", "Paginator");
  var $components = array("RequestHandler");
  var $uses = array('Pedido', 'Producto', 'Tipo','User', 'Cliente', 'Cadete', 'Item', 'Caja');
  //var $paginate = array('limit' => 50,'order' => array('Cliente.id' => 'asc'));
 
  
  function beforeFilter() {
     parent::beforeFilter();
     $this->layout = "board";
  }
 

  /**
   * Admin functions, only the admin user can uses these functions
   */
 
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


 
 
  function index($estado = "activos") {
     $this->getCadetes();
     $this->getProductos();

     $condition_form = " 1  ";
     $cliente = "";
     $numero_pedido = "";
     $tipo_pedido = "todos";

     //Armo el filtro de busqueda
     if ($this->request->is('post') ){
         $data =  $this->data;
         $condition_form = "1 ";

         //Estado
         $estado = $data["estado"];
         //Cliente
         $cliente = $data["cliente"];
         $condition_form .= " AND Cliente.nombre like '%".$cliente."%'";

         if ($data["numero_pedido"]) {
             $numero_pedido = $data["numero_pedido"];
             $condition_form .= " AND Pedido.id = ".$numero_pedido;
         }
         if ($data["tipo_pedido"] != "todos"){
             $tipo_pedido = $data["tipo_pedido"];
             $condition_form .= " AND Pedido.tipo = '".$tipo_pedido."'";

         }
     } else {
           //Pedidos Activos: Mesa Abierta, En Cocina, En Camino
           //Pedidos No Activos: Cerrado, Cancelado          
              $condition_estado = " 1 and ";       
              if ($estado == "activos") {
                  $condition_form .= " AND Pedido.estado = 'Mesa Abierta' or Pedido.estado = 'En Cocina' or Pedido.estado = 'En Camino' ";
               }
              if ($estado == "no_activos") {
                  $condition_form .= " AND Pedido.estado = 'Cancelado' or Pedido.estado = 'Cerrado'  ";
               }
     }


     //Consulta principal
     $pedidos = $this->Pedido->query("Select * from pedidos as Pedido
                                       left join clientes as Cliente on Pedido.cliente_id = Cliente.id
                                       left join cadetes as Cadete on Pedido.cadete_id = Cadete.id
                                       where $condition_form
                                       order by Pedido.fecha ASC");

     //Seteo las variables
     $this->set(compact("numero_pedido"));
     $this->set(compact("pedidos"));
     $this->set(compact("estado"));
     $this->set(compact("cliente"));
     $this->set(compact("tipo_pedido"));
     
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
     
         $this->ingresarCaja($this->Pedido->id);
       

        if ($ok) {
            $this->Session->setFlash('Se Cerro el pedido con éxito');
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
  // die;
   //print_r($this->data);
   //die;
 }


private function ingresarCaja($pedidoId){
  $caja = array();
  $pedido = $this->Pedido->find("first", array("condition" => array("id" => $pedidoId)));
  $ingreso = $pedido["Pedido"]["paga_con"];
  $egreso  = $pedido["Pedido"]["vuelto"];
  $total   = $pedido["Pedido"]["total"];
  $caja["Caja"]["ingresos"] = $ingreso;
  $caja["Caja"]["egresos"]  = $egreso;
  $caja["Caja"]["pedido_id"] = $pedidoId;
  $caja["Caja"]["tipo_movimiento_id"] = 3;
  $caja["Caja"]["user_id"] = $this->Auth->user("id");
  $caja["Caja"]["fecha"] = date("Y-m-d H:i:s");
  $caja["Caja"]["motivo"] = "Ingreso correspondiente al pedido nro $pedidoId, de un total de $total, el cliente pago con $ingreso y se dio un vuelto de $egreso";
  $this->Caja->Create();
  $this->Caja->save($caja);
}

private function saveData($data) {
  $pedido = array();
  $items = array();
  //print_r($data);
 // Array ( [Pedidos] => Array ( [Cliente] => Array ( [id] => 2 [nombre] => Enzo Francescolli ) [Productos] => Array ( [id] => 5 [precio] => 45.00 [cantidad] => 1 ) [total_pedido] => 173 [paga_con] => 200 [vuelto] => 27 [observaciones] => ) [tipo] => delivery [data[Pedidos] => Array ( [Mesa] => ) )
  if ($data["Pedidos"]["tipo"]!="mesa"){
      $pedido["cliente_id"] = $data["Pedidos"]["Cliente"]["id"];
      $pedido['nombre'] =  $data["Pedidos"]["nombre"];
      $pedido['direccion'] =  $data["Pedidos"]["direccion"];
      $pedido['telefono'] =  $data["Pedidos"]["telefono"];
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
  }

  if ( $ok_pedido ){
     $this->Item->create();
     $ok_item = $this->Item->saveAll($items);
  }


  //$this->redirect(array('action'=>'index'));
  return true;
}



  function admin_index() {
     $this->layout = "default";
     $pedidos = $this->Pedido->find("all", array("order" => "Pedido.fecha ASC"));
     $this->set(compact("pedidos"));
  }
}
?>
