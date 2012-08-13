<?
 class ClientesController extends AppController {
  var $name = 'Clientes';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Cliente');
  var $paginate = array('limit' => 50,'order' => array('Cliente.id' => 'asc'));
 
  
  function beforeFilter() {
     parent::beforeFilter();
  }
 
  /**
   * Admin functions, only the admin user can uses these functions
   */
 

 
 
public  function admin_index() {
    $this->Cliente->recursive = 0;
    $this->set('clientes', $this->paginate());
 
   }


public function admin_add(){

    if (!empty($this->data)) {
	$this->Cliente->create();
        //$this->data['User']['registration_number'] = $this->User->oneWayEncryp($this->data["User"]["registration_number"], $this->data["User"]["email"]) ;
	if ($this->Cliente->save($this->data)) {
		$this->Session->setFlash(__('Se guardo el cliente con éxito', true));
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Session->setFlash(__('El cliente no se pudo guardar. Por favor intente de nuevo.', true));

	}

    }

 }


  public function admin_edit($id = null) {
    $this->Cliente->id = $id;
    if (!$this->Cliente->exists()) {
            throw new NotFoundException(__('Cliente invalido'));
    }
    if ($this->request->is('get')) {
        $this->request->data = $this->Cliente->read();

    } else {
        if ($this->Cliente->save($this->request->data)) {
            $this->Session->setFlash('Se modifico el cliente con éxito');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('No se pudo modificar el cliente.');
        }
    }
}



public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }
    if ($this->Cliente->delete($id)) {
        $this->Session->setFlash('El cliente: ' . $id . ' ha sido eliminado.');
        $this->redirect(array('action' => 'index'));
    }
}

    
 
}
?>
