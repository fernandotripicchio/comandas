<?php

 class Pedido extends AppModel {
  var $name = 'Pedido';

  public $hasMany = array('Items');
  public $belongsTo  = array('Cliente', 'Cadete');



  //Estados
  /*
   Cuando se crean hay dos posibilidades:
     Tipo Mesa: Mesa Abierta
     Tipo Delivery: En Cocina

    Un Pedido se puede cerrar el estado es Cerrado
    Cuando se cierra ? En dos momentos cuando se cierra la mesa o cuando se le asigna el cadete

    Un pedido tipo delivery se le asigna un cadete , es estado "En Camino"

   Resumen de Tipos
   Mesa Abierta
   En Cocina
   En Camino
   Cerrado
   Cancelado


   Pedidos Activos: Mesa Abierta, En Cocina, En Camino
   Pedidos No Activos: Cerrado, Cancelado




   */
}
?>