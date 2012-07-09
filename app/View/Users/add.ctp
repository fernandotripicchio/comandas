<div id="user_add">
    <?=$this->form->create('User',array('action'=>'add'));?>
    <?=$this->element("Users/form", array("title"=>"Add New User"));?>
    <?=$this->form->end();?>
</div>  