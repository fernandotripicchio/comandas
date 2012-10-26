<div class="formulario_busqueda">
<?= $this->form->create('Pedido',array('action'=>'index', 'id' => 'pedidoFormBusqueda'));?>
  <input type="hidden" name="estado" value="<?=$estado?>">
<table >
  <caption>Busqueda de Pedidos</caption>
  <tbody>
    <tr>
      <td>Cliente:</td>
      <td><input type="text" name="cliente" value="<?=$cliente?>"></td>

      <td>Tipo de Pedido:</td>
      <td>
         <select name="tipo_pedido">
                 <option value="todos"     <?=(($tipo_pedido == "todos") ? "selected": "")?>>Todos</option>
                 <option value="delivery"  <?=(($tipo_pedido == "delivery") ? "selected": "")?>>Delivery</option>
                 <option value="mesa"      <?=(($tipo_pedido == "mesa") ? "selected": "")?>>Mesa</option>
                 <option value="mostrador" <?=(($tipo_pedido == "mostrador") ? "selected": "")?> >Mostrador</option>
        </select>
      </td>

      <td>Demora:</td>
      <td>
         <select name="demora">
                 <option value="0">Todos</option>
                 <option value="en_tiempo" >En Tiempo</option>
                 <option value="mas_20" >Mas de 20 Min</option>
                 <option value="mas_40" >Mas de 40 Min</option>
        </select>
      
      </td>
    </tr>
    <tr>
      <td>Nro Pedido:</td>
      <td><input type="text" name="numero_pedido" value="<?=$numero_pedido?>"></td>
      <td>Cadete:</td>
      <td>
        <select name="cadete">
                 <option value="0">Todos</option>
                 <?php for($i=0; $i < count($cadetes); $i++){ ?>
                 <option value="<?=$cadetes[$i]["id"]?>" ><?=$cadetes[$i]["nombre"]?></option>
                 <?php }?>
        </select>
      </td>
      <td>Producto:</td>
      <td>
        <select name="producto">
                 <option value="0">Todos</option>
                 <?php for($i=0; $i < count($productos); $i++){ ?>
                 <option value="<?=$productos[$i]["id"]?>" ><?=$productos[$i]["nombre"]?></option>
                 <?php }?>
        </select>
      </td>
    </tr>
    <tr>
      <td><input type="submit" name="Buscar" value="Buscar"></td>
    </tr>
  </tbody>
</table>
<?= $this->form->end(); ?>
</div>
<br />
<div class="listado_pedidos">
<?= $this->form->create('Pedido',array('action'=>'actions_pedidos', 'id' => 'pedidoFormActions'));?>
<div id="navigation_tab">
 <ul id="tabs">
 <li id="tab1"><?php echo $this->html->link("Activos", array("controller" => "pedidos", "action" => "index", "activos"))?></li>
 <li id="tab2"><?php echo $this->html->link("No Activos", array("controller" => "pedidos", "action" => "index", "no_activos"))?></li>
 <li id="tab4"><?php echo $this->html->link("Todos", array("controller" => "pedidos", "action" => "index", "todos"))?></li>
 </ul>
</div>
  <hr />
<table >
  <caption>Pedidos</caption>
  <thead>
    <tr>
        <th scope="col">&nbsp;</th>
        <th scope="col">Nro</th>
        <th scope="col">Tipo</th>        
        <th scope="col">Cliente</th>
        <th scope="col">Fecha</th>
        <th scope="col">Atraso</th>
        <th scope="col">Estado</th>
        <th scope="col">Cadete</th>
        <th scope="col">&nbsp;</th>
    </tr>
</thead>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <tbody>
    <?php foreach ($pedidos as $pedido): ?>
    <? 
    
    if ($pedido['Pedido']['estado'] == "En Camino" ) {
      $tiempo_demora = $pedido['Pedido']['demora_pedido'];     
    } else {
      $tiempo_demora = $pedido['Pedido']['fecha'];
    }
    
    $atraso = round( (mktime() - strtotime($tiempo_demora))/60 );      
    if ($estado=="activos" ){
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
      
      <tr class="<?=$class?>">
            
         <td>
          <? if ($pedido['Pedido']['tipo'] == "delivery") { ?>
           <input type="checkbox" name="Pedidos[id][]" value="<?=$pedido['Pedido']['id']?>">
         <? } ?>
         <td >
           <?php echo $pedido['Pedido']['id']; ?></td>
         <td style="background: white">
           <?php echo $this->element("tipo_pedido", array("tipo" => $pedido['Pedido']['tipo'], "mesa" => $pedido['Pedido']['mesa'] ))?>
        </td>
         <td>
           <?php echo $pedido['Cliente']['nombre'] ?>
        </td>
         <td>
           <?php echo $pedido['Pedido']['fecha'] ?>
         </td>
         <td>
           <? if ($estado == "activos")
           echo $atraso."Min";
           else echo "No Activo";
           ?>
         </td>

         <td>
           <?php echo $pedido['Pedido']['estado'] ?>
         </td>
    
         <td>
            <? if ($pedido['Pedido']['tipo'] == "delivery" && ( $pedido['Pedido']['estado'] == "En Cocina")  ) { ?>
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

        
        <? if ($estado == "activos")  { ?>
        <td>
  
            
           <? if ( ($pedido['Pedido']['tipo'] == "delivery" &&  $pedido['Pedido']['estado'] == "En Camino" ) || ($pedido['Pedido']['tipo'] == "mesa") || ($pedido['Pedido']['tipo'] == "mostrador")) { ?> 
               <? echo $this->html->link("Cerrar", array("controller" => "pedidos", "action" => "cerrar", $pedido['Pedido']['id']), array("class" => "button"))?>
           <?} ?>
            
           <? echo $this->html->link("Cancelar", array("controller" => "pedidos", "action" => "cancelar", $pedido['Pedido']['id']), array("class" => "button"))?>
            
          <? if ($pedido['Pedido']['tipo'] == "mesa") {?>
          <? echo $this->html->link("Editar", array("controller" => "pedidos", "action" => "edit", $pedido['Pedido']['id']), array("class" => "button"))?>
          <?} ?>
        </td>
        
        <? } else {?>
        <td> &nbsp;</td<
        <? } ?>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    </tfoot>

</table>

<div class="buttons_actions">
  <input type="submit" name="asignar_cadete" value="Asignar Cadetes">
</div>
<?= $this->form->end(); ?>
</div>