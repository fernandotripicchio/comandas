<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
   public $components = array('RequestHandler',
                           'Auth'=> array('autoRedirect' => false,
                           'loginAction' => array ('controller' => 'users', 'action' => 'login'),
                           'loginRedirect' => array('controller' => 'pedidos', 'action' => 'index') ),
                            'Session');
   //var $components = array('RequestHandler','Session');
   var $helpers = array('Html');


  function beforeFilter() {
    $this->set('username', $this->Auth->User("username"));
    $this->set('is_admin',$this->Auth->User("admin"));
    $this->set('sucursal', $this->Session->read("sucursal"));
    
 }


 public function isAuthorized($user) {
    // Admin can access every action
    if ($user['admin']) {
        return true;
    }

    // Default deny
    return false;
}


// public function builtCondition($keys){
//    
//   $condition = "1";
//   foreach ($keys as $key => $value) {
//       echo "$key --- $value";
//   }
//   return $condition;
// }


 public function setSessionKeys($module, $keys){
     
     foreach ($keys as $key => $value) {
         //echo "$key --- $value <br>";
         $this->Session->write("$module.$key", $value );
     }
 }
 
 
 public function fechaSpanishDB($fecha){
     $new_fecha = explode("/", $fecha);
     return $new_fecha[2]."-".$new_fecha[1]."-".$new_fecha[0];
 }
 
 public function fechaHumana($fecha){
     $new_fecha = explode(" ", $fecha);
     $new_fecha = $new_fecha[0];
     return $new_fecha[2]."/".$new_fecha[1]."/".$new_fecha[0];
 }
 
 
  public function getSucursal(){
    $sucursal = $this->Session->read("sucursal");
    $sucursal = $sucursal["Sucursal"];
    return $sucursal;
 }
 

}
