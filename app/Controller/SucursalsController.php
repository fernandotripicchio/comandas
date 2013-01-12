<?
 class SucursalsController extends AppController {
  var $name = 'Sucursals';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Sucursal');
  //var $paginate = array('limit' => 50,'order' => array('Sucursal.id' => 'asc'));
 
  
  function beforeFilter() {
     parent::beforeFilter();
  }



  /**
   * Admin functions, only the admin user can uses these functions
   */
 public  function admin_index() {
    
    $sucursales = $this->Sucursal->find("all");
    $this->set(compact('sucursales'));
 
   }




  public function admin_add(){

    if (!empty($this->data)) {
	$this->Sucursal->create();
	if ($this->Sucursal->save($this->data["sucursal"])) {
		$this->Session->setFlash(__('Se guardo la sucursal con éxito', true));
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Session->setFlash(__('La sucursal no se pudo guardar. Por favor intente de nuevo.', true));

	}

    }

 }


  public function admin_edit($id = null) {
    $this->Sucursal->id = $id;
    if (!$this->Sucursal->exists()) {
            throw new NotFoundException(__('Sucursal invalido'));
    }
    if ($this->request->is('get')) {
        $this->request->data = $this->Sucursal->read();

    } else {
        if ($this->Sucursal->save($this->request->data)) {
            $this->Session->setFlash('Se modifico la sucursal con éxito');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('No se pudo modificar la sucusal.');
        }
    }
}



 public function admin_delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }
    if ($this->Sucursal->delete($id)) {
        $this->Session->setFlash('La sucursal: ' . $id . ' ha sido eliminado.');
        $this->redirect(array('action' => 'index'));
    }
 }

    
 
}
?>
