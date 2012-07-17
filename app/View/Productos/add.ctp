<?//echo $this->Html->script('user');?>
<div id="producto_add">
    <?=$this->form->create('Producto',array('action'=>'add'), array("autocomplete" => "off"));?>
    <?=$this->element("Productos/form", array("title"=>"Agregar Nuevo Producto"));?>
    <?=$this->form->end();?>
</div>  