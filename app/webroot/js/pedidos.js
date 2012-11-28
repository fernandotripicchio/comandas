
function resetClientForm(){
     $("#PedidosNombre").attr("value", "");
     $("#PedidosDireccion").attr("value", "");
     $("#PedidosTelefono").attr("value", "");
     $("#pedidosClienteId").attr("value", "");          
}

$(document).ready(function(){
    $("#buttonAgregar").colorbox({ transition:"none", width:"90%", height:"90%", top: '1px'});
    $("#buttonCliente").colorbox({ transition:"none", width:"90%", height:"90%", top: '1px'});
    $("#buttonClienteBuscar").click(function(){
       var key = $("#keysCliente").attr("value");
       if (key.length > 4 ) {
                
                $.ajax({
                     url: root +'clientes/findCliente/'+key,            
                     error: function(jqXHR, textStatus, errorThrown){
                           alert( "Error en la busqueda del cliente: "+textStatus);
                     },
                     success: function(data) {                
                       var cliente = jQuery.parseJSON(data);              
                        if (cliente.cliente.no_data == false ) {
                            cliente = cliente.cliente["cliente"];
                            resetClientForm();
                            $("#PedidosNombre").attr("value", cliente.nombre);
                            $("#PedidosDireccion").attr("value", cliente.direccion);
                            $("#PedidosTelefono").attr("value", cliente.telefono);
                            $("#pedidosClienteId").attr("value", cliente.id);                   
                            $("#rowClienteFields").show();    
                        } else {
                            alert("No hay clientes que coincidan con esa búsqueda");
                            $("#rowClienteFields").hide();    

                        }
                     }
                   });       
                   $("#nuevoCliente").attr("value", "0");
       }
       return false;
      });
      
      
    //Codigo con las validaciones
    $("#pedidoForm").submit(function(){
       var ret = true;       
       //Verifico si hace falta cliente
       if (  $("#PedidosTipoDelivery").attr("checked") == "checked" || $("#PedidosTipoMostrador").attr("checked") == "checked" ) {
             //Nuevo Cliente Debe tener todos los datos
             if ($("#nuevoCliente").attr("value") == "1") {
                    if ( $("#PedidosNombre").attr("value")=="" ||  $("#PedidosDireccion").attr("value") == "" || $("#PedidosTelefono").attr("value") == "" ) {
                      ret = false;                          
                      alert("Debe completar todos los datos para el nuevo cliente");  
                    }
                    
                    if (ret && $("#PedidosTelefono").attr("value").length < 5) {
                        ret = false;
                        alert("El número de telefono no es válido. La longitud debe ser mayor que 5");
                    }
             } else {
                 //si no es nuevo y si no eligio ningun cliente muestro el error
                 if ($("#pedidosClienteId").attr("value") =="" ) {
                     ret = false;
                     alert("Debe seleccionar un cliente");
                 }
             }    
       }
       
       // Si el pedido es tipo mesa debe seleccionar al menos una mesa
       if (ret && $("#PedidosTipoMesa").attr("checked") == "checked" &&  $(".NumeroMesa:checked").length == 0  ){
         ret = false;
         alert("Debe seleccionar una Mesa");
       }


      if ( ret && $(".dataPedidosProductosId").length == 0){
         ret = false;
         alert("Debe seleccionar al menos un producto");
       }

       //Si no es mesa controlo el paga con
       if ( ret && $("#PedidosTipoMesa").attr("checked") != "checked" && ( $("#paga_con_hidden").attr("value") == 0 ||  $("#paga_con_hidden").attr("value") == "") ) {
         ret = false;
         alert("Ingrese un monto con el que paga el cliente ");
       }
       return ret;
    })






    $(".radioTipoPedido").click(function(){
       if ( $(this).attr("value") == "mesa"){
         $("#rowPedidoMesa").show();
         $("#rowPagaCon").hide();
         $("#rowVuelto").hide();
         $("#rowPedidoCliente").hide();           

       } else {
         $("#rowPedidoMesa").hide();
         $("#rowPagaCon").show();
         $("#rowVuelto").show();
         $("#rowPedidoCliente").show();           
         $("#rowClienteFields").hide();           
         resetClientForm();
         
       }
    })


    $(".buttonPaga").click(function(){
       //paga_con es el valor con el cual hace click
       var paga_con = $(this).attr("money");
       var total = parseFloat($("#total_pedido").attr("value"));

       if (paga_con=="justo"){
             paga_con = total;
       } else {
           var valor_actual =    parseFloat($("#paga_con").attr("value"));
           paga_con = parseFloat(paga_con);
           paga_con = paga_con + valor_actual;
       }
       $("#paga_con_hidden").attr("value", paga_con);
       $("#paga_con").attr("value",paga_con);
       $("#vuelto").attr("value", parseFloat(paga_con-total));
    })

    $("#paga_con").blur(function(){
       var paga_con = parseFloat($(this).attr("value"));
       var total = parseFloat($("#total_pedido").attr("value"));
       $("#vuelto").attr("value", parseFloat(paga_con-total));
       $("#paga_con_hidden").attr("value", parseFloat(paga_con));
    });
    
    
    $("#buttonNuevoCliente").click(function(){
       $("#nuevoCliente").attr("value", "1"); 
       resetClientForm(); 
       $("#rowClienteFields").show();
    }) 
    
    


})
