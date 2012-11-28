<?echo $this->Html->script('producto');?>
<div id="producto_add">
    <?=$this->form->create('Producto',array('action'=>'add', "id" => "productoForm"));?>
    <?=$this->element("Productos/form", array("title"=>"Agregar Nuevo Producto"));?>
    <div class="full center_image">
         <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button' ) )?>
         <?=$this->html->link('Listado',array("controller"=>"productos", "action" => "index", "admin" => true), array('class' => 'button'));?>
    </div>
    <?=$this->form->end();?>
</div>  