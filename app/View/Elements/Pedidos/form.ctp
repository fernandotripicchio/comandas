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
               <tr id="rowPedidoCliente" style="height: 60px">
                 <td><strong>Cliente:</strong></td>
                 <td>
                    <?php echo $this->Html->link("Agregar Cliente",array("controller" => "pedidos", "action" => "add_clientes"),array('class' => 'button', 'id' =>"buttonCliente"))?>
                 </td>
               </tr>
               <tr id="rowTableCliente">
                 <td>&nbsp;</td>
                 <td>
                   <table id="tablaCliente">
                     <tr>
                       <td><strong>Todavia no ha seleccionado ningun cliente</strong></td>
                     </tr>
                   </table>
                 </td>
               </tr>
               
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
                          <?php  echo $this->Form->input('Pedidos.total_pedido', array("id"=> "total_pedido","type" => "text", "label" => false, "div" => false));   ?>
                       </td>
                     </tr>
                     <tr>
                       <td>Paga con : </td>
                       <td>
                          <?php  echo $this->Form->input('Pedidos.paga_con', array("id"=> "paga_con","type" => "text", "label" => false, "div" => false));   ?>
                       </td>
                     </tr>
                     <tr>
                       <td>Vuelto : </td>
                       <td>
                          <?php  echo $this->Form->input('Pedidos.vuelto', array("id"=> "vuelto","type" => "text", "label" => false, "div" => false));   ?>
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
                     <?=$this->html->link('Listado Pedidos','/pedidos/', array('class' => 'button left'));?>
                 </td>
               </tr>
                
               
             </tbody>

           </table>
    </fieldset>  