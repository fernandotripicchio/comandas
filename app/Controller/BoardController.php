<?
 class BoardController extends AppController {
  var $name = 'Board';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Producto');
  //var $paginate = array('limit' => 50,'order' => array('Producto.id' => 'asc'));
 
  
  function beforeFilter() {
     parent::beforeFilter();
     $this->layout = "board";
  }
 

  /**
   * Admin functions, only the admin user can uses these functions
   */
 

 
 
  function index() {

 
   }


   
 
}
?>
