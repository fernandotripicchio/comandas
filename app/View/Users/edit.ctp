<?echo $this->Html->script('user');?>
<div id="user_add">
    <?=$this->form->create('User',array('action'=>'edit'));?>
    <?=$this->element("Users/form", array("title"=>"Editar Usuario"));?>
    <?=$this->form->end();?>
</div>  