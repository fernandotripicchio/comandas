<?php

 class Item extends AppModel {
  var $name = 'Item';

  public $belongsTo = array('Pedido', 'Producto');
   
}
?>