<?//echo $this->Html->script('user');?>
<div id="cadete_add">
    <?=$this->form->create('Cadete',array('action'=>'add'), array("autocomplete" => "off"));?>
    <?=$this->element("Cadetes/form", array("title"=>"Agregar Nuevo Cadete"));?>
    <?=$this->form->end();?>
</div>  