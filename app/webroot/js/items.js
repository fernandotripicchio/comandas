function obtenerTotal(){
  var total = 0;
  $(".precio").each(function(){
    total = total + parseFloat($(this).html());
  });
  $("#total").html(total);
  
}


function actualizarTotal(){
  var total = 0;
  var cantidad = 0;
  $(".dataPedidosProductosPrecio").each(function(){
     total = total + parseFloat( $(this).attr("value") );
  })


  $(".dataPedidosProductosCantidad").each(function(){
     cantidad = cantidad + parseFloat( $(this).attr("value") );
  })

  $("#total_pedido").attr("value",total );
}


$(document).ready(function(){
    $(function() {
          $( "a.button" ).button();
          $( "input:button" ).button();
    });

    $(".filtros").on("click", "span", function (event) {
                 var tipo = $(this).attr("tipo");
                
                 if (tipo!="todos") {
                        $(".row_productos").hide();
                        
                        $(".row_tipo_"+tipo).show();
                 } else {
                        $(".row_productos").show();
                 }
    });


    //Select productos
    $(".row_productos").click(function() {
         
         var producto_id = $(this).attr("id").split("_")[1];
         
         var nombre = $("#nombre_"+producto_id).attr("value");
         var precio = $("#precio_normal_"+producto_id).attr("value");
         var new_html = "";
       
         new_html += "<tr id='row_item_"+producto_id+"'>";

         new_html += "<input  class='productos_hidden' type='hidden' name='producto_elegido_"+producto_id+"' value ='"+producto_id+"'/>";
         new_html += "<input  type='hidden' id='producto_elegido_nombre_"+producto_id+"' name='producto_elegido_nombre_"+producto_id+"' value ='"+nombre+"'/>";
         new_html += "<input  type='hidden' id='producto_elegido_precio_"+producto_id+"' name='producto_elegido_precio_"+producto_id+"' value ='"+precio+"'/>";
     
         new_html += "<td>";
         new_html +=  "<input type='text' name='cantidad' value='1' size='1' id='cantidad_"+producto_id+"' class='cantidad' />";
         new_html += "</td>";
         //Nombre producto
         new_html += "<td>";
         new_html += nombre;
         new_html += "</td>";
         //Precio
         new_html += "<td> $";
         new_html += "<span class='precio'>"+precio+"</span>";
         new_html += "</td>";
         //Observaciones
         new_html += "<td>";
         new_html += "<input type='text' name='observaciones' id='observaciones_"+producto_id+"' style='width:80%' >";
         new_html += "</td>";
         new_html += "<td>";
         new_html += "<input type='button' name='eliminar' value='Eliminar' id='eliminar_button_"+producto_id+"' class='eliminarItem'>";
         new_html += "</td>";
         new_html += "</tr>";

         
         $("#productos_seleccionados").append(new_html);


         //Sumo los precios
         obtenerTotal();
    });

     $("#productos_seleccionados").on("click", "input[type=button]", function (event) {
          var id = $(this).attr("id").split("_")[2];
          $("#row_item_"+id).remove();
         //Sumo los precios
          obtenerTotal();
     });


     $("#terminarPedido").click(function(){
          var new_html = "";

          $(".productos_hidden").each(function(){
            var id = $(this).attr("value");
            var producto = $("#producto_elegido_nombre_"+id).attr("value");
            var precio   = $("#producto_elegido_precio_"+id).attr("value");
            var observaciones   = $("#observaciones_"+id).attr("value");
            var cantidad   =  $("#cantidad_"+id).attr("value");
            var row_number = $('#tablaPedidos >tbody >tr').length - 1;
            new_html = "<tr>";
              new_html += "<input  type='hidden' class='dataPedidosProductosId' name='Producto["+row_number+"][id]' value ='"+id+"'/>";
              new_html += "<input  type='hidden' class='dataPedidosProductosPrecio' name='Producto["+row_number+"][precio]' value ='"+precio+"'/>";
              new_html += "<input  type='hidden' class='dataPedidosProductosCantidad' name='Producto["+row_number+"][cantidad]' value ='"+cantidad+"'/>";
              new_html += "<input  type='hidden' class='dataPedidosProductosCantidad' name='Producto["+row_number+"][observaciones]' value ='"+observaciones+"'/>";
              new_html += "<td>";
              new_html += cantidad;
              new_html += "</td>";
              new_html += "<td>";
              new_html += producto;
              new_html += "</td>";
              new_html += "<td> $";
              new_html += precio;
              new_html += "</td>";
              new_html += "<td>";
              new_html += observaciones;
              new_html += "</td>";
              new_html += "<td>";
              new_html += "<input type='button' name='eliminar' value='X' class='buttonEliminar'>";
              new_html += "</td>";
              new_html += "</tr>";
              $("#tablaPedidos").append(new_html);


          })
             actualizarTotal();
            
            $("#rowTotales").show();
            $( "input:button" ).button();
            $.colorbox.close();
     });

})