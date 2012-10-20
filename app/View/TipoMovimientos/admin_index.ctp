<!-- File: /app/View/Posts/index.ctp -->
<div class="listado">
<hr />
<table >
  <caption>Tipo de Movimientos</caption>
  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Tipo</th>
        <th scope="col">Activo</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <tbody>
    <?php foreach ($tipos as $tipo): ?>
       <tr>
         <td>
           <?php echo $tipo['TipoMovimiento']['id']; ?>
         </td>
         <td>
           <?php echo $tipo['TipoMovimiento']['nombre'] ?>
         </td>
         <td>
           <?php echo $tipo['TipoMovimiento']['tipo'] ?>
         </td>
         <td>
           <?php echo ($tipo['TipoMovimiento']['activo']) ? "Si" : "No" ?>
         </td>

        <td>
          <?php echo $this->html->link("Editar", array("controller" => "tipo_movimientos", "action" => "edit", $tipo['TipoMovimiento']['id']), array("class" => "button"))?>
          <?php echo $this->Form->postLink(
                'Eliminar',
                array('action' => 'delete', $tipo['TipoMovimiento']['id']),array("class" => "button"),
                array('confirm' => 'Estas seguro?'));
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>


</div>