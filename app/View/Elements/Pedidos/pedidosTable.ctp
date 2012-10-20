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

               <tr >
                 <td> <strong> Total </strong></td>
                 <td class="last">
                     $ <?=$pedido["total"]?>
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