$(document).ready(function(){    
    $('#loading').css('display','none')
});


function CargarCuotas(idVenta){
  $("#loading").css('display','block');  
  var cont=0;
  var tabla_cuota=$("#body_cuota");
  $.get("ListaCuota/"+idVenta, function (res) {
    $('#body_cuota').empty();                   
    $(res).each(function (key, value) {   
    switch(value.estado) {
        case 'p':
            estado='PAGADO';
            break;
        case 'd':
            estado='DEBE'
            break;
    }       
    cont++;    
      tabla_cuota.append("<tr align=center ><td> "+cont+"</td><td>"+value.fechaLimite+"</td><td>"+value.monto+" $</td><td>"+estado+"</td>\n\
        <td><div class='box box-warning direct-chat direct-chat-warning collapsed-box' id='div_detcuota"+value.id+"'>\n\
            <button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-plus'></i></button>\n\
             <div class='box-body' style='display: none;'>\n\
             <table class='table table-striped table-bordered table-condensed table-hover'>\n\
                <thead><th><CENTER>FECHA</CENTER></th><th><CENTER>MONTO</CENTER></th></thead>\n\
                <tbody id='body_detcuota"+value.id+"'></tbody>\n\
             </table> </div>  </div></td></tr>"); 
      
      var tabla_detcuota=$("#body_detcuota"+value.id);
      $.get("ListaDetalleCuota/"+value.id, function (res2) { 
        $('#body_detcuota'+value.id).empty();                   
        $(res2).each(function (key, value2) {               
          tabla_detcuota.append("<tr align=center ><td>"+value2.fecha+"</td><td>"+value2.monto+" $</td></td></tr>");         
        });
      });  

    });
      $('#loading').css("display","none");                
  });
  
}
