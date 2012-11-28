<div class="formulario_busqueda">
  <table class ="span-10">
  <caption>Filtrar Datos</caption>
  <tbody>
    <tr>
     <td>Buscar:</td>
     <td>
        <input type="text" name="data[Cliente][key]" value="" size="20">         
     </td>
       <td><input type="submit" name="Buscar" value="Buscar"></td>
    </tr>
  </tbody>
  </table>
</div>


 <table >
  <caption><?=$this->Paginator->numbers();?> Clientes</caption>
  <thead>
    <tr>
        <th scope="col">&nbsp;</th>
        <th scope="col">Nombre</th>
        <th scope="col">Direccion</th>
        <th scope="col">Telefono</th>
        <th scope="col">Observaciones</th>
    </tr>
   </thead>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <tbody>
    <? $i = 0; ?>
    <?php foreach ($clientes as $cliente): ?>
      <input type="hidden" id="nombre_<?=$cliente['Cliente']['id'] ?>" value="<?=$cliente['Cliente']['nombre']; ?>">
      <input type="hidden" id="direccion_<?=$cliente['Cliente']['id'] ?>" value="<?=$cliente['Cliente']['direccion']; ?>">
      <input type="hidden" id="telefono_<?=$cliente['Cliente']['id'] ?>" value="<?=$cliente['Cliente']['telefono']; ?>">

      <tr id="cliente_<?=$cliente['Cliente']['id']; ?>" class='<?= (($i++%2)? "odd": "even") ?>'>
                <td>
                  <input type="radio" name="cliente" class="radioCliente" value="<?=$cliente['Cliente']['id']; ?>">
                </td>
                <td>
                  <strong>
                    <?php echo $cliente['Cliente']['nombre']; ?>
                  </strong>
                </td>
                <td>
                  <?php echo $cliente['Cliente']['direccion']; ?>
                </td>
                <td>
                  <?php echo $cliente['Cliente']['telefono']; ?>
                </td>
                <td>
                  <?php echo $cliente['Cliente']['observaciones']; ?>
                </td>
      </tr>
    
    <?php endforeach; ?>
    </tbody>
</table>