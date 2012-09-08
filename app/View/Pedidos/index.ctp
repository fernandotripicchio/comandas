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
        <th scope="col">Atraso</th>
        <th scope="col">Estado</th>
        <th scope="col">Cadete</th>
        <th scope="col">&nbsp;</th>
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
           <?php echo round( (mktime() - strtotime($pedido['Pedido']['fecha']))/60 ) ?> Min.
         </td>

         <td>
           <?php echo $pedido['Pedido']['estado'] ?>
         </td>
         <td>
            <?echo $this->form->select('cadete_id', $cadetes) ?>
        </td>

        <td>
          <?php echo $this->html->link("Cerrar", array("controller" => "pedidos", "action" => "cerrar", $pedido['Pedido']['id']), array("class" => "button"))?>
          <?php echo $this->html->link("Editar", array("controller" => "pedidos", "action" => "edit", $pedido['Pedido']['id']), array("class" => "button"))?>
          <?php echo $this->html->link("Cancelar", array("controller" => "pedidos", "action" => "cancelar", $pedido['Pedido']['id']), array("class" => "button"))?>

        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>


</div>