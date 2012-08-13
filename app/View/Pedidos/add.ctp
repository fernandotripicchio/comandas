<?//echo $this->Html->script('user');?>
<div id="producto_add">
    <?=$this->form->create('Pedidos',array('action'=>'add'));?>
    <?=$this->element("Pedidos/form", array("title"=>"Nuevo Pedido"));?>
    <?=$this->form->end();?>
</div>  