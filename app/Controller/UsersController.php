<?
 class UsersController extends AppController {
  var $name = 'Users';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('User');  
  var $paginate = array('limit' => 50,'order' => array('User.id' => 'asc'));
 
  
  function beforeFilter() {

     parent::beforeFilter();
 } 
 

  /**
   * Admin functions, only the admin user can uses these functions
   */
 

 
 
  function index() {
  
 
 }
 
 

 public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect());
        } else {
            $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
        }
    }
}

    
 
}
?>
