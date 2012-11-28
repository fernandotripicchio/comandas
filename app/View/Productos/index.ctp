<!-- File: /app/View/Posts/index.ctp -->
<div class="buttonActions">
   <?=$this->html->link('Nuevo Producto',array("controller"=>"productos", "action" => "add", "admin" => false), array('class' => 'button left'));?>
</div>
<div class="listado">
<hr />
<?=$this->element("Productos/listado", array("class" => "listados"))?>
</div>