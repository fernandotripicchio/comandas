<?//echo $this->Html->script('user');?>
<div id="cliente_add">
    <?=$this->form->create('Cliente',array('action'=>'add'), array("autocomplete" => "off"));?>
    <?=$this->element("Clientes/form", array("title"=>"Agregar Nuevo Cliente"));?>
    <?=$this->form->end();?>
</div>  