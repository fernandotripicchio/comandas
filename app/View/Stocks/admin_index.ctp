<div>
  <table >
  <caption>Filtrar Datos</caption>
  <tbody>
      <tr>
        <td>Productos: </td>
        <td>
           <select name="data[filtros][producto_id]" id="ProductosStock">
                         <option value=""></option>
                         <? foreach ($productos as $key => $value) { ?>
                             <option value="<?=$key?>"> <?=$value?></option>
                         <? }?>
            </select>
        </td>
        <td>
            <input type="submit" name="Buscar" value="Buscar">
        </td>
     
    </tr>
  </tbody>
  </table>
</div>

<hr />

<div class="listado">
<table >
  <caption>Stock Bebidas</caption>
  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Producto</th>
        <th scope="col">Cantidad</th>
        <th>&nbsp;</th>
    </tr>
</thead>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <tbody>
    <?php foreach ($stocks as $stock): ?>
        
       <tr >
         <td ><?php echo $stock['Stock']['id']; ?></td>
         <td>
           <?php echo $stock['Producto']['nombre'] ?>
        </td>
         <td>
           <?php echo $stock['Stock']['cantidad'] ?>
        </td>
        <td>
           <?php echo $this->html->link("Ver Movimientos", array("admin" => true, "controller" => "stocks", "action" => "movimientos", $stock['Stock']['id'], $stock['Producto']['id']), array("class" => "button", "title" => "Ver Movimientos ")); ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>


</div>