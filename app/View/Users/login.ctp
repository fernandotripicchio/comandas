<?echo $this->Html->script('login');?>
<div>
  <?php echo $this->Session->flash('auth'); ?>
  <div class="login">
<!--    <h2>Login Usuario</h2>
    <hr />-->
    <?=$this->Form->create('User'); ?>
    <fieldset>
      <table>
        <tr>
          <td class="span-3"> <strong><?=$this->Form->label("Usuario:") ?></strong></td>
          <td>
            <?=$this->Form->input('username', array('div' => array('tag' => 'div'),'size'=> '50','label' => false, 'class' => 'required ') ); ?>
          </td>
        </tr>
        <tr>
          <td colspan="2">
               &nbsp;
          </td>
        </tr>
        <tr>
          <td> <strong> <?=$this->Form->label("Password:") ?> </strong> </td>
          <td>
            <?=$this->Form->input('password', array('div' => array('tag' => 'div'),'type'=> 'password','size'=> '50', 'label' => false, 'class' => 'required' ) ); ?>
          </td>
        </tr>
        <tr>
          <td> <strong> <?=$this->Form->label("Sucursal:") ?> </strong> </td>
          <td>
            <?#=$this->Form->input('sucursal', array('div' => array('tag' => 'div'),'type'=> 'password','size'=> '50', 'label' => false, 'class' => 'required' ) ); ?>
            <?=$this->form->select('sucursal_id', $sucursales, array("class" => "required")) ?>

          </td>
        </tr>
        
        <tr>
          <td colspan="2">
               &nbsp;
          </td>
        </tr>
        <tr>
          <td colspan="2">
                <hr />
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
             <?=$this->form->end('Ingresar');?>
          </td>
        </tr>
      </table>
     
      
    </fieldset>      
    

    </div>

</div>



