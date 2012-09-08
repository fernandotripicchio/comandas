$(document).ready(function(){
    $("#buttonAgregar").colorbox({width:"100%", heigth: "900px", initialHeight: "900px", top: '1px'});
    $("#buttonCliente").colorbox({width:"100%", heigth: "900px", initialHeight: "900px", top: '1px'});

    $("#pedidoForm").submit(function(){
       var ret = true;
       
       if ( ( $("#PedidosDireccion").attr("value") == "" &&  $("#pedidosClienteId").attr("value") =="" ) && ( $("#PedidosTipoDelivery").attr("checked") == "checked" || $("#PedidosTipoMostrador").attr("checked") == "checked" ) ){
         ret = false;
         alert("Debe seleccionar un cliente")
       }

       if (ret && $("#pedidosMesa").attr("value") == "" &&  $("#PedidosTipoMesa").attr("checked") == "checked" ){
         ret = false;
         alert("Debe seleccionar una Mesa");
       }



       if ( ret && $(".dataPedidosProductosId").length == 0){
         ret = false;
         alert("Debe seleccionar al menos un producto");
       }

       //Si no es mesa controlo el paga con
       if ( ret && $("#PedidosTipoMesa").attr("checked") != "checked" && $("#paga_con_hidden").attr("value") == "") {
         ret = false
         alert("Ingrese un monto con el que paga el cliente ");
       }
       return ret;
    })

    $(".radioTipoPedido").click(function(){
       if ( $(this).attr("value") == "mesa"){
         $("#rowPedidoMesa").show();
         //$("#rowPedidoCliente").hide();
         $(".rowCliente").hide();
         //$("#rowDireccionCliente").hide();
         //$("#rowTableCliente").hide();

       } else {
         $("#rowPedidoMesa").hide();
         //$("#rowPedidoCliente").show();
         //$("#rowDireccionCliente").show();
         //$("#rowTableCliente").show();
         $(".rowCliente").show();
         
       }
    })


    $(".buttonPaga").click(function(){
       var paga_con = $(this).attr("money");
       var total = parseFloat($("#total_pedido").attr("value"));

       if (paga_con=="justo"){
         $("#vuelto").attr("value", 0);
         $("#paga_con_hidden").attr("value", total);
       } else {
         $("#vuelto").attr("value", parseFloat(paga_con-total));
         $("#paga_con_hidden").attr("value", paga_con);
       }
    })

    $("#paga_con").blur(function(){
       var paga_con = parseFloat($(this).attr("value"));
       var total = parseFloat($("#total_pedido").attr("value"));
       
       $("#vuelto").attr("value", parseFloat(paga_con-total));
       $("#paga_con_hidden").attr("value", parseFloat(paga_con));
    })


})