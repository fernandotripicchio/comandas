<div id="pedidos_cerrar" >
    <?//print_r($items)?>
  <fieldset>
        <legend>Cerrar Pedido Nro:<?=$pedido["Pedido"]["id"]?>  </legend>
           <div class="full">
                 <?=$this->element("Pedidos/pedidosTable", array("pedido" => $pedido["Pedido"], "items"=> $items))?>
           </div>
           <div class="clear">&nbsp;</div>
           <div class="full center">                    
                     <?=$this->html->link('Volver al Listado',array("controller"=>"pedidos", "action" => "index", "admin" => false), array('class' => 'button left'));?>
            </div>
 </fieldset>

  
</div>