<?
 class PedidosController extends AppController {
  var $name = 'Pedidos';
  public $helpers = array("Html","Form", "Paginator");
  var $components = array("RequestHandler");
  var $uses = array('Pedido', 'Producto', 'Tipo','User', 'Cliente');
  //var $paginate = array('limit' => 50,'order' => array('Cliente.id' => 'asc'));
 
  
  function beforeFilter() {
     parent::beforeFilter();
     $this->layout = "board";
  }
 

  /**
   * Admin functions, only the admin user can uses these functions
   */
 

 
 
  function index() {

     $pedidos = $this->Pedido->find("all", array("order" => "Pedido.fecha ASC"));
     $this->set(compact("pedidos"));
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


  function edit($id = null) {
//      $options=array('delivery'=>'Delivery','mostrador'=>'Mostrador', 'mesa' => 'Mesa');
//    $attributes=array('legend'=>false, 'default'=> 'delivery', 'class' => 'radioTipoPedido');
//    $mesas = array();
//    for($i=1; $i < 16; $i++){
//        $mesas[$i] = "Mesa $i";
//    }
//    $attributes_mesas=array('legend'=>false, 'id' => 'pedidosMesa');

    $this->Pedido->id = $id;
    if (!$this->Pedido->exists()) {
            throw new NotFoundException(__('Pedido invalido'));
    }
    if ($this->request->is('get')) {
        $this->request->data = $this->Pedido->read();

    } else {
        if ($this->Pedido->save($this->request->data)) {
            $this->Session->setFlash('Se modifico el pedido con éxito');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('No se pudo modificar el pedido.');
        }
    }
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
    //$clientes = $this->Cliente->find("all",array("order" => array("nombre ASC"),"recursive" => -1));
    
    // similar to findAll(), but fetches paged results
  //  
   
    $this->paginate = array(
        'Cliente' => array(
            'limit' => 20,
            'order' => array('Cliente.id' => 'desc')
        )
    );
    $clientes = $this->paginate('Cliente');
     $this->set(compact("clientes"));

  }

private function saveData($data) {
  $this->Pedido->create();
  $pedido = array();
  //print_r($data);
 // Array ( [Pedidos] => Array ( [Cliente] => Array ( [id] => 2 [nombre] => Enzo Francescolli ) [Productos] => Array ( [id] => 5 [precio] => 45.00 [cantidad] => 1 ) [total_pedido] => 173 [paga_con] => 200 [vuelto] => 27 [observaciones] => ) [tipo] => delivery [data[Pedidos] => Array ( [Mesa] => ) )
  if ($data["Pedidos"]["tipo"]!="mesa"){
      $pedido["cliente_id"] = $data["Pedidos"]["Cliente"]["id"];
  }
  $pedido["tipo"]  = $data["Pedidos"]["tipo"];
  
  $pedido["total"]  = $data["Pedidos"]["total_pedido"];  
  $pedido["observaciones"]  = $data["Pedidos"]["observaciones"];
  $pedido["fecha"] = date('Y-m-d H:i:s');

  if ($pedido["tipo"] == "mesa"){
    $estado = "Abierto";
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
  $ok =  $this->Pedido->save($pedido);
  $this->redirect(array('action'=>'index'));
  return true;
}



  function admin_index() {
     $this->layout = "default";
     $pedidos = $this->Pedido->find("all", array("order" => "Pedido.fecha ASC"));
     $this->set(compact("pedidos"));
  }
}
?>
