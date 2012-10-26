        <table class="span-20">
             <tbody>
               <tr>
                 <td width="span-9"> <strong> Tipo:  </strong></td>
                 <td class="red">
                   <?= strtoupper($pedido["tipo"])?>
                 </td>
               </tr>
               <tr >
                 <td> <strong> Fecha Y Hora: </strong></td>
                 <td class="last">
                     <?= $pedido["fecha"]?>
                 </td>
               </tr>
               <tr >
                 <td> <strong> Atraso: </strong></td>
                 <td class="last">
                     <?php echo round( (mktime() - strtotime($pedido['fecha']))/60 ) ?> Min.
                 </td>
               </tr>

               <tr >
                 <td colspan="2" class="center"> <strong> Productos </strong></td>
               </tr>
               <tr>
             <td colspan="2">
                 <table class="span-12"  >
                     <tr>
                         <td><strong>Descripcion</strong></td>
                         <td><strong>Precio</strong></td>
                     </tr>
                     <? foreach ($items as $item) { ?>
                     <?//print_r($item);?>
                     <tr>
                         <td><?=$item["Producto"]["nombre"]?></td>
                         <td>$<?=$item["Item"]["precio"]?></td>
                     </tr>
                     
                     <?}?>
                     <tr>
                         <td colspan="2"><hr /></td>
                     </tr>
                     <tr>
                         <td>Total</td>
                 <td class="last">
                     $ <?=$pedido["total"]?>
                 </td>                         
                     </tr>
                 </table>
             </td>
        </tr>
 
               <tr >
                 <td> <strong> Observaciones: </strong></td>
                 <td class="last">
                     <p> <?=($pedido["observaciones"]) ? $pedido["observaciones"] : "No tiene observaciones"?> </p>
                 </td>
               </tr>
            </tbody>

           </table>