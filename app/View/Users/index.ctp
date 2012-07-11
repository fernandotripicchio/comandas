<!-- File: /app/View/Posts/index.ctp -->

<h1>Listado de Usuarios</h1>
<table>
    <tr>
        <th>Id</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Activo</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

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

</table>