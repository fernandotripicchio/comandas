<?//echo $this->Html->script('user');?>
<div id="cliente_edit">
    <?=$this->form->create('Cliente',array('action'=>'edit'));?>
    <?=$this->element("Clientes/form", array("title"=>"Editar Cliente"));?>
    <?=$this->form->end();?>
</div>  