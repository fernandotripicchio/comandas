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
                 <td>Precio Normal:</td>
                 <td class="last">
                     <?=$this->form->input('precio_normal',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Precio Local:</td>
                 <td class="last">
                     <?=$this->form->input('precio_local',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => '', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Descripcion:</td>
                 <td class="last">
                     <?=$this->form->textarea('descripcion',    array('label'=> false,'type'=>'text', 'rows'=>10, 'cols' => 40, 'class' => 'required', 'div' => array('tag' => '')));?>
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
                     <?=$this->html->link('Listado','/productos/', array('class' => 'button sleft'));?>
                 </td>
               </tr>
                
               
             </tbody>

           </table>
    </fieldset>  