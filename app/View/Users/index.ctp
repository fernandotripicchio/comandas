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
    </tr>
</thead>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <tbody>
    <?php foreach ($users as $user): ?>
       <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
           <?php echo $this->Html->link($user['User']['username'],
      array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
        </td>
        <td><?php echo $user['User']['email']; ?></td>
        <td><?php echo $user['User']['activo']; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>


</div>