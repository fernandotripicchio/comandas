<?echo $this->Html->script('cliente');?>
<div id="cliente_edit">
    <?=$this->form->create('Cliente',array('action'=>'edit', 'id' => 'clienteForm'));?>
    <?=$this->element("Clientes/form", array("title"=>"Editar Cliente"));?>
    <div class="full center_image">
         <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button' ) )?>
         <?=$this->html->link('Listado',array("controller"=>"productos", "action" => "index", "admin" => true), array('class' => 'button'));?>
    </div>    
    <?=$this->form->end();?>
</div>  