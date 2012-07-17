    <fieldset>  
        <legend><?=$title?> </legend>  
        <table class="span-17">
             <tbody>
               <tr >
                 <td>Nombre:</td>
                 <td class="last">
                     <?=$this->form->input('nombre',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>

               <tr >
                 <td>Direccion:</td>
                 <td class="last">
                     <?=$this->form->input('direccion',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Telefono:</td>
                 <td class="last">
                     <?=$this->form->input('telefono',    array('label'=> false,'type'=>'text', 'size'=>30,  'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Observaciones:</td>
                 <td class="last">
                     <?=$this->form->textarea('observaciones',    array('label'=> false,'type'=>'text', 'rows'=>10, 'cols' => 40,  'div' => array('tag' => '')));?>
                 </td>
               </tr>

                <tr>
                 <td colspan="2">
                   <hr />
                 </td>
               </tr>
               
               <tr>
                 <td colspan="2" style="text-align: center">
                     <?=$this->form->submit("Enviar" , array('div' => false,'class' => 'button sleft' ) )?>
                     <?=$this->html->link('Listado','/clientes/', array('class' => 'button sleft'));?>
                 </td>
               </tr>
                
               
             </tbody>

           </table>
    </fieldset>  