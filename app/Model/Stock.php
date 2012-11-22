<?php
 class Stock extends AppModel {
  var $name = 'Stock';

  public $hasMany = array('MovimientoStock' => array(
                     'className'  => 'Stock',
                     'order'      => 'Stock.id DESC'
                    )
    );

}
?>