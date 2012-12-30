<?php echo $this->Html->script('listado_pedidos'); ?>
<div class="formulario_busqueda">
<?= $this->form->create('Pedido',array('action'=>'index', 'id' => 'pedidoFormBusqueda'));?>
  <input type="hidden" name="keys[estado]" value="<?=$pedidosSession["estado"]?>">
<table >
  <caption>Busqueda de Pedidos</caption>
  <tbody>
    <tr>
      <td>Cliente:</td>
      <td><input type="text" name="keys[cliente]" value="<?=$pedidosSession["cliente"]?>"></td>

      <td>Tipo de Pedido:</td>
      <td>
         <select name="keys[tipo_pedido]">
                 <option value="todos"     <?=(($pedidosSession["tipo_pedido"] == "todos") ? "selected": "")?>>Todos</option>
                 <option value="delivery"  <?=(($pedidosSession["tipo_pedido"] == "delivery") ? "selected": "")?>>Delivery</option>
                 <option value="mesa"      <?=(($pedidosSession["tipo_pedido"] == "mesa") ? "selected": "")?>>Mesa</option>
                 <option value="mostrador" <?=(($pedidosSession["tipo_pedido"] == "mostrador") ? "selected": "")?> >Mostrador</option>
        </select>
      </td>

      <td>Demora:</td>
      <td>
         <select name="keys[demora]">
                 <option value="0"         <?=(($pedidosSession["demora"] == "0") ? "selected": "")?>>Todos</option>
                 <option value="en_tiempo" <?=(($pedidosSession["demora"] == "en_tiempo") ? "selected": "")?>>En Tiempo</option>
                 <option value="mas_20"    <?=(($pedidosSession["demora"] == "mas_20") ? "selected": "")?>>Mas de 20 Min</option>
                 <option value="mas_40"    <?=(($pedidosSession["demora"] == "mas_40") ? "selected": "")?>>Mas de 40 Min</option>
        </select>
      
      </td>
    </tr>
    <tr>
      <td>Nro Pedido:</td>
      <td><input type="text" name="keys[numero_pedido]" value="<?=$pedidosSession["numero_pedido"]?>"></td>
      <td>Cadete:</td>
      <td>
        <select name="keys[cadete]">
                 <option value="0">Todos</option>
                 <?php for($i=0; $i < count($cadetes); $i++){ ?>
                       <option value="<?=$cadetes[$i]["id"]?>" <?=(($pedidosSession["cadete"] == $cadetes[$i]["id"]) ? "selected": "")?>><?=$cadetes[$i]["nombre"]?></option>
                 <?php }?>
        </select>
      </td>
      <td>Producto:</td>
      <td>
        <select name="keys[producto]">
                 <option value="0">Todos</option>
                 <?php for($i=0; $i < count($productos); $i++){ ?>
                 <option value="<?=$productos[$i]["id"]?>" <?=(($pedidosSession["producto"] == $productos[$i]["id"]) ? "selected": "")?>><?=$productos[$i]["nombre"]?></option>
                 <?php }?>
        </select>
      </td>
    </tr>
    <tr>
        <td>Fecha Desde</td>
        <td><input type="text" name="keys[fecha_desde]" id="datepickerDesde" value="<?= $pedidosSession["fecha_desde"]?>" /></td>
        <td>Fecha Hasta</td>
        <td><input type="text" name="keys[fecha_hasta]" id="datepickerHasta" value="<?= $pedidosSession["fecha_hasta"]?>"/></td>
    </tr>
    <tr>
      <td colspan="2">
          <input type="submit" name="Reset" value="Limpiar Formulario">
          <input type="submit" name="Buscar" value="Buscar">
          
      </td>
    </tr>
  </tbody>
</table>
<?= $this->form->end(); ?>
</div>
<br />
<div class="halffull box ">
    <table >
        <tr>
        <td class="span-1 mas_20" > &nbsp;</td>
        <td> <strong> Más de 20 min de atraso </strong> </td>
        <td class="span-1 mas_40" > &nbsp;</td>
        <td> <strong> Más de 40 min de atraso </strong> </td>
        </tr>
        
    </table>
</div>
<div class="clear"></div>
<div class="listados">
<ul class="tabset_tabs">
   <li><?php echo $this->html->link("Pedido  Activos", array("controller" => "pedidos", "action" => "index", "activos"), array("class" =>($pedidosSession["estado"]=="activos")?"active":""))?></li>
   <li><?php echo $this->html->link("Peditos No Activos", array("controller" => "pedidos", "action" => "index", "no_activos"),array("class" =>($pedidosSession["estado"]=="no_activos")?"active":""))?></li>
   <li><?php echo $this->html->link("Todos Los Pedidos", array("controller" => "pedidos", "action" => "index", "todos"),array("class" =>($pedidosSession["estado"]=="todos")?"active":""))?></li>
</ul>
    
<?= $this->form->create('Pedido',array('action'=>'actions_pedidos', 'id' => 'pedidoFormActions'));?>

<table >
  
  <thead>
    <tr>
        <th scope="col">&nbsp;</th>
        <th scope="col">Nro</th>
        <th scope="col">Tipo</th>        
        <th scope="col">Cliente</th>
        <th scope="col">Sucursal</th>
        <th scope="col">Fecha</th>
        <th scope="col">Atraso</th>
        <th scope="col">Estado</th>
        <th scope="col">Cadete</th>
        <th scope="col">&nbsp;</th>
    </tr>
</thead>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <tbody>
    <? $i = 0;?>    
    <?php foreach ($pedidos as $pedido): ?>
     <? 
     $tiempo_demora =  ($pedido['Pedido']['estado'] == "En Camino" )  ?  $pedido['Pedido']['demora_pedido'] :  $tiempo_demora = $pedido['Pedido']['fecha'];
     $atraso = round( (mktime() - strtotime($tiempo_demora))/60 );      
    if ($pedidosSession["estado"]=="activos" ) {
            $class = "en_tiempo";
            if((int)$atraso > 20) {
                  $class = "mas_20";
            }
            if ((int)$atraso > 40) {
                  $class = "mas_40";
            }
    } else {
           $class = "";
    }

    ?>
      
      <tr class='<?= (($i++%2)? "odd": "even") ?>'>
            
         <td style="width:1px">
          <? if ($pedido['Pedido']['tipo'] == "delivery") { ?>
           <input type="checkbox" name="Pedidos[id][]" value="<?=$pedido['Pedido']['id']?>">
         <? } ?>
         <td class="<?=$class?> center">
           <?php echo $pedido['Pedido']['id']; ?></td>
         <td class="with-2">
           <?php echo $this->element("tipo_pedido", array("tipo" => $pedido['Pedido']['tipo'], "mesa" => $pedido['Pedido']['mesa'] ))?>
        </td>
         <td>
           <?php echo $pedido['Cliente']['nombre'] ?>
        </td>
         <td>
           <?php echo $pedido['Sucursal']['sucursal_nombre'] ?>
        </td>
        
         <td class="center">
           <?php echo $pedido['Pedido']['fecha'] ?>
         </td>
         <td class="center">
           <?= ($pedidosSession["estado"] == "activos") ?  $atraso."Min" :  "No Activo"; ?>
         </td>
         <td class="center">
           <?php echo $pedido['Pedido']['estado'] ?>
         </td>
         <td class="center">
            <? if ( $pedidosSession["estado"] == "activos" &&  $pedido['Pedido']['tipo'] == "delivery" ) { ?>
               <select name="Cadetes[<?=$pedido['Pedido']['id']?>]">
                 <option value="0"></option>
                 <?php for($i=0; $i < count($cadetes); $i++){ ?>
                 <option value="<?=$cadetes[$i]["id"]?>" <?= ($pedido['Pedido']['cadete_id'] == $cadetes[$i]["id"]) ? "selected" : "" ?>><?=$cadetes[$i]["nombre"]?></option>
                 <?php }?>
               </select>
            <? } else {
             if ($pedido['Pedido']['tipo'] == "delivery") { 
               echo $pedido['Cadete']['nombre'];
             }}?>
        </td>
        <td class="last with-5" >            
         <? echo $this->html->link("Ver", array("controller" => "pedidos", "action" => "show", $pedido['Pedido']['id']), array("class" => "button", "title" => "Ver Pedido"))?>            
         <? 
         $mostrar_cerrar = false;
         if ($pedidosSession["estado"] == "activos")  { 
                     
                     if ($pedido['Pedido']['tipo'] == "delivery") {
                         $mostrar_cerrar = ( $pedido['Pedido']['cadete_id'] != 0) ? true : false ;
                     } else {
                         $mostrar_cerrar = true;
                     }
                     if ($mostrar_cerrar) {
                         echo $this->html->link("Cerr", array("controller" => "pedidos", "action" => "cerrar", $pedido['Pedido']['id']), array("class" => "button", "title" => "Cerrar Pedido"));
                     }
                    
                    echo $this->html->link("Canc", array("controller" => "pedidos", "action" => "cancelar", $pedido['Pedido']['id']), array("class" => "button", "title" => "Cancelar Pedido"));
                    if ($pedido['Pedido']['tipo'] == "mesa") {
                          echo $this->html->link("Edi", array("controller" => "pedidos", "action" => "edit", $pedido['Pedido']['id']), array("class" => "button", "title" => "Editar Pedido"));
                    } 
          } 
          else 
              echo "&nbsp;"
         ?>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    </tfoot>

</table>
<? if ($pedidosSession["estado"] == "activos")  { ?>
      <div class="buttons_actions">
           <input type="submit" name="asignar_cadete" value="Asignar Cadetes">
      </div>
<? }?>
<?= $this->form->end(); ?>
</div>