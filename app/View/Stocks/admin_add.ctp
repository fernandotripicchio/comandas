<?php echo $this->Html->script('stock'); ?>
<div id="cajaAdd" class="CajasForm">
     <?= $this->form->create('MovimientoStock',array('action'=>'add', 'id' => 'nuevoMovimientoStock'));?>
     <?=$this->form->input("user_id", array("type" => "hidden", "value" => $user_id));?>
     <?//=$this->element("Stock/form", array("title"=>"Agregar Nuevo Movimiento"));?>
     <div>
        <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button ' ) )?>
        <?=$this->html->link('Volver al Listado',array("admin" => true, "controller" => "stocks", "action" => "index"), array('class' => 'button '));?>
     </div>
  <?=$this->form->end();?>
</div>