<input  type='hidden' name='data[Pedidos][Cliente][id]' id="pedidosClienteId" value ='' />
<input  type='hidden' name='data[Pedidos][Cliente][nombre]' id="pedidosClienteNombre" value ='' />


<fieldset>  
        <legend><?=$title?> </legend>  
        <table class="span-19">
             <tbody>
               <tr>
                 <td><strong>Tipo de Pedido:</strong></td>
                 <td>
                   <?php  echo $this->Form->radio('Pedidos.tipo',$options,$attributes);   ?>
                 </td>
               </tr>
               <tr id="rowPedidoCliente" >
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
                       <td>No ha seleccionado ningun cliente</td>
                     </tr>
                   </table>
                 </td>
               </tr>
               
               <tr id="rowPedidoMesa"  style="display: none">
                 <td><strong>Mesa:</strong></td>
                 <td>
                      <?php                      
                      echo $this->Form->select('Pedidos.mesa', $mesas, $attributes_mesas)
                      ?>
                 </td>
               </tr>


               <tr>
               <td><strong>Productos:</strong></td>
                 <td>
                    <?php echo $this->Html->link("Agregar Productos",array("controller" => "pedidos", "action" => "add_productos"),array('class' => 'button', 'id' =>"buttonAgregar"))?>
                 </td>
               </tr>
               <tr>
                 <td> &nbsp; </td>
                 <td>
                   <table id="tablaPedidos" style="width: 100%; background-color: white">
                     <tr>
                       <td style="width: 10%">Cantidad</td>
                       <td style="width: 20%">Producto</td>
                       <td style="width: 10%">Precio</td>
                       <td>Observaciones</td>
                       <td>&nbsp;</td>
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