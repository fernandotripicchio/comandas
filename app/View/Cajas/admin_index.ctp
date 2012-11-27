<div class="formulario_busqueda">
  <table class ="span-10"> 
      <caption>Filtrar Datos</caption>
      <tbody>
            <tr>
                <td>Tipo de Movimiento:</td>
                <td>
                    <select name="data[Caja][tipo_movimiento_id]" id="CajaTipoMovimientoId">
                                    <option value=""></option>
                                    <? foreach ($tipos as $tipo) { ?>
                                        <option value="<?=$tipo["id"]?>" tipo-mov="<?=$tipo["tipo"]?>"> <?=$tipo["nombre"]?></option>
                                    <? }?>
                    </select>
                </td>
                <td> Usuario Realizo Movimiento: </td>
                <td>  <?echo $this->form->select('usuario', $users) ?> </td>
                <td><input type="submit" name="Buscar" value="Buscar"></td>
            </tr>
      </tbody>
  </table>
</div>


<br />
<br />
<div class="listado">
<? $total_ingresos = $total_egresos = 0; ?>    
<table >
    <hr />
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
    <? $total_ingresos +=$caja["Caja"]["ingresos"]; ?>
    <? $total_egresos +=$caja["Caja"]["egresos"]; ?>
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
        <?=$caja["Caja"]["fecha"]?>
      </td>
      <td>
        <?=$caja["TipoMovimiento"]["nombre"]?>
      </td>
      <td>
        <?=$caja["User"]["nombre"]?>
      </td>



    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="6">Saldos</td>
    </tr>
    <tr>
        <td>Totales:</td>
        <td> $ <?=$total_ingresos?></td>
        <td> $ <?=$total_egresos?></td>
        <td colspan="3"> Saldo $ <?=$total_ingresos-$total_egresos?></td>        
    </tr>
    </tbody>
    <tfoot>
    </tfoot>
</table>

        
<?//= $this->form->end(); ?>
</div>
