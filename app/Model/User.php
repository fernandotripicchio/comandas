<?php
App::uses('AuthComponent', 'Controller/Component');

 class User extends AppModel {
  public $name = 'User';

  public $hasMany = array('Pedidos', 'MovimientoStocks');
  public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Login es requerido'
            ),
            'unique' => array(
                 'rule' => 'isUnique',
                 'message' => 'Ya existe un usuario con ese login.'
          )),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Debe ingresar un password'
            ),
          'min' => array(
                 'rule' => array('minLength', 8),
                  'message' => 'Password debe tener al menos 8 caracteres.'
            )
        ),

       'password_confirm' => array(
            'rule' => array('checkPasswords'),
             'message' => 'Los passwords no coinciden'
        ),


        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
            )
         ),
        'apellido' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Apellido es requeridos'
            )
        )
        );

  
  public function beforeSave() {
    if (isset($this->data[$this->alias]['password'])) {
        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    }
    if (isset($this->data['User']['password_confirm'])){
      unset($this->data['User']['password_confirm']);
    }
    return true;
  }


function checkPasswords($data) {
        if($this->data['User']['password'] !== $data['password_confirm']) {
            return false;
        }else {
            return true;
        }
}
   
}
?>