<?php

 class Sucursal extends AppModel {
  var $name = 'Sucursal';
  
  
  public $hasMany = array(
        'Pedidos' => array(
            'className'  => 'Pedidos',
            'order'      => 'Pedidos.id DESC'
        ),
        'Stocks' => array(
            'className'  => 'Stocks',
            'order'      => 'Stocks.id ASC'
        ),
        'Cajas' => array(
            'className'  => 'Cajas',
            'order'      => 'Cajas.id ASC'
        )      
        
    );
  
 public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
            ),
            'unique' => array(
                 'rule' => 'isUnique',
                 'message' => 'Ya existe una sucursal con ese nombre.'
          )),
        'direccion' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Direccion es requerido'
            )
        ),
        'telefono' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Telefono es requerido'
            )
        ),
        'codigo' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Codigo es requerido'
            ),
            'unique' => array(
                 'rule' => 'isUnique',
                 'message' => 'Ya existe una sucursal con ese codigo.'
          )
        )
        );  
   
}
?>
