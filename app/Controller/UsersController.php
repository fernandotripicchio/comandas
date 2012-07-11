<?
 class UsersController extends AppController {
  var $name = 'Users';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('User');  
  var $paginate = array('limit' => 50,'order' => array('User.id' => 'asc'));
 
  
  function beforeFilter() {
     
     parent::beforeFilter();
     $this->Auth->allow(array("add", "logout"));
 } 
 

  /**
   * Admin functions, only the admin user can uses these functions
   */
 

 
 
  function index() {
    $this->set('users', $this->User->find('all'));
  }

 function add(){
    
    if (!empty($this->data)) {
	$this->User->create();
        //$this->data['User']['registration_number'] = $this->User->oneWayEncryp($this->data["User"]["registration_number"], $this->data["User"]["email"]) ;
	if ($this->User->save($this->data)) {
		$this->Session->setFlash(__('The User has been saved', true));
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Session->setFlash(__('The User could not be saved. Please try again.', true));
                $this->redirect(array('action'=>'index'));
	}

    }

 }
 

 public function login() {

    $this->layout = "login";

    if ($this->request->is('post')) {
        
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect());
        } else {
		

            $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
        }
    }
}



public function logout() {
    $this->redirect($this->Auth->logout());
}
    
 
}
?>
