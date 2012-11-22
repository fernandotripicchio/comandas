$(document).ready(function(){

    $("#buttonNuevoCliente").click(function(){
        $("#cliente_add").show();
        $("#cliente_listado").hide();
        //$(this).hide();
          $( "a.button" ).button();
          $( "input:submit" ).button();
    })

    $(function() {       
          $( "a.button" ).button();
          $( "input:button" ).button();	  
    });



    $("#seleccionarCliente").click(function(){
      $(".radioCliente:checked").each(function(){
        var cliente_id = $(this).attr("value");
        var cliente_name = $("#nombre_"+cliente_id).attr("value");
        var cliente_direccion = $("#direccion_"+cliente_id).attr("value");
        var cliente_telefono = $("#telefono_"+cliente_id).attr("value");

        $("#pedidosClienteId").attr("value",cliente_id );
        $("#pedidosClienteNombre").attr("value",cliente_name );

        $("#PedidosNombre").attr("value",cliente_name );
        $("#PedidosDireccion").attr("value",cliente_direccion );
        $("#PedidosTelefono").attr("value",cliente_telefono );
        var new_html = "<tr>";
        //new_html += "<input  type='hidden' name='data[Pedidos][Cliente][id]' value ='"+cliente_id+"'/>";
        //new_html += "<input  type='hidden' name='data[Pedidos][Cliente][nombre]' value ='"+cliente_name+"'/>";
//        $("#tablaCliente").html(new_html);
//        new_html = "<tr>";
//        new_html += "<td>Nombre: </td>";
//        new_html += "<td> ";
//        new_html += cliente_name;
//        new_html += "</td>";
//        new_html += "</tr>";
//        $("#tablaCliente").append(new_html);
//        new_html = "<tr>";
//        new_html += "<td>Direccion: </td>";
//        new_html += "<td> ";
//        new_html += cliente_direccion;
//        new_html += "</td>";
//        new_html += "</tr>";
//        $("#tablaCliente").append(new_html);
//        new_html = "<tr>";
//        new_html += "<td>Telefono: </td>";
//        new_html += "<td> ";
//        new_html += cliente_telefono;
//        new_html += "</td>";
//        new_html += "</tr>";

        //$("#tablaCliente").append(new_html);
        $.colorbox.close();
        $("#rowClienteFields").show();    
        
      })
    })
})
