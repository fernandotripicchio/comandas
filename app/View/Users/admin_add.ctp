<?echo $this->Html->script('user');?>
<div id="user_add">
    <?=$this->form->create('User',array('action'=>'add'), array("autocomplete" => "off"));?>
    <?=$this->element("Users/form", array("title"=>"Nuevo Usuario"));?>
    <?=$this->form->end();?>
    <?=$this->form->end();?>
</div>  