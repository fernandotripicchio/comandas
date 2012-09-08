<?//echo $this->Html->script('user');?>
<div id="cadete_edit">
    <?=$this->form->create('Cadete',array('action'=>'edit'));?>
    <?=$this->element("Cadetes/form", array("title"=>"Editar Cadete"));?>
    <?=$this->form->end();?>
</div>  