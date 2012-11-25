<?
 class StocksController extends AppController {
  var $name = 'Stocks';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Stock', 'Producto', 'MovimientoStock', 'Producto');  
  var $paginate = array('limit' => 50,'order' => array('Stock.id' => 'asc'));
 
  
  function beforeFilter() {
      parent::beforeFilter();
      //$this->Auth->allow(array("admin_add", "admin_index"));
 } 
 

 public function getProductos(){
    $productos = $this->Producto->find("all", array("conditions" => array("activo" => "1", "tipo_id" => 8),"order" => "nombre ASC","recursive" => -1));
    $ret = array();
    foreach ($productos as $producto){
      $ret[$producto["Producto"]["id"]] = $producto["Producto"]["nombre"];      
    }
    
    $productos = $ret ;
    $this->set(compact("productos"));
 } 
 
  /**
   * Admin functions, only the admin user can uses these functions
   */ 
 
 public  function admin_index() {
     $this->getProductos();
     $movimientos = $this->MovimientoStock->find("all", array("order" => "fecha DESC", "recursive" => 0));
     $this->set(compact("movimientos"));
  }

 public function admin_add() {
    $user_id = $this->Auth->User("id"); 
    $this->getProductos();
    $tipo=array("ingreso" => "Ingreso", "egreso" => "Egreso");
    if (!empty($this->data)) {
        //$this->registrarMovimientoStock($this->data);
	//$this->Stock->create();
        //$this->MovimientoStock->create();
        //$this->data['User']['registration_number'] = $this->User->oneWayEncryp($this->data["User"]["registration_number"], $this->data["User"]["email"]) ;
	if ($this->registrarMovimientoStock($this->data)) {
		$this->Session->setFlash(__('Se guardo el movimiento de stock con éxito', true));
		//$this->redirect(array('action'=>'index'));
	} else {
		$this->Session->setFlash(__('El movimiento no se pudo guardar. Por favor intente de nuevo.', true));
                
	}

    }

    $this->set(compact("user_id"));    
    $this->set(compact("tipo"));
 }
 

 
 private function registrarMovimientoStock($data){
     
     
     $producto_id = $data["Stock"]["producto_id"];
     $tipo        = $data["Stock"]["tipo"];
     $ingreso     = ($tipo == "ingreso") ? $data["Stock"]["ingreso"] : 0 ;
     $egreso      = ($tipo == "egreso") ? $data["Stock"]["egreso"] : 0 ;
     $usuario_id  = $data["Stock"]["user_id"];     
          
     //Me fijo que haya stock para ese producto
     $sql = "select * from stocks Stock where producto_id = $producto_id limit 1";
     $result_stock = $this->Stock->query($sql);
     
     
     //Veo si guardo o actualizo
     $stock = $mov_stock = array();
     
     $stock["producto_id"] = $producto_id;

     $mov_stock["tipo"]        = $tipo;
     $mov_stock["ingreso"]     = $ingreso;
     $mov_stock["egreso"]      = $egreso;
     $mov_stock["fecha"]       = date("Y-m-d H:i:s");
     $mov_stock["usuario_id"]  = $usuario_id;
     
     //Si no hay stock lo creo
     print_r($result_stock);
     
     if (isset($result_stock) && count($result_stock[0]) == 0) {
           $stock["cantidad"] = $ingreso;
           $this->Stock->create();
           $this->Stock->save($stock);
           $stock_id = $this->Stock->id;
           
           //registro movi
           $mov_stock["stock_id"] = $stock_id;
           $this->MovimientoStock->create();
           $this->MovimientoStock->save($mov_stock);
           
     } else {
           $stock["cantidad"] = $ingreso;
           $stock["id"] = $result_stock[0]["Stock"]["id"];
           $stock["cantidad"] = $stock["cantidad"] + ( $tipo == "ingreso" ? $ingreso : -1*$egreso);          
           
     }
     return true;
     
 }
         
}
?>
