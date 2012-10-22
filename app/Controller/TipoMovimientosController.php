<?
 class TipoMovimientosController extends AppController {
  var $name = 'TipoMovimientos';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('TipoMovimiento');
  var $paginate = array('limit' => 50,'order' => array('TipoMovimiento.id' => 'asc'));
 
  
  function beforeFilter() {
     parent::beforeFilter();
  }



  /**
   * Admin functions, only the admin user can uses these functions
   */

  public function admin_add(){

    if (!empty($this->data)) {
	$this->TipoMovimiento->create();
        //$this->data['User']['registration_number'] = $this->User->oneWayEncryp($this->data["User"]["registration_number"], $this->data["User"]["email"]) ;
	if ($this->TipoMovimiento->save($this->data)) {
		$this->Session->setFlash(__('Se guardo el Tipo Movimiento con éxito', true));
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Session->setFlash(__('El Tipo Movimiento no se pudo guardar. Por favor intente de nuevo.', true));

	}

    }

 }
  public  function admin_index() {
    $this->TipoMovimiento->recursive = 0;
    $this->set('tipos', $this->paginate());
 
   }






  public function admin_edit($id = null) {
    $this->TipoMovimiento->id = $id;
    if (!$this->TipoMovimiento->exists()) {
            throw new NotFoundException(__('Tipo Movimiento invalido'));
    }
    if ($this->request->is('get')) {
        $this->request->data = $this->TipoMovimiento->read();

    } else {
        if ($this->TipoMovimiento->save($this->request->data)) {
            $this->Session->setFlash('Se modifico el Tipo Movimiento con éxito');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('No se pudo modificar la Tipo Movimiento.');
        }
    }
}



 public function admin_delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }
    if ($this->TipoMovimiento->delete($id)) {
        $this->Session->setFlash('La TipoMovimiento: ' . $id . ' ha sido eliminado.');
        $this->redirect(array('action' => 'index'));
    }
 }

    
 
}
?>
