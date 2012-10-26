    <fieldset>
        <legend><?=$title?> </legend>
        <table class="span-17">
             <tbody>
               <tr >
                 <td>Tipo</td>
                 <td class="last">
                     <select name="data[Caja][tipo_movimiento_id]" id="CajaTipoMovimientoId">
                         <option value=""></option>
                         <? foreach ($tipos as $tipo) { ?>
                             <option value="<?=$tipo["id"]?>" tipo-mov="<?=$tipo["tipo"]?>"> <?=$tipo["nombre"]?></option>
                         <? }?>
                     </select>
               
                   <?//echo $this->form->select('tipo_movimiento_id', $tipos) ?>
                 </td>
               </tr>
               <tr id="rowIngresos" style="display: none">
                 <td>Ingreso</td>
                 <td class="last">
                     <?=$this->form->input('ingresos',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required','value' => '0', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr id="rowEgresos" style="display: none">
                 <td>Egresos</td>
                 <td class="last">
                     <?=$this->form->input('egresos',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required','value' => '0', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr id="rowEmpleados" style="display: none">
                 <td>Empleado</td>
                 <td class="last">
                   <?echo $this->form->select('empleado_id', $users) ?>
                 </td>
               </tr>

               <tr >
                 <td>Motivo</td>
                 <td class="last">
                 <?=$this->form->textarea('motivo',    array('label'=> false,'type'=>'text', 'rows'=>10, 'cols' => 40, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>

                <tr>
                 <td colspan="2">
                   <hr />
                 </td>
               </tr>

               <tr>
                 <td colspan="2" style="text-align: center">
                     <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button left' ) )?>
                     <?=$this->html->link('Volver al Listado','/cajas/', array('class' => 'button left'));?>
                 </td>
               </tr>


             </tbody>

           </table>
    </fieldset>  