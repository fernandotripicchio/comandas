<?php
 class MovimientoStock extends AppModel {
  var $name = 'MovimientoStock';

  public $belongsTo = array('Stock');
    
}
?>