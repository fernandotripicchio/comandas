<?
 class StocksController extends AppController {
  var $name = 'Stocks';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Stock', 'Producto', 'MovimientoStock');  
  var $paginate = array('limit' => 50,'order' => array('Stock.id' => 'asc'));
 
  
  function beforeFilter() {
      parent::beforeFilter();
      //$this->Auth->allow(array("admin_add", "admin_index"));
 } 
 

  /**
   * Admin functions, only the admin user can uses these functions
   */ 
 
 public  function admin_index() {
    //$this->MovimientoStocks->recursive = 0;
    //$this->set('stocks', $this->paginate());
     $movimientos = $this->MovimientoStock->find("all", array("order" => "fecha DESC", "recursive" => -1));
     $this->set(compact("movimientos"));
  }

 public function admin_add() {
    $user_id = $this->Auth->User("id"); 
    if (!empty($this->data)) {
	$this->Stock->create();
        //$this->data['User']['registration_number'] = $this->User->oneWayEncryp($this->data["User"]["registration_number"], $this->data["User"]["email"]) ;
	if ($this->Stock->save($this->data)) {
		$this->Session->setFlash(__('Se guardo el movimiento de stock con éxito', true));
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Session->setFlash(__('El movimiento no se pudo guardar. Por favor intente de nuevo.', true));
                
	}

    }

    $this->set(compact("user_id"));
 }
 

}
?>
