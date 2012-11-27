<div class="listado">
    
    <table>
        <caption>Movimientos de stock para: <?=$prod["Producto"]["nombre"]?> </caption>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Cantidad</th>
            <th>Fecha</th>            
            <th>Pedido</th>
            <th>Motivo</th>
            <th>Usuario</th>
        </tr>
        <? 
          foreach ($movimientos as $mov) { 
            $m = $mov["MovimientoStock"];
            $u = $mov["User"];
            $p = $mov["Pedido"];
        ?>
        <tr>
            <td><?=$m["id"]?></td>
            <td><?=$m["tipo"]?></td>
            <td><?= ($m["tipo"] == "ingreso")  ? $m["ingreso"] : "-".$m["egreso"]?></td>
            <td><?=$m["fecha"]?></td>
            <td><?=$p["id"]?></td>
            <td><?=$m["motivo"]?></td>
            <td><?=$u["nombre"]?></td>
        </tr>   
       <? } ?> 
    </table>
    
</div>