<?php
 class TipoMovimiento extends AppModel {
  public $name = 'TipoMovimiento';

  public $hasMany = array('Cajas');
}
?>