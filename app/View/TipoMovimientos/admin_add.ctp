<?//echo $this->Html->script('user');?>
<div id="cadete_add">
    <?=$this->form->create('TipoMovimiento',array('action'=>'add'), array("autocomplete" => "off"));?>
    <?=$this->element("Tipos/form", array("title"=>"Agregar Nuevo Tipo de Movimiento"));?>
    <?=$this->form->end();?>
</div>  