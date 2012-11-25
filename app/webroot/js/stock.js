$(document).ready(function(){
    $("#TipoMovimientoStock").change(function(data){
        var option = $("#TipoMovimientoStock option:selected").attr("value");
        if (option == "ingreso") {
            $("#rowIngreso").show();
            
            $("#rowEgreso").hide();
        } else {
                if (option == "egreso") {
                    $("#rowIngreso").hide();
                    $("#rowEgreso").show();

                } else {
                    $("#rowIngreso").hide();
                    $("#rowEgreso").hide();                    
                }
        }
        
    });



   var validator =  $("#formMovimientoStock").validate({
       rules: {
             "data[Stock][ingreso]": { 
                  required: function(element){
                            var retVal = ( $("#TipoMovimientoStock").val() == "ingreso");
                            return retVal;
                            }
                  
              },
             "data[Stock][egreso]": { 
                  required: function(element){
                            var retVal = ( $("#TipoMovimientoStock").val() == "egreso");
                            return retVal;
                            }
              },
              "data[Stock][tipo]":{
                  required:true
              }              
              
       }
       
   });       
})