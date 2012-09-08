<div id="producto_add">
    <?=$this->form->create('Pedido',array('action'=>'cancelar', 'id' => 'pedidoFormCancelar'));?>
    <input  type='hidden' name='data[Pedidos][estado]'  value ='cancelado' />
   
 <fieldset>
        <legend>Pedidos </legend>
        <table class="span-17">
             <tbody>
               <tr>
                 <td> <strong> Tipo:  </strong></td>
                 <td>
                   <?=$pedido["tipo"]?>
                 </td>
               </tr>
               <tr >
                 <td> <strong> Fecha Y Hora: </strong></td>
                 <td class="last">
                     <?=$pedido["fecha"]?>
                 </td>
               </tr>

               <tr >
                 <td> <strong> Total </strong></td>
                 <td class="last">
                     <?=$pedido["total"]?>
                 </td>
               </tr>
               <tr >
                 <td> <strong> Observaciones: </strong></td>
                 <td class="last">
                     <?=$pedido["observaciones"]?>
                 </td>
               </tr>
               <tr >
                 <td valign="top"><strong>Motivo Cancelacion:</strong></td>
                 <td class="last">
                     <?=$this->form->textarea('Pedidos.motivo_cancelacion',    array('label'=> false,'type'=>'text', 'rows'=>5, 'class' => 'required', ' style' => 'width: 100%' , 'div' => array('tag' => '')));?>
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