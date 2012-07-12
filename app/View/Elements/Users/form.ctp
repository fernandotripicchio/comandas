    <fieldset>  
        <legend><?=$title?> </legend>  
        <table class="span-17">
             <tbody>
               <tr >
                 <td>Nombres:</td>
                 <td class="last">
                     <?=$this->form->input('nombre',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Apellido:</td>
                 <td class="last">
                     <?=$this->form->input('apellido',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Email:</td>
                 <td class="last">
                     <?=$this->form->input('email',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'email', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Login:</td>
                 <td class="last">
                     <?=$this->form->input('username',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               
               <tr >
                 <td >Password:</td>
                 <td class="last">
                     <?=$this->form->input('password', array('label'=>false, 'type'=>'password', 'size'=>30, 'class' => 'required', 'id' => 'password', 'div' => array('tag' => '')));?>
                 </td>
               </tr>

               <tr >
                 <td >Confirmar Password:</td>
                 <td class="last">
                     <?=$this->form->input('password_confirm', array('label'=>false, 'type'=>'password', 'size'=>30, 'class' => '', 'id' => 'confirm_password', 'div' => array('tag' => '')));?>
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
                     <?=$this->html->link('Listado','/users/', array('class' => 'button sleft'));?>
                 </td>
               </tr>
                
               
             </tbody>

           </table>
    </fieldset>  