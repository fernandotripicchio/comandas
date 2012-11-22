<div id="pedido_edit">
    <?=$this->form->create('Pedido',array('action'=>'edit', 'id' => 'pedidoForm'));?>
 <fieldset>
        <legend>Editar Pedido Nro:<?=$pedido["id"]?>  </legend>
        <div class="full">
                 <?=$this->element("Pedidos/pedidosTable", array("pedido" => $pedido))?>
        </div>
        <div class="clear">&nbsp;</div>
        <div class="full">
          <table class="full">
               <tr >
                 <td  class="center">
                     <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button left' ) )?>
                     <?=$this->html->link('Volver al Listado',array("controller"=>"pedidos", "action" => "index", "admin" => false), array('class' => 'button left'));?>
                 </td>
               </tr>
          </table>
        </div>
 </fieldset>
    <?=$this->form->end();?>
</div>