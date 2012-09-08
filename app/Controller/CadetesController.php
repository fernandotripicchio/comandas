<?
 class CadetesController extends AppController {
  var $name = 'Cadetes';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Cadete');
  var $paginate = array('limit' => 50,'order' => array('Cadete.id' => 'asc'));
 
  
  function beforeFilter() {
     parent::beforeFilter();
  }



  /**
   * Admin functions, only the admin user can uses these functions
   */
 public  function admin_index() {
    $this->Cadete->recursive = 0;
    $this->set('cadetes', $this->paginate());
 
   }




  public function admin_add(){

    if (!empty($this->data)) {
	$this->Cadete->create();
        //$this->data['User']['registration_number'] = $this->User->oneWayEncryp($this->data["User"]["registration_number"], $this->data["User"]["email"]) ;
	if ($this->Cadete->save($this->data)) {
		$this->Session->setFlash(__('Se guardo el Cadete con éxito', true));
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Session->setFlash(__('El Cadete no se pudo guardar. Por favor intente de nuevo.', true));

	}

    }

 }


  public function admin_edit($id = null) {
    $this->Cadete->id = $id;
    if (!$this->Cadete->exists()) {
            throw new NotFoundException(__('Cadete invalido'));
    }
    if ($this->request->is('get')) {
        $this->request->data = $this->Cadete->read();

    } else {
        if ($this->Cadete->save($this->request->data)) {
            $this->Session->setFlash('Se modifico el Cadete con éxito');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('No se pudo modificar el Cadete.');
        }
    }
}



 public function admin_delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }
    if ($this->Cadete->delete($id)) {
        $this->Session->setFlash('El Cadete: ' . $id . ' ha sido eliminado.');
        $this->redirect(array('action' => 'index'));
    }
 }

    
 
}
?>
