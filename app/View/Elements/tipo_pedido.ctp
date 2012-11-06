<?
switch ($tipo ) {
    case "delivery":
        echo $this->Html->image("moto.png", array("width" => 35, "height" => 35));
        break;
    case "mesa":
        //echo $this->Html->image("mesa.png", array("width" => 35, "height" => 35));
        echo "<span class='tipoMesa'>MESA ".$mesa."</span>";
        break;
    case "mostrador":
        echo "MOSTRA";
        break;
}


?>