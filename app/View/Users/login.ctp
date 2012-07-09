<div  class="box login_box  white-bg login_position" >
  <div class="login_container">
    <h2>Login User</h2>
    <hr />
    <?=$this->form->create('User', array('action' => 'login')); ?>
    <fieldset>
        <?=$this->form->input('login', array('div' => array('tag' => 'p'),'label' => 'login', 'class' => 'required ') ); ?>
        <?=$this->form->input('password', array('div' => array('tag' => 'p'), 'class' => 'required email' ) ); ?>
        <?=$this->form->input('remember_me', array('label' => 'remember me', 'type' => 'checkbox'));   ?>
    </fieldset>      
    <?=$this->form->end('Login');?>

    </div>

  </div>
