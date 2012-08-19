
<div class="column" class="span-15">
      <?php echo $this->Html->link("Nuevo Cliente", "#", array("id" => "buttonNuevoCliente","class" => "button a_nuevo_cliente") )?>
</div>
<br />
<div id="cliente_listado">
        <div class="listado" >
        <h1>Seleccione Cliente</h1>
        <hr />
       <?php echo  $this->Paginator->counter('Pagina {:page} of {:pages}');; ?>

        <br />

       <div id="tabla_clientes" style="margin-top: 10px;">
          <?=$this->element("Clientes/listado");?>
       </div>
       <div style="margin-top: 10px;">
           <?php echo $this->Html->link("Seleccionar", "#", array("class" => "button a_seleccion_cliente", "id" => "seleccionarCliente") )?>
       </div>
       </div>
</div>

  <div id="cliente_add" style="display:none" >
    <?=$this->form->create('Cliente',array('action'=>'add'), array("autocomplete" => "off"));?>
    <?=$this->element("Clientes/form", array("title"=>"Agregar Nuevo Cliente"));?>
    <?=$this->form->end();?>
  </div>



 <?php echo $this->Html->script('clientes_pedidos'); ?>