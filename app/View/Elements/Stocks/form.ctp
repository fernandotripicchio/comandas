    <fieldset>
        <legend><?=$title?> </legend>
        <table class="span-17">
             <tbody>
               <tr >
                 <td>Tipo:</td>
                 <td class="last">
                     <select name="data[Stock][tipo]" id="TipoMovimientoStock">
                         <option value=""></option>
                         <? foreach ($tipo as $key => $value) { ?>
                             <option value="<?=$key?>"> <?=$value?></option>
                         <? }?>
                     </select>
                 </td>
               </tr>   

               <tr >
                 <td>Producto:</td>
                 <td class="last">
                     <select name="data[Stock][producto_id]" id="ProductosStock">
                         <option value=""></option>
                         <? foreach ($productos as $key => $value) { ?>
                             <option value="<?=$key?>"> <?=$value?></option>
                         <? }?>
                     </select>
                 </td>
               </tr>   
               
               
               <tr id="rowIngreso" style="display: none">
                   <td>
                       Ingreso:
                   </td>
                   <td>
                       <?=$this->form->input('ingreso',    array('label'=> false,'type'=>'text', 'size'=>6,'value' => '', 'div' => array('tag' => '')));?>                     
                   </td>
               </tr>

               <tr id="rowEgreso" style="display: none">
                   <td>
                       Egreso:
                   </td>
                   <td>
                       <?=$this->form->input('egreso',    array('label'=> false,'type'=>'text', 'size'=>6,'value' => '', 'div' => array('tag' => '')));?>                     
                   </td>
               </tr>
               
               </tr>

               <tr >
                 <td>Motivo</td>
                 <td class="last">
                 <?=$this->form->textarea('motivo',    array('label'=> false,'type'=>'text', 'rows'=>10, 'cols' => 40, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>

             </tbody>

           </table>
    </fieldset>  