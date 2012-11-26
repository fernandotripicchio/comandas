<?php
 class Stock extends AppModel {
  var $name = 'Stock';

  public $hasMany = array('MovimientoStock');
  public $belongsTo = array("Producto" => array('foreignKey'    => 'producto_id'));

}
?>