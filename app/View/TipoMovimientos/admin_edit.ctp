<?echo $this->Html->script('tipo');?>
<div id="tipo_edit">
    <?=$this->form->create('TipoMovimiento',array('action'=>'edit', 'id' => 'tipoForm'));?>
    <?=$this->element("Tipos/form", array("title"=>"Editar Tipo de Movimiento"));?>
    <div class="full center_image">               
         <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button left' ) )?>
         <?=$this->html->link('Listado','/admin/tipo_movimientos/', array('class' => 'button left'));?>
    </div>    
    <?=$this->form->end();?>
</div>  