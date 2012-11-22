<?php echo $this->Html->script('caja'); ?>
<div class="buttonActions">
   <?=$this->html->link('Nuevo Movimiento',array("controller"=>"cajas", "action" => "add", "admin" => false), array('class' => 'button left'));?>
   <?=$this->html->link('Cerrar Caja',array("controller"=>"cajas", "action" => "cerrar", "admin" => false), array('class' => 'button left'));?>    
</div>
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
     <td>
       Usuario que realizo el movimiento:
     </td>
     <td>
       <?echo $this->form->select('usuario', $users) ?>
     </td>
     
       <td><input type="submit" name="Buscar" value="Buscar"></td>
     
    </tr>
  </tbody>
  </table>
</div>


<br />
<br />
<div class="listados">
<? $total_ingresos = $total_egresos = 0;?>    
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
     <?$i=0;?>   
    <?php foreach ($cajas as $caja): ?>
    <? $total_ingresos +=$caja["Caja"]["ingresos"]; ?>
    <? $total_egresos +=$caja["Caja"]["egresos"]; ?>
    <tr class='<?= (($i++%2)? "odd": "even") ?>'>
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
   
    </tbody>
    <tfoot>
    </tfoot>
</table>

<table class="tablaSaldos">
      <caption>Saldos</caption>  
      <tr>
        <td class="textSaldos">Ingresos: $</td>
        <td> $ <?=$total_ingresos?></td>
        <td class="textSaldos">Egresos: $ </td>
        <td> $ <?=$total_egresos?></td>
        <td class="textSaldos"> Saldo: $ <?=$total_ingresos-$total_egresos?></td>        
      </tr>        
</table>
       </div>
<hr /> 
<?//= $this->form->end(); ?>

