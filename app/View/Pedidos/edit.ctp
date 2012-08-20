<div id="producto_add">
    <?=$this->form->create('Pedido',array('action'=>'edit', 'id' => 'pedidoForm'));?>

 <fieldset>
        <legend>Pedidos </legend>
        <table class="span-17">
             <tbody>
               <tr>
                 <td>Tipo: </td>
                 <td>
                   <?=$this->form->input('tipo',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Fecha Y Hora:</td>
                 <td class="last">
                     <?=$this->form->input('fecha',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>

               <tr >
                 <td>Total</td>
                 <td class="last">
                     <?=$this->form->input('total',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Paga con:</td>
                 <td class="last">
                     <?=$this->form->input('paga_con',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => '', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Vuelto:</td>
                 <td class="last">
                     <?=$this->form->input('vuelto',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => '', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Observaciones:</td>
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
                     <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button left' ) )?>
                     <?=$this->html->link('Listado',array("controller"=>"pedidos", "action" => "index", "admin" => false), array('class' => 'button left'));?>
                 </td>
               </tr>


             </tbody>

           </table>
 </fieldset>
    <?=$this->form->end();?>
</div>