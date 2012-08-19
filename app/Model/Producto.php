<?php

 class Producto extends AppModel {
  var $name = 'Producto';

  public $belongsTo = array("Tipo");
  public $hasMany = array('Items');


   
}
?>