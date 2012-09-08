<?php

 class Cadete extends AppModel {
  var $name = 'Cadete';

  public $hasMany = array(
        'Pedidos' => array(
            'className'  => 'Pedidos',
            'order'      => 'Pedidos.id DESC'
        )
    );

}
?>