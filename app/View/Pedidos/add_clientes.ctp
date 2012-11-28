<div id="divClienteListado" style="height: 90%"> 
    <div class="listados" >
       <?//php echo  $this->Paginator->counter('Pagina {:page} of {:pages}'); ?>
       <div id="tabla_clientes" style="margin-top: 10px;">
          <?=$this->element("Clientes/listado");?>
       </div>
       <div style="margin-top: 10px;">
           <?php echo $this->Html->link("Seleccionar", "#", array("class" => "button a_seleccion_cliente", "id" => "seleccionarCliente") )?>
       </div>
    </div>
</div>

 <?php echo $this->Html->script('clientes_pedidos'); ?>