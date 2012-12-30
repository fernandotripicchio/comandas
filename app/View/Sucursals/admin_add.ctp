<?echo $this->Html->script('sucursal');?>
<div id="sucursal_add">
    <?=$this->form->create('sucursal',array('action'=>'add', 'id' => 'sucursalForm'));?>
    <?=$this->element("Sucursals/form", array("title"=>"Agregar Nueva Sucursal"));?>
    <div class="full center_image">
       <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button left' ) )?>
       <?=$this->html->link('Listado','/admin/sucursals/', array('class' => 'button left'));?>
    </div>
    <?=$this->form->end();?>
</div>  