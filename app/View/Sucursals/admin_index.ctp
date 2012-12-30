<!-- File: /app/View/Posts/index.ctp -->
<div class="listado">
<hr />
<table >
  <caption>Sucursales</caption>
  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Codigo</th>
        <th scope="col">Nombre</th>
        <th scope="col">Direccion</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <tbody>
    <?php foreach ($sucursales as $sucursal): ?>
       <tr>
         <td ><?php echo $sucursal['Sucursal']['id']; ?></td>
         <td>
           <?php echo $sucursal['Sucursal']['codigo'] ?>
        </td>
         <td>
           <?php echo $sucursal['Sucursal']['nombre'] ?>
        </td>
        
         <td>
           <?php echo $sucursal['Sucursal']['direccion'] ?>
        </td>

        
        <td>
          <?php echo $this->html->link("Editar", array("controller" => "sucursals", "action" => "edit", $sucursal['Sucursal']['id']), array("class" => "button"))?>
          <?php echo $this->Form->postLink(
                'Eliminar',
                array('action' => 'delete', $sucursal['Sucursal']['id']),array("class" => "button"),
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