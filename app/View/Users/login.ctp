<div  class="box login_box  white-bg login_position" >
  <?php echo $this->Session->flash('auth'); ?>
  <div class="login_container">
    <h2>Login User</h2>
    <hr />
    <?=$this->Form->create('User'); ?>
    <fieldset>
        <?=$this->Form->input('username', array('div' => array('tag' => 'p'),'label' => 'login', 'class' => 'required ') ); ?>
        <?=$this->Form->input('password', array('div' => array('tag' => 'p'), 'class' => 'required email' ) ); ?>
    </fieldset>      
    <?=$this->form->end('Login');?>

    </div>

  </div>



