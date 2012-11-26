<?php
 class MovimientoStock extends AppModel {
  var $name = 'MovimientoStock';

  public $belongsTo = array('Stock', 'User' => array('foreignKey'    => 'usuario_id'), 'Pedido');
    
}
?>