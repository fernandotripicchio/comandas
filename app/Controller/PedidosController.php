<?
 class PedidosController extends AppController {
  var $name = 'Pedidos';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Pedido', 'Producto', 'User', 'Cliente');
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

  function add(){
    
  }


   
 
}
?>
