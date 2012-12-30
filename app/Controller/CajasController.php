<?
 class CajasController extends AppController {
  var $name = 'Cajas';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Caja', 'TipoMovimiento', 'User');
  var $paginate = array('limit' => 50,'order' => array('Caja.id' => 'asc'));
 
  
  function beforeFilter() {
     parent::beforeFilter();
  }


 public function getTipos(){
    $tipos = $this->TipoMovimiento->find("all", array("conditions" => array("activo" => "1"),"order" => "nombre ASC","recursive" => -1));

    $new_tipos = array();
    $i = 0;
    foreach ($tipos as $tipo){
      $new_tipos[$i] = array("id" => $tipo["TipoMovimiento"]["id"], "tipo" => $tipo["TipoMovimiento"]["tipo"],"nombre" => $tipo["TipoMovimiento"]["nombre"]);
      $i++;
    }
    $tipos = $new_tipos;
    $this->set(compact("tipos"));
 }


 public function getUsers(){
    $users = $this->User->find("all", array("order" => "nombre ASC","recursive" => -1));

    $new_users = array();
    $i = 0;
    foreach ($users as $user){
      $new_users[$user["User"]["id"]] =  $user["User"]["nombre"];
      $i++;
    }
    $users = $new_users;
    $this->set(compact("users"));
 }
 
 

  /**
   * Admin functions, only the admin user can uses these functions
   */
  public  function admin_index() {
    $this->Caja->recursive = 0;
    $this->getTipos();
    $this->getUsers();  
    $conditions = " 1 ";    
    $cajas = $this->Caja->query("Select * from cajas as Caja
                                       left join users as User on Caja.user_id = User.id
                                       left join tipo_movimientos TipoMovimiento on Caja.tipo_movimiento_id = TipoMovimiento.id
                                       where $conditions
                                       order by Caja.fecha DESC");
     $this->set(compact("cajas"));
 
   }

  public  function index() {
    $this->layout = "board";
    //$this->Caja->recursive = 0;
    $this->getTipos();
    $this->getUsers();
    $conditions = " 1 ";

    $conditions .= " AND  Caja.fecha >= CURDATE()";
    $cajas = $this->Caja->query("Select * from cajas as Caja
                                       left join users as User on Caja.user_id = User.id
                                       left join tipo_movimientos TipoMovimiento on Caja.tipo_movimiento_id = TipoMovimiento.id
                                       where $conditions
                                       order by Caja.fecha DESC");
     $this->set(compact("cajas"));   

   }

  public function add(){
    $this->layout = "board";
    
    $this->getTipos();
    $this->getUsers();
    if (!empty($this->data)) {
	$this->Caja->create();
        if ($this->Caja->save($this->data)) {
		$this->Session->setFlash(__('Se guardo la caja con éxito', true));
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Session->setFlash(__('La caja no se pudo guardar. Por favor intente de nuevo.', true));

	}


    }
    $user_id = $this->Auth->user("id");
    $this->set(compact("user_id"));

 }




  public function admin_add(){

    $this->getTipos();
    $this->getUsers();
    if (!empty($this->data)) {
	$this->Caja->create();
        if ($this->Caja->save($this->data)) {
		$this->Session->setFlash(__('Se guardo la caja con éxito', true));
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Session->setFlash(__('La caja no se pudo guardar. Por favor intente de nuevo.', true));

	}


    }
    $user_id = $this->Auth->user("id");
    $this->set(compact("user_id"));

 }


  public function admin_edit($id = null) {
    $this->Caja->id = $id;
    if (!$this->Caja->exists()) {
            throw new NotFoundException(__('Caja invalido'));
    }
    if ($this->request->is('get')) {
        $this->request->data = $this->Caja->read();

    } else {
        if ($this->Caja->save($this->request->data)) {
            $this->Session->setFlash('Se modifico el Caja con éxito');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('No se pudo modificar la caja.');
        }
    }
}



 public function admin_delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }
    if ($this->Caja->delete($id)) {
        $this->Session->setFlash('La caja: ' . $id . ' ha sido eliminado.');
        $this->redirect(array('action' => 'index'));
    }
 }
 
 
 public function cerrar(){
   $this->layout = "board";     
     
 }

    
 
}
?>
