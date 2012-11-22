<?php echo $this->Html->script('caja'); ?>
<div id="cajaAdd" class="CajasForm">
     <?= $this->form->create('Caja',array('action'=>'add', 'id' => 'cajaFormActions'));?>
     <?=$this->form->input("user_id", array("type" => "hidden", "value" => $user_id));?>
     <?=$this->form->input("fecha", array("type" => "hidden", "value" => date("Y-m-d H:i:s")));?>
     <?=$this->element("Cajas/form", array("title"=>"Agregar Nuevo Movimiento", "tipos" => $tipos));?>
     <div>
        <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button ' ) )?>
        <?=$this->html->link('Volver al Listado','/cajas/', array('class' => 'button '));?>
     </div>
  <?=$this->form->end();?>
</div>