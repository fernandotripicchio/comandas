<?echo $this->Html->script('cadete');?>
<div id="cadete_edit">
    <?=$this->form->create('Cadete',array('action'=>'edit', 'id' => 'cadeteForm'));?>
    <?=$this->element("Cadetes/form", array("title"=>"Editar Cadete"));?>
    <div class="full center_image">
       <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button left' ) )?>
       <?=$this->html->link('Listado','/admin/cadetes/', array('class' => 'button left'));?>
    </div>    
    <?=$this->form->end();?>
</div>  