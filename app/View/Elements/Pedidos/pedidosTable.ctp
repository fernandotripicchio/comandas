<table class="pedidoTable">
  <tbody>
      <tr>
         <td class="with-2 title">Tipo:</td>
         <td class="red">
               <?= strtoupper($pedido["tipo"])?>
         </td>
      </tr>
      <tr>
         <td class="with-2 title"> <strong> Fecha Y Hora: </strong></td>
         <td class="last">
               <?= $pedido["fecha"]?>
         </td>
      </tr>
      <tr>
        <td class="with-2 title"> <strong> Atraso: </strong></td>
        <td class="last">
                <?php echo round( (mktime() - strtotime($pedido['fecha']))/60 ) ?> Min.
        </td>
      </tr>
      <tr>
        <td class="with-2 title"> <strong> Observaciones: </strong></td>
        <td class="last">
                     <p> <?=($pedido["observaciones"]) ? $pedido["observaciones"] : "No tiene observaciones"?> </p>
        </td>
      </tr>      
      <tr>
          <td colspan="2" class="title productosTitle">  
              Productos 
          </td>
       </tr>
       <tr>
           <td colspan="2">
                 <table class="full productos">
                     <tr>
                         <td class="with-6 title">Descripcion</td>
                         <td class="title">Precio</td>
                     </tr>
                     <? foreach ($items as $item) { ?>
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

   </tbody>
</table>