    <fieldset>  
        <legend><?=$title?> </legend>  
        <table class="span-17">
             <tbody>
              <tr>
                   <th >Field</th>
                   <th>Value</th>
              </tr>
               <tr class="white">
                 <td class="first span-4 top">Login</td>
                 <td class="last">
                     <?=$this->form->input('username',    array('label'=> false,'type'=>'text', 'size'=>50, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               
               <tr class="white">
                 <td class="first span-4 top">Password</td>
                 <td class="last">
                     <?=$this->form->input('password', array('label'=>false, 'type'=>'text', 'size'=>50, 'class' => 'required  email', 'div' => array('tag' => '')));?>
                 </td>
               </tr>

               
               
               <tr>
                 <td colspan="2">
                     <?=$this->form->submit("Enviar")?>
                     <?=$this->html->link(' Listado ','/admin/users/');?>
                 </td>
               </tr>
                
               
             </tbody>

           </table>
    </fieldset>  