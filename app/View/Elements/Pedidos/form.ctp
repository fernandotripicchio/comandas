<input  type='hidden' name='data[Pedidos][Cliente][id]' id="pedidosClienteId" value ='' />
<input  type='hidden' name='data[Pedidos][Cliente][nuevo]' id="nuevoCliente" value ='0' />
<fieldset>  
        <legend><?=$title?> </legend>  
        <table class="span-21">
             <tbody>
               <tr style="height: 60px">
                 <td><strong>Tipo de Pedido:</strong></td>
                 <td>
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
                       <input type="text" name="key_cliente" id="keysCliente" size="10"> 
                       <?php echo $this->Html->link("Busqueda Rapida Cliente","#",array('class' => 'button', 'id' =>"buttonClienteBuscar"))?>                    
                       <?php echo $this->Html->link("Listado Clientes",array("controller" => "pedidos", "action" => "add_clientes"),array('class' => 'button', 'id' =>"buttonCliente"))?>
                       <?php echo $this->Html->link("Nuevo Cliente", "#", array("id" => "buttonNuevoCliente","class" => "button") )?>                      
                   </td>
               </tr>
               
               <tr id="rowClienteFields" style="display: none">
                  <td colspan="2"> 
                      <table class="full"> 
                         <tr id="rowNombreCliente" class="rowCliente">
                              <td><strong>Nombre:</strong></td>
                              <td>
                                  <?=$this->form->input('Pedidos.nombre', array('label'=> false,'type'=>'text','size' => 50, 'div' => array('tag' => '')));?>
                              </td>
                            </tr>
                         <tr id="rowDireccionCliente" class="rowCliente">
                              <td><strong>Direccion:</strong></td>
                              <td>
                                  <?=$this->form->input('Pedidos.direccion', array('label'=> false,'type'=>'text','size' => 50, 'div' => array('tag' => '')));?>
                              </td>
                         </tr>
                         <tr id="rowTelefonoCliente" class="rowCliente">
                              <td><strong>Telefono:</strong></td>
                              <td>
                                <?=$this->form->input('Pedidos.telefono', array('label'=> false,'type'=>'text','size' => 50, 'div' => array('tag' => '')));?>
                              </td>
                         </tr>                         
                      </table>       
                  </td>
               </tr>
 
              
               <tr id="rowPedidoMesa"  style="display: none">
                 <td><strong>Mesa:</strong></td>                 
                 <td>
                   <? for($i=1; $i<11; $i++) { ?>
                   <div class="column last">
                       <input type="radio" name="data[Pedidos][mesa]" id="radioMesa<?=$i?>" class="NumeroMesa" value="<?=$i?>">
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
                   <table id="tablaTotales" style="width:100%">
                     <tr>
                       <td > Total :</td>
                       <td>
                          $ <?php  echo $this->Form->input('Pedidos.total_pedido', array("id"=> "total_pedido","type" => "text", "label" => false, "div" => false, "readonly"=>true, 'size' => '4'));   ?>
                       </td>
                     </tr>
                     <tr id="rowPagaCon" >
                       <td>Paga con : </td>
                       <td>
                           <input type="button" value="$2"  money="2" name="2" id="pagaCon10" class="buttonPaga">
                           <input type="button" value="$5"  money="5" name="5" id="pagaCon10" class="buttonPaga">
                          <input type="button" value="$10"  money="10" name="10" id="pagaCon10" class="buttonPaga">
                          <input type="button" value="$20" money="20" name="20" id="pagaCon20" class="buttonPaga">
                          <input type="button" value="$50" money="50" name="50" id="pagaCon50" class="buttonPaga">
                          <input type="button" value="$100" money="100"  name="100" id="pagaCon100" class="buttonPaga">
                          <input type="button" value="Justo" money="justo" name="justo" id="pagaJusto" class="buttonPaga">
                          $<?php  echo $this->Form->input('paga_con', array("id"=> "paga_con","type" => "text", "label" => false, "div" => false, 'value' => '0', 'size' => '4'));   ?>
                          <?php   echo $this->Form->input('Pedidos.paga_con', array("id"=> "paga_con_hidden","type" => "hidden", "label" => false, "div" => false, 'value' => '0'));   ?>
                       </td>
                     </tr>
                     <tr id="rowVuelto">
                       <td>Vuelto : </td>
                       <td>
                          $ <?php  echo $this->Form->input('Pedidos.vuelto', array("id"=> "vuelto","type" => "text", "label" => false, "div" => false, 'size' => '4'));   ?>
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
                     <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button', 'id' => 'guardarPedido' ) )?>
                     <?=$this->html->link('Cancelar Pedido','/pedidos/', array('class' => 'button'));?>
                 </td>
               </tr>
                
               
             </tbody>

           </table>
    </fieldset>  