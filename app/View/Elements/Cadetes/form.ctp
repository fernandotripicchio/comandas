    <fieldset>  
        <legend><?=$title?> </legend>  
        <table class="full">
             <tbody>
               <tr >
                 <td>Nombre:</td>
                 <td class="last">
                     <?=$this->form->input('nombre',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Celular:</td>
                 <td class="last">
                     <?=$this->form->input('celular',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Direccion:</td>
                 <td class="last">
                     <?=$this->form->input('direccion',    array('label'=> false,'type'=>'text', 'size'=>30,  'div' => array('tag' => '')));?>
                 </td>
               </tr>
               
                <tr>
                 <td colspan="2">
                   <hr />
                 </td>
               </tr>

                
               
             </tbody>

           </table>
    </fieldset>  