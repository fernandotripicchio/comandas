<?php


 class Cliente extends AppModel {
  public $name = 'Cliente';


  public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
            )),
        'direccion' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Direccion es requerida'
            )
        ) );

  
  
   
}
?>