<!-- File: /app/View/Posts/index.ctp -->
<div class="listado">
<hr />
<table >
  <caption>Stock Bebidas - Movimientos</caption>
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
           <?php echo $movimiento['MovimientoStock']['Usuario'] ?>
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