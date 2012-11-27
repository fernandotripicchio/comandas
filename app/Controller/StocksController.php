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
     $stocks = $this->Stock->find("all", array("order" => "cantidad DESC", "recursive" => 0));
     $this->set(compact("stocks"));
  }

 public function admin_add() {
    $user_id = $this->Auth->User("id"); 
    $this->getProductos();
    $tipo=array("ingreso" => "Ingreso", "egreso" => "Egreso");
    if (!empty($this->data)) {
        $this->Stock->begin();        
	if ($this->registrarMovimientoStock($this->data)) {
                $this->Stock->commit();
		$this->Session->setFlash(__('Se guardo el movimiento de stock con éxito', true));
		$this->redirect(array('action'=>'index'));
	} else {
                $this->Stock->rollback();
		$this->Session->setFlash(__('El movimiento no se pudo guardar. Por favor intente de nuevo.', true));
                
	}

    }

    $this->set(compact("user_id"));    
    $this->set(compact("tipo"));
 }
 
 public function admin_movimientos($stock_id, $producto_id){
     $prod = $this->Producto->find("first",array("conditions" => array("id" => $producto_id), "recursive" => -1));
     $movimientos = $this->MovimientoStock->find("all", array("conditions" => array("stock_id" => $stock_id),"order" => "MovimientoStock.fecha DESC"));
     
     
     
     $this->set(compact("movimientos"));
     $this->set(compact("prod"));
 }
 
 private function registrarMovimientoStock($data){
     
     $ret = false;
     $producto_id = $data["Stock"]["producto_id"];
     $tipo        = $data["Stock"]["tipo"];
     $ingreso     = ($tipo == "ingreso") ? $data["Stock"]["ingreso"] : 0 ;
     $egreso      = ($tipo == "egreso") ? $data["Stock"]["egreso"] : 0 ;
     $usuario_id  = $data["Stock"]["user_id"];     
     $motivo      = $data["Stock"]["motivo"];
          
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
         
}
?>
