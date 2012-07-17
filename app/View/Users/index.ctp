<!-- File: /app/View/Posts/index.ctp -->
<div class="listado">
<hr />
<table >
  <caption>Usuarios</caption>
  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">User Name</th>
        <th scope="col">Email</th>
        <th scope="col">Activo</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <tbody>
    <?php foreach ($users as $user): ?>
       <tr>
         <td ><?php echo $user['User']['id']; ?></td>
         <td>
           <?php echo $user['User']['username'] ?>
        </td>
        <td><?php echo $user['User']['email']; ?></td>
        <td ><?php echo $user['User']['activo']; ?></td>
        <td>
          <?php echo $this->html->link("Editar", array("controller" => "users", "action" => "edit", $user['User']['id']), array("class" => "button"))?>
          <?php echo $this->Form->postLink(
                'Eliminar',
                array('action' => 'delete', $user['User']['id']),array("class" => "button"),
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