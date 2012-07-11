<?echo $this->Html->script('login');?>
<div>
  <?php echo $this->Session->flash('auth'); ?>
  <div class="login">
    <h2>Login Usuario</h2>
    <hr />
    <?=$this->Form->create('User'); ?>
    <fieldset>
      <table>
        <tr>
          <td class="span-3"> <?=$this->Form->label("Usuario:") ?></td>
          <td>
            <?=$this->Form->input('username', array('div' => array('tag' => 'div'),'label' => false, 'class' => 'required ') ); ?>
          </td>
        </tr>
        <tr>
          <td> <?=$this->Form->label("Password:") ?></td>
          <td>
            <?=$this->Form->input('password', array('div' => array('tag' => 'div'), 'label' => false, 'class' => 'required' ) ); ?>
          </td>
        </tr>
      </table>
       

     <?=$this->form->end('Ingresar');?>
    </fieldset>      
    

    </div>

</div>



