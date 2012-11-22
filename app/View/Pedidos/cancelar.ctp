<div id="pedidos_cancelar">
    <?=$this->form->create('Pedido',array('action'=>'cancelar', 'id' => 'pedidoFormCancelar'));?>
    <input  type='hidden' name='data[Pedidos][estado]'  value ='Cancelado' />
 <fieldset>
        <legend>Cancelar Pedido Nro:<?=$pedido["id"]?>  </legend>
        <div class="full">
                 <?=$this->element("Pedidos/pedidosTable", array("pedido" => $pedido))?>
        </div>
        <div class="full motivo_cancelacion">
          <table class="full">
               <tr >
                 <td valign="top" class="with-4"><strong>Motivo Cancelacion:</strong></td>
                 <td class="last left">
                     <?=$this->form->textarea('Pedidos.motivo_cancelacion',    array('label'=> false,'type'=>'text', 'rows'=>5, 'cols' => 50, 'class' => 'required', ' style' => 'width: 100%' , 'div' => array('tag' => '')));?>
                 </td>
               </tr>
          </table>
        </div>
        <div class="full center_image">
                     <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button' ) )?>
                     <?=$this->html->link('Volver al Listado',array("controller"=>"pedidos", "action" => "index", "admin" => false), array('class' => 'button'));?>
        </div>

 </fieldset>
 <?=$this->form->end();?>
<?php echo $this->Html->script('cancelar_pedido'); ?>
</div>