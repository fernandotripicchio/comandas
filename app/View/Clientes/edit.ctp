<?//echo $this->Html->script('user');?>
<div id="cliente_edit">
    <?=$this->form->create('Cliente',array('action'=>'edit'));?>
    <?=$this->element("Clientes/form", array("title"=>"Editar Cliente"));?>
    <div class="full center_image">
                     <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button ' ) )?>
                     <?=$this->html->link('Listado','/clientes/', array('class' => 'button'));?>
    </div>    
    
    <?=$this->form->end();?>
</div>  