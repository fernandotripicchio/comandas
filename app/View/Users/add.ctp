<?echo $this->Html->script('user');?>
<div id="user_add">
    <?=$this->form->create('User',array('action'=>'add'));?>
    <?=$this->element("Users/form", array("title"=>"Agregar Nuevo Usuario"));?>
    <?=$this->form->end();?>
</div>  