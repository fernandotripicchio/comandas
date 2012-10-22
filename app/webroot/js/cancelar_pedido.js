$(document).ready(function(){
    $("#pedidoFormCancelar").submit(function(){
       var ret = true;
       //Si no es mesa controlo el paga con
       if ( ret && $("#PedidosMotivoCancelacion").attr("value") == "") {
         ret = false
         alert("Ingrese un motivo para la cancelación");
       }
       return ret;
    })






})