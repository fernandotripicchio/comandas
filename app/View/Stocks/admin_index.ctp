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
        <th scope="col">Fecha</th>
        <th scope="col">Usuario</th>
        <th scope="col">Motivo</th>
        <th scope="col">Ingreso</th>
        <th scope="col">Egreso</th>
    </tr>
</thead>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <tbody>
    <?php foreach ($movimientos as $movimiento): ?>
       <tr>
         <td ><?php echo $movimiento['MovimientoStock']['id']; ?></td>
         <td>
           <?php echo $movimiento['MovimientoStock']['fecha'] ?>
        </td>
         <td>
           <?php echo $movimiento['User']['nombre'] ?>
        </td>
         <td>
           <?php echo $movimiento['MovimientoStock']['motivo'] ?>
        </td>
         <td>
           <?php echo $movimiento['MovimientoStock']['ingreso'] ?>
        </td>
         <td>
           <?php echo $movimiento['MovimientoStock']['egreso'] ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>


</div>