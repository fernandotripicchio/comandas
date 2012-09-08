<!-- File: /app/View/Posts/index.ctp -->
<div class="listado">
<hr />
<table >
  <caption>Cadetes</caption>
  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <tbody>
    <?php foreach ($cadetes as $cadete): ?>
       <tr>
         <td ><?php echo $cadete['Cadete']['id']; ?></td>
         <td>
           <?php echo $cadete['Cadete']['nombre'] ?>
        </td>
        
        <td>
          <?php echo $this->html->link("Editar", array("controller" => "cadetes", "action" => "edit", $cadete['Cadete']['id']), array("class" => "button"))?>
          <?php echo $this->Form->postLink(
                'Eliminar',
                array('action' => 'delete', $cadete['Cadete']['id']),array("class" => "button"),
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