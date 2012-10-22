
<div class="formulario_busqueda">
  <table >
  <caption>Filtrar Datos</caption>
  <tbody>
    <tr>
     <td>Tipo de Movimiento</td>
     <td>
        <?echo $this->form->select('tipo_movimiento_id', $tipos) ?>
     </td>
     <td>
       Usuario Realizo Movimiento
     </td>
     <td>
       <?echo $this->form->select('usuario', $users) ?>
     </td>
     
       <td><input type="submit" name="Buscar" value="Buscar"></td>
     
    </tr>
  </tbody>
  </table>
</div>
<div class="buttonActions">
   <?=$this->html->link('Nuevo Movimiento',array("controller"=>"cajas", "action" => "add", "admin" => false), array('class' => 'button left'));?>
</div>

<br />
<br />
<div class="listado_pedidos">
<?//= $this->form->create('Pedido',array('action'=>'actions_pedidos', 'id' => 'pedidoFormActions'));?>
<table >
  <caption>Movimientos de Caja</caption>
  <thead>
    <tr>
       
        <th scope="col">Nro</th>
        <th scope="col">Ingreso</th>
        <th scope="col">Egreso</th>
        <th scope="col">Fecha</th>
        <th scope="col">Tipo Movimiento</th>
        <th scope="col">Usuario</th>
    </tr>
</thead>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <tbody>
    <?php foreach ($cajas as $caja): ?>
    <tr>
      <td>
        <?=$caja["Caja"]["id"]?>
      </td>
      <td>
        $ <?=$caja["Caja"]["ingresos"]?>
      </td>

      <td>
        $ <?=$caja["Caja"]["egresos"]?>
      </td>
      <td>
        $ <?=$caja["Caja"]["fecha"]?>
      </td>
      <td>
        <?=$caja["TipoMovimiento"]["nombre"]?>
      </td>
      <td>
        <?=$caja["User"]["nombre"]?>
      </td>



    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    </tfoot>

</table>
<?//= $this->form->end(); ?>
</div>