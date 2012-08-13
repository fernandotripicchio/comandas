<?
 class ProductosController extends AppController {
  var $name = 'Productos';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Producto');
  var $paginate = array('limit' => 50,'order' => array('Producto.id' => 'asc'));
 
  
  function beforeFilter() {
     parent::beforeFilter();
  }
 

  /**
   * Admin functions, only the admin user can uses these functions
   */
 

 
 
  function admin_index() {
    $this->Producto->recursive = 0;
    $this->set('productos', $this->paginate());
 
   }


public function admin_add(){

    if (!empty($this->data)) {
	$this->Producto->create();
        //$this->data['User']['registration_number'] = $this->User->oneWayEncryp($this->data["User"]["registration_number"], $this->data["User"]["email"]) ;
	if ($this->Producto->save($this->data)) {
		$this->Session->setFlash(__('Se guardo el producto con éxito', true));
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Session->setFlash(__('El producto no se pudo guardar. Por favor intente de nuevo.', true));

	}

    }

 }


  public function admin_edit($id = null) {
    $this->Producto->id = $id;
    if (!$this->Producto->exists()) {
            throw new NotFoundException(__('Producto invalido'));
    }
    if ($this->request->is('get')) {
        $this->request->data = $this->Producto->read();

    } else {
        if ($this->Producto->save($this->request->data)) {
            $this->Session->setFlash('Se modifico el producto con éxito');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('No se pudo modificar el producto.');
        }
    }
}



public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }
    if ($this->Producto->delete($id)) {
        $this->Session->setFlash('El producto: ' . $id . ' ha sido eliminado.');
        $this->redirect(array('action' => 'index'));
    }
}

    
 
}
?>
