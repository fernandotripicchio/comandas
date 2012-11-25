<?php echo $this->Html->script('stock'); ?>

<div id="cajaAdd" class="CajasForm">
     <?= $this->form->create('Stock',array('action'=>'add', 'id' => 'formMovimientoStock'));?>
     <?=$this->form->input("user_id", array("type" => "hidden", "value" => $user_id));?>
     <?=$this->element("Stocks/form", array("title"=>"Agregar Nuevo Movimiento Stock", "tipo" => $tipo));?>
     <div>
        <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button ' ) )?>
        <?=$this->html->link('Volver al Listado',array("admin" => true, "controller" => "stocks", "action" => "index"), array('class' => 'button '));?>
     </div>
  <?=$this->form->end();?>
</div>