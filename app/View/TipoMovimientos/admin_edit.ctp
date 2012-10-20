<?//echo $this->Html->script('user');?>
<div id="cadete_edit">
    <?=$this->form->create('TipoMovimiento',array('action'=>'edit'));?>
    <?=$this->element("Tipos/form", array("title"=>"Editar Tipo de Movimiento"));?>
    <?=$this->form->end();?>
</div>  