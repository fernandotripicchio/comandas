<?php
 class Caja extends AppModel {
  public $name = 'Caja';

  public $belongsTo = array('TipoMovimiento', 'User');
}
?>