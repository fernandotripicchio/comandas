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
 

 
 
  function index() {
    $this->set('productos', $this->Producto->find('all'));
 
   }


 


    
 
}
?>
