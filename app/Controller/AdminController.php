<?
 class AdminController extends AppController {
  
  function beforeFilter() {
     parent::beforeFilter();
  }


  public function index(){
   $this->redirect("/admin/users/index");
  }

  }
?>
