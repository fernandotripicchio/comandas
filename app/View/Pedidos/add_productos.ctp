<div class="listado" style="height: 500px">
  <h1>Seleccione los productos para el pedido</h1>
<hr />
<div class="filtros" style="padding:5px; margin-bottom: 10px;">
   <div class="column">
          <?php echo $this->Html->link("Todos", "#", array("class" => "button a_filtro", "tipo"=>"todos") )?>
    </div>
   <?php foreach ($tipos as $tipo): ?>
        <div class="column">
          <?php echo $this->Html->link($tipo["Tipo"]["nombre"], "#", array("class" => "button a_filtro", "tipo" => $tipo["Tipo"]["id"]) )?>
        </div>
   <?php endforeach; ?>
</div>

<br />

<div id="tabla_productos" style="margin-top: 10px;">
<table >
  
  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Producto</th>
        <th scope="col">Tipo</th>
        <th scope="col">Precio Local</th>
        <th scope="col">Precio Normal</th>
        <th scope="col">Descripción</th>
    </tr>
</thead>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <tbody>
    <?php foreach ($productos as $producto): ?>
      <input type="hidden" name="id_<?=$producto['Producto']['id']; ?>" value="<?=$producto['Producto']['id']; ?>">
      <input type="hidden" id="nombre_<?=$producto['Producto']['id']; ?>" value="<?=$producto['Producto']['nombre']; ?>">
      <input type="hidden" id="precio_local_<?=$producto['Producto']['id']; ?>" value="<?=number_format($producto['Producto']['precio_local'],2,".", " "); ?>">
      <input type="hidden" id="precio_normal_<?=$producto['Producto']['id']; ?>" value="<?=number_format($producto['Producto']['precio_normal'],2,".", " "); ?>">
      <tr id="producto_<?=$producto['Producto']['id']; ?>" class="row_tipo_<?php echo $producto['Tipo']['id']?> row_productos">
         <td >
            <?php echo $producto['Producto']['id']; ?>
         </td>
         <td >
           <strong><?php echo $producto['Producto']['nombre'] ?></strong>
         </td>

         <td >
           <?php echo $producto['Tipo']['nombre'] ?>
         </td>
         <td >
           $ <?php echo number_format($producto['Producto']['precio_local'],2,".", " ") ?>
         </td>
         <td >
           $ <?php echo number_format($producto['Producto']['precio_normal'], 2, ".", " ") ?>
         </td>
         <td >
           <?php echo $producto['Producto']['descripcion'] ?>
         </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>
  <hr />
  <h1>Productos elegidos</h1>
  <div class="column last span-18">
      <table id="productos_seleccionados">
        <tr>
          <th>&nbsp;</th>
          <th>Cantidad</th>
          <th>Producto</th>
          <th>Precio</th>
          <th>Observaciones</th>
          <th>&nbsp;</th>
        </tr>
      </table>
  </div>
  <div class="column span-10" style="padding-left: 20px">
    <div class="column span-5">
        <span>Total: $</span>
        <span id="total">0</span>
    </div>
    <div class="column">
      <input type="button" name="terminar" value="Terminar Pedido" id="terminarPedido">
    </div>
  </div>


</div>

</div>
 <?php echo $this->Html->script('items'); ?>