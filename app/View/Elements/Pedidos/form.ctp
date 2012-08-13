    <fieldset>  
        <legend><?=$title?> </legend>  
        <table class="span-17">
             <tbody>
               <tr >
                 <td>Descripcion:</td>
                 <td class="last">
                     <?=$this->form->textarea('observaciones',    array('label'=> false,'type'=>'text', 'rows'=>10, 'cols' => 40, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
                <tr>
                 <td colspan="2">
                   <hr />
                 </td>
               </tr>
               
               <tr>
                 <td colspan="2" style="text-align: center">
                     <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button sleft' ) )?>
                     <?=$this->html->link('Listado Pedidos','/pedidos/', array('class' => 'button sleft'));?>
                 </td>
               </tr>
                
               
             </tbody>

           </table>
    </fieldset>  