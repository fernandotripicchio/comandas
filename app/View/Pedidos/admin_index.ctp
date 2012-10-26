<div class="listado">
<hr />
<table >
  <caption>Pedidos</caption>
  <thead>
    <tr>
        <th scope="col">Nro</th>
        <th scope="col">Tipo</th>
        <th scope="col">Mesa</th>
        <th scope="col">Cliente</th>
        <th scope="col">Fecha</th>
        <th scope="col">Estado</th>
    </tr>
</thead>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <tbody>
    <?php foreach ($pedidos as $pedido): ?>
      
       <tr>
         <td >
           <?php echo $pedido['Pedido']['id']; ?></td>
         <td>
           <?php echo $pedido['Pedido']['tipo'] ?>
        </td>
        <td>
           <?php echo $pedido['Pedido']['mesa'] ?>
        </td>
         <td>
           <?php echo $pedido['Cliente']['nombre'] ?>
        </td>
         <td>
           <?php echo $pedido['Pedido']['fecha'] ?>
         </td>
         <td>
            <?php echo $pedido['Pedido']['estado'] ?>
        </td>

    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>


</div>