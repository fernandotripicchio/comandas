<div class="<?=$class?>">
        <table >
          <caption>Productos</caption>
          <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Producto</th>
                <th scope="col">Tipo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio Local</th>
                <th scope="col">Precio Normal</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
            <!-- Here is where we loop through our $posts array, printing out post info -->
            <tbody>
            <?php foreach ($productos as $producto): ?>
               <tr>
                 <td ><?php echo $producto['Producto']['id']; ?></td>
                 <td>
                   <?php echo $producto['Producto']['nombre'] ?>
                </td>
                <td>
                   <?php echo $producto['Tipo']['nombre'] ?>
                </td>
                 <td>
                   <?php echo $producto['Producto']['descripcion'] ?>
                </td>
                 <td>
                   $ <?php echo number_format( $producto['Producto']['precio_local'], 2, ".", "" )  ?>
                </td>
                 <td>
                   $ <?php echo number_format( $producto['Producto']['precio_normal'], 2, ".", "" ) ?>
                </td>

                <td>
                  <?php echo $this->html->link("Editar", array("controller" => "productos", "action" => "edit", $producto['Producto']['id']), array("class" => "button"))?>
                  <?php echo $this->Form->postLink(
                        'Eliminar',
                        array('action' => 'delete', $producto['Producto']['id']),array("class" => "button"),
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
