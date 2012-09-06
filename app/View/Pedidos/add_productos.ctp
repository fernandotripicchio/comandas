<div>
  <h1>Seleccione los productos para el pedido</h1>
  <hr />
  <div class="filtros" >
     <div>
       <?//php echo $this->Html->link("Todos", "#", array("class" => "button a_filtro", "tipo"=>"todos") )?>
      <span class="bigButtonYellow a_filtro" tipo="todos">Todos</span>
      </div> <br />
     <?php foreach ($tipos as $tipo): ?>
        <div class="column">
          <?//php echo $this->Html->link($tipo["Tipo"]["nombre"], "#", array("class" => "button a_filtro", "tipo" => $tipo["Tipo"]["id"]) )?>
          <span class="bigButtonPink" tipo="<?=$tipo["Tipo"]["id"]?>"><?=$tipo["Tipo"]["nombre"]?></span>
        </div>
      <?php endforeach; ?>
  </div>

<br /><br />

<div class="productosListadoPedidos" >
  <div class="column columnaProductos" >
    <table class="tablaProductos">
       <?php foreach ($productos as $producto): ?>
            <tr id="producto_<?=$producto['Producto']['id']; ?>" class="row_tipo_<?php echo $producto['Tipo']['id']?> row_productos">
              <td title="<?php echo $producto['Producto']['descripcion'] ?>" >
              <input type="hidden" name="id_<?=$producto['Producto']['id']; ?>" value="<?=$producto['Producto']['id']; ?>">
              <input type="hidden" id="nombre_<?=$producto['Producto']['id']; ?>" value="<?=$producto['Producto']['nombre']; ?>">
              <input type="hidden" id="precio_local_<?=$producto['Producto']['id']; ?>" value="<?=number_format($producto['Producto']['precio_local'],2,".", " "); ?>">
              <input type="hidden" id="precio_normal_<?=$producto['Producto']['id']; ?>" value="<?=number_format($producto['Producto']['precio_normal'],2,".", " "); ?>">
              <span class="bigButtonRed">$ <?php echo number_format($producto['Producto']['precio_normal'], 2, ".", " ") ?> - <?=$producto['Producto']['nombre']?></span>
              </td>
            </tr>
        <?php endforeach; ?>
    </table>
  </div>
  <div class="column columnaProductosSeleccionados" >
                <table id="productos_seleccionados">
                  <tr>
                    <th>Cantidad</th>
                    <th class="span-4">Producto</th>
                    <th >Precio</th>
                    <th>Observaciones</th>
                    <th>&nbsp;</th>
                  </tr>
                </table>
  </div>
  <div class="column columnaTotalPedido" >
       <span class="pedidoTotal">Total: $</span>
       <span class="pedidoTotal" id="total">0</span>
       <br />
       <div style="margin-top: 30px">
          <input type="button" name="terminar" value="Terminar Pedido" id="terminarPedido">
      </div>
  </div>
</div>
<hr />
</div>
 <?php echo $this->Html->script('items'); ?>