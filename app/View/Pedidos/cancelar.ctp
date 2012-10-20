<div id="pedidos_cancelar" class="PedidosForm">
    <?=$this->form->create('Pedido',array('action'=>'cancelar', 'id' => 'pedidoFormCancelar'));?>
    <input  type='hidden' name='data[Pedidos][estado]'  value ='Cancelado' />
 <fieldset>
        <legend>Cancelar Pedido Nro:<?=$pedido["id"]?>  </legend>
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
                     <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button left' ) )?>
                     <?=$this->html->link('Volver al Listado',array("controller"=>"pedidos", "action" => "index", "admin" => false), array('class' => 'button left'));?>
        </div>

 </fieldset>
 <?=$this->form->end();?>
<?php echo $this->Html->script('cancelar_pedido'); ?>
</div>