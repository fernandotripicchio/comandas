<?php

 class Tipo extends AppModel {
  var $name = 'Tipo';

  public $hasMany = array(
        'Productos' => array(
            'className'  => 'Producto',
            'order'      => 'Producto.id DESC'
        )
    );

}
?>