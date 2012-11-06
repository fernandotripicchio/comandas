<?php echo $this->Html->script('pedidos'); ?>
<div id="producto_add">
    <?=$this->form->create('Pedidos',array('action'=>'add', 'id' => 'pedidoForm'));?>
    <?=$this->element("Pedidos/form", array("title"=>"Nuevo Pedido"));?>
    <?=$this->form->end();?>
</div>  