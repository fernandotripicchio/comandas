<?echo $this->Html->script('cliente');?>
<div id="cliente_add">
    <?=$this->form->create('Cliente',array('action'=>'add', 'id' => 'clienteForm'));?>
    <?=$this->element("Clientes/form", array("title"=>"Agregar Nuevo Cliente"));?>
    <div class="full center_image">
         <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button ' ) )?>
         <?=$this->html->link('Listado',array("controller" => "clientes","action" => "index", "admin" => true), array('class' => 'button'));?>
    </div>      
    <?=$this->form->end();?>
</div>  