<?php

 class Pedido extends AppModel {
  var $name = 'Pedido';

  public $hasMany = array('Items');
  public $belongsTo  = array('Cliente', 'Cadete');
}
?>