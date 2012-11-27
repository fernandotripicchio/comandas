    <fieldset>  
        <legend><?=$title?> </legend>  
        <table class="full">
             <tbody>
               <tr >
                 <td >
                   Nombre
                   <?=$this->form->input('nombre',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr>
                 <td >
                     <?=$this->form->radio('tipo', array("ingreso" => "Ingreso", "egreso" => "Egreso", "ingreso/egreso" => "Ingreso/Egreso"),   array('default'=>'ingreso','label'=> false, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr>
                 <td >
                     <?=$this->form->radio('activo', array("0" => "No", "1" => "Si"),   array('default'=>'1','label'=> false, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>

               </tr>
                <tr>
                 <td >
                   <hr />
                 </td>
               </tr>

                
               
             </tbody>

           </table>
    </fieldset>  