<div id="pedido_edit">
    <?=$this->form->create('Pedido',array('action'=>'edit', 'id' => 'pedidoForm'));?>
 <fieldset>
        <legend>Editar Pedido Nro:<?=$pedido["id"]?>  </legend>
        <div class="span-21">
                 <?=$this->element("Pedidos/pedidosTable", array("pedido" => $pedido))?>
        </div>
        <div class="span-21">
          <table class="span-20">
               <tr >
                 <td valign="top" class="span-8"><strong>Motivo Cancelacion:</strong></td>
                 <td class="last" style="float: left" class="span-15">
                     <?=$this->form->textarea('Pedidos.motivo_cancelacion',    array('label'=> false,'type'=>'text', 'rows'=>5, 'cols' => 50, 'class' => 'required', ' style' => 'width: 100%' , 'div' => array('tag' => '')));?>
                 </td>
               </tr>
          </table>
        </div>
        <div class="span-21">
          <table class="span-20">
               <tr >
                 <td colspan="2" style="text-align: center">
                     <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button left' ) )?>
                     <?=$this->html->link('Listado',array("controller"=>"pedidos", "action" => "index", "admin" => false), array('class' => 'button left'));?>
                 </td>
               </tr>
          </table>
        </div>
 </fieldset>
    <?=$this->form->end();?>
</div>