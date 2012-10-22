    <fieldset>  
        <legend><?=$title?> </legend>  
        <table class="span-17">
             <tbody>
               <tr >
                 <td >
                   Nombre
                   <?=$this->form->input('nombre',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr>
                 <td >
                     <?=$this->form->radio('tipo', array("ingreso" => "Ingreso", "egreso" => "Egreso"),   array('default'=>'egreso','label'=> false, 'class' => 'required', 'div' => array('tag' => '')));?>
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
               
               <tr>
                 <td colspan="2" style="text-align: center">
                     <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button left' ) )?>
                     <?=$this->html->link('Listado','/admin/tipo_movimientos/', array('class' => 'button left'));?>
                 </td>
               </tr>
                
               
             </tbody>

           </table>
    </fieldset>  