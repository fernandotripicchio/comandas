<!-- File: /app/View/Posts/index.ctp -->
<div class="listado">
<hr />
<table >
  <caption>Clientes</caption>
  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Dirección</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Observaciones</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <tbody>
    <?php foreach ($clientes as $cliente): ?>
       <tr>
         <td ><?php echo $cliente['Cliente']['id']; ?></td>
         <td>
           <?php echo $cliente['Cliente']['nombre'] ?>
        </td>
         <td>
           <?php echo $cliente['Cliente']['direccion'] ?>
        </td>
         <td>
           <?php echo $cliente['Cliente']['telefono'] ?>
        </td>
         <td>
           <?php echo $cliente['Cliente']['observaciones'] ?>
        </td>
        
        <td>
          <?php echo $this->html->link("Editar", array("controller" => "clientes", "action" => "edit", $cliente['Cliente']['id']), array("class" => "button"))?>
          <?php echo $this->Form->postLink(
                'Eliminar',
                array('action' => 'delete', $cliente['Cliente']['id']),array("class" => "button"),
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