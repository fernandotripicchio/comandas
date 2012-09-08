<input  type='hidden' name='data[Pedidos][Cliente][id]' id="pedidosClienteId" value ='' />
<input  type='hidden' name='data[Pedidos][Cliente][nombre]' id="pedidosClienteNombre" value ='' />


<fieldset>  
        <legend><?=$title?> </legend>  
        <table class="span-19">
             <tbody>
               <tr style="height: 60px">
                 <td><strong>Tipo de Pedido:</strong></td>
                 <td>
                   <?//php  echo $this->Form->radio('Pedidos.tipo',$options,$attributes);   ?>
                   <input type="radio" name="data[Pedidos][tipo]" id="PedidosTipoDelivery" class="radioTipoPedido" value="delivery" checked="checked">
                   <label for="PedidosTipoDelivery">
                     <span class="buttonOrange">Delivery</span>
                   </label>
                   <input type="radio" name="data[Pedidos][tipo]" id="PedidosTipoMostrador" class="radioTipoPedido" value="mostrador">
                   <label for="PedidosTipoMostrador">
                     <span class="buttonGreen">Mostrador</span>
                   </label>
                   <input type="radio" name="data[Pedidos][tipo]" id="PedidosTipoMesa" class="radioTipoPedido" value="mesa">
                   <label for="PedidosTipoMesa">
                     <span class="buttonYellow">Mesa</span>
                   </label>
                 </td>
               </tr>
               <tr id="rowPedidoCliente" style="height: 60px" class="rowCliente">
                 <td><strong>Cliente:</strong></td>
                 <td>
                    <?php echo $this->Html->link("Seleccionar Cliente",array("controller" => "pedidos", "action" => "add_clientes"),array('class' => 'button', 'id' =>"buttonCliente"))?>

                 </td>
               </tr>
               <tr id="rowNombreCliente" class="rowCliente">
                 <td><strong>Nombre:</strong></td>
                 <td>
                     <?=$this->form->input('Pedidos.nombre',    array('label'=> false,'type'=>'text','size' => 120, 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr id="rowDireccionCliente" class="rowCliente">
                 <td><strong>Direccion:</strong></td>
                 <td>
                     <?=$this->form->input('Pedidos.direccion',    array('label'=> false,'type'=>'text','size' => 120, 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr id="rowTelefonoCliente" class="rowCliente">
                 <td><strong>Telefono:</strong></td>
                 <td>
                     <?=$this->form->input('Pedidos.telefono',    array('label'=> false,'type'=>'text','size' => 120, 'div' => array('tag' => '')));?>
                 </td>
               </tr>
                                  
<!--
               <tr id="rowTableCliente">
                 <td>&nbsp;</td>
                 <td>
                   <table id="tablaCliente">
                     <tr>
                       <td></td>
                     </tr>
                   </table>
                 </td>
               </tr>
               -->
               
               <tr id="rowPedidoMesa"  style="display: none">
                 <td><strong>Mesa:</strong></td>
                 
                 <td>
                   <? for($i=1; $i<11; $i++) { ?>
                   <div class="column last">
                       <input type="radio" name="mesa" id="radioMesa<?=$i?>" class="radioTipoMesa" value="mesa <?=$i?>">
                       <label for="radioMesa<?=$i?>">
                         <span class="buttonYellow">Mesa <?=$i?></span>
                       </label>
                   </div>

                   <? } ?>
                 </td>

               </tr>


               <tr style="height: 60px">
               <td><strong>Productos:</strong></td>
                 <td>
                    <?php echo $this->Html->link("Agregar Productos",array("controller" => "pedidos", "action" => "add_productos"),array('class' => 'button', 'id' =>"buttonAgregar"))?>
                 </td>
               </tr>
               <tr>
                 <td> &nbsp; </td>
                 <td>
                   <table id="tablaPedidos" >
                     <tr>
                       <th style="width: 10%">Cantidad</th>
                       <th style="width: 20%">Producto</th>
                       <th style="width: 10%">Precio</th>
                       <th>Observaciones</th>
                       <th>&nbsp;</th>
                     </tr>
                   </table>
                 </td>
               </tr>
               <tr id="rowTotales" style="display: none">
                 <td> &nbsp; </td>
                 <td>
                   <table id="tablaTotales">
                     <tr>
                       <td>Total : </td>
                       <td>
                          $ <?php  echo $this->Form->input('Pedidos.total_pedido', array("id"=> "total_pedido","type" => "text", "label" => false, "div" => false, "readonly"=>true));   ?>
                       </td>
                     </tr>
                     <tr>
                       <td>Paga con : </td>
                       <td>
                         <input type="button" value="$10"  money="10" name="10" id="pagaCon10" class="buttonPaga">
                          <input type="button" value="$20" money="20" name="20" id="pagaCon20" class="buttonPaga">
                          <input type="button" value="$50" money="50" name="50" id="pagaCon50" class="buttonPaga">
                          <input type="button" value="$100" money="100"  name="100" id="pagaCon100" class="buttonPaga">
                          <input type="button" value="Justo" money="justo" name="justo" id="pagaJusto" class="buttonPaga">
                          $<?php  echo $this->Form->input('paga_con', array("id"=> "paga_con","type" => "text", "label" => false, "div" => false));   ?>
                          <?php   echo $this->Form->input('Pedidos.paga_con', array("id"=> "paga_con_hidden","type" => "hidden", "label" => false, "div" => false));   ?>
                       </td>
                     </tr>
                     <tr>
                       <td>Vuelto : </td>
                       <td>
                          $ <?php  echo $this->Form->input('Pedidos.vuelto', array("id"=> "vuelto","type" => "text", "label" => false, "div" => false));   ?>
                       </td>
                     </tr>
                   </table>
                 </td>
               </tr>
               <tr >
                 <td valign="top"><strong>Observaciones:</strong></td>
                 <td class="last">
                     <?=$this->form->textarea('Pedidos.observaciones',    array('label'=> false,'type'=>'text', 'rows'=>5, 'class' => 'required', ' style' => 'width: 100%' , 'div' => array('tag' => '')));?>
                 </td>
               </tr>
                <tr>
                 <td colspan="2">
                   <hr />
                 </td>
               </tr>
               
               <tr>
                 <td colspan="2" style="text-align: center">
                     <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button left', 'id' => 'guardarPedido' ) )?>
                     <?=$this->html->link('Cancelar Pedido','/pedidos/', array('class' => 'button left'));?>
                 </td>
               </tr>
                
               
             </tbody>

           </table>
    </fieldset>  