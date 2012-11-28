<div id="pedidosProductos" class="full">
    <div class="filtrosProductos full bottomProductos">   
       <h1>Seleccione los productos para el pedido</h1>
       <hr />
       <div class="filtros" >
          <div class="full bottomProductos">
            <span class="bigButtonYellow a_filtro" tipo="todos">Todos</span>
          </div> 
           <div class="full bottomProductos">
                <?php foreach ($tipos as $tipo): ?>
                      <div class="column">
                         <span class="bigButtonPink" tipo="<?=$tipo["Tipo"]["id"]?>"><?=$tipo["Tipo"]["nombre"]?></span>
                      </div>
                 <?php endforeach; ?>
          </div>     
       </div>
     </div>
     <!-- Body con los productos --> 
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