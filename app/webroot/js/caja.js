$(document).ready(function(){
    $("#CajaTipoMovimientoId").change(function(data){
        var option = $("#CajaTipoMovimientoId option:selected");
        var tipo = option.attr("tipo-mov");
        var value = option.attr("value");      
               
        if (tipo == "ingreso"){
            $("#rowIngresos").show();
            $("#rowEgresos").hide();
            $("#rowEmpleados").hide();
            
        }
        
        if (tipo == "egreso"){
            $("#rowIngresos").hide();
            $("#rowEgresos").show();
            $("#rowEmpleados").hide();            
        }
        
        if (tipo == "ingreso/egreso"){
            $("#rowIngresos").show();
            $("#rowEgresos").show();
            $("#rowEmpleados").hide();            
        }   
        
        
        if (value=="2"){
            $("#rowEmpleados").show(); 
        }
    });


})