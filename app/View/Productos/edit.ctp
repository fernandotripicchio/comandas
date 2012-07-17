<?//echo $this->Html->script('user');?>
<div id="producto_edit">
    <?=$this->form->create('Producto',array('action'=>'edit'));?>
    <?=$this->element("Productos/form", array("title"=>"Editar Producto"));?>
    <?=$this->form->end();?>
</div>  