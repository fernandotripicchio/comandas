<div id="pedidos_cerrar" class="PedidosForm">
    <?=$this->form->create('Pedido',array('action'=>'cerrar', 'id' => 'pedidoFormCerrar'));?>
    <input  type='hidden' name='data[Pedidos][estado]'  value ='Cerrado' />
   
 <fieldset>
        <legend>Cerrar Pedido Nro:<?=$pedido["id"]?>  </legend>
           <div class="span-21">
                 <?=$this->element("Pedidos/pedidosTable", array("pedido" => $pedido))?>
           </div>
           <div class="span-21">
                     <?=$this->form->submit("Cerrar Pedido" , array('div' => false,'class' => 'button left' ) )?>
                     <?=$this->html->link('Volver al Listado',array("controller"=>"pedidos", "action" => "index", "admin" => false), array('class' => 'button left'));?>
            </div>
 </fieldset>

    <?=$this->form->end();?>
</div>