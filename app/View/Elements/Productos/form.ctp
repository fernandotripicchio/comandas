   <fieldset>
        <legend><?=$title?> </legend>  
        <table class="full">
             <tbody>
               <tr>
                 <td>Tipo: </td>
                 <td>
                   <?echo $this->form->select('tipo_id', $tipos, array("class" => "required")) ?>
                 </td>
               </tr>
               <tr >
                 <td>Nombre:</td>
                 <td class="last">
                     <?=$this->form->input('nombre',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>

               <tr >
                 <td>Precio Normal:</td>
                 <td class="last">
                     $ <?=$this->form->input('precio_normal',    array('label'=> false,'type'=>'text', 'size'=>4, 'class' => 'required number', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Precio Local:</td>
                 <td class="last">
                    $ <?=$this->form->input('precio_local',    array('label'=> false,'type'=>'text','value' => "0", 'size'=>4, 'class' => 'number', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Descripcion:</td>
                 <td class="last">
                     <?=$this->form->textarea('descripcion',    array('label'=> false,'type'=>'text', 'rows'=>10, 'cols' => 40, 'div' => array('tag' => '')));?>
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