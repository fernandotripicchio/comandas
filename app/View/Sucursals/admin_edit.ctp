<?echo $this->Html->script('sucursal');?>
<div id="sucursal_edit">
    <?=$this->form->create('Sucursal',array('action'=>'edit', 'id' => 'sucursalForm'));?>
    <?=$this->element("Sucursals/form", array("title"=>"Editar Sucursal"));?>
    <div class="full center_image">
       <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button left' ) )?>
       <?=$this->html->link('Listado','/admin/sucursals/', array('class' => 'button left'));?>
    </div>    
    <?=$this->form->end();?>
</div>  