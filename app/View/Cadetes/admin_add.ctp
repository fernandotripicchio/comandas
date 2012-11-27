<?echo $this->Html->script('cadete');?>
<div id="cadete_add">
    <?=$this->form->create('Cadete',array('action'=>'add', 'id' => 'cadeteForm'));?>
    <?=$this->element("Cadetes/form", array("title"=>"Agregar Nuevo Cadete"));?>
    <div class="full center_image">
       <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button left' ) )?>
       <?=$this->html->link('Listado','/admin/cadetes/', array('class' => 'button left'));?>
    </div>
    <?=$this->form->end();?>
</div>  