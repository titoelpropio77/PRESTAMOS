$(document).ready(function(){
    
    $('#loading').css('display','none')
});



    var clic = 1;
    lotes = "";
    punto="";
    idLote=0;

    function divLogin(lote,tipo) {// tipo 0 es cuando es poligono 1 cuando es path

 $('#tipo').val(tipo);

      if ($(lote).attr('data-status')=='4') {
        point=$(lote);

        $('#btnAgregar').attr('disabled',false);
        $('#btnActualizar').attr('disabled',true);
    if (tipo==0) {
         punto=$(lote).attr('points');
       }
       else{
        punto=$(lote).attr('d');
       }
         if (lotes=="") {
            lote.style.fill = "#0195bf"; 
         }
         else{

           if (lote != lotes && lotes != "" && $(lotes).attr('data-status')=='4') {
            lotes.style.fill = "#f49e25";
            lote.style.fill = "#0195bf";
           }

           if (lote != lotes && lotes != "" && $(lotes).attr('data-status')=='0') {
            lotes.style.fill = "#85f793";
            lote.style.fill = "#0195bf";
           }

           if (lote != lotes && lotes != "" && $(lotes).attr('data-status')=='1') {
            lotes.style.fill = "#efe139";
            lote.style.fill = "#0195bf";
           }
           if (lote != lotes && lotes != "" && $(lotes).attr('data-status')=='2') {
            lotes.style.fill = "#ef3939";
            lote.style.fill = "#0195bf";
           }
           
        }

        lotes = lote;
       
        
    
      }

      if ($(lote).attr('data-status')=='0') {
        point=$(lote);

        $('#btnAgregar').attr('disabled',true);
        $('#btnActualizar').attr('disabled',false);
    
       if (tipo==0) {
         punto=$(lote).attr('points');
       }
       else{
        punto=$(lote).attr('d');
       }
         if (lotes=="") {
            lote.style.fill = "#0195bf"; 
         }
         else{
           if (lote != lotes && lotes != "" && $(lotes).attr('data-status')=='4') {
            lotes.style.fill = "#f49e25";
            lote.style.fill = "#0195bf";
           }

           if (lote != lotes && lotes != "" && $(lotes).attr('data-status')=='0') {
            lotes.style.fill = "#85f793";
            lote.style.fill = "#0195bf";
           }

           if (lote != lotes && lotes != "" && $(lotes).attr('data-status')=='1') {
            lotes.style.fill = "#efe139";
            lote.style.fill = "#0195bf";
           }
           if (lote != lotes && lotes != "" && $(lotes).attr('data-status')=='2') {
            lotes.style.fill = "#ef3939";
            lote.style.fill = "#0195bf";
           }
        }

        lotes = lote;
        
    
          
        }
    }

function cargardatos(){
  $("#punto").val(punto.trim());

}

function CargarModalActualizar(){
  $("#loading").css('display','block');  

  $("#btn_actualizar").hide();  
  $("#id_lote").val("");      
  $("#nro_lote_ac").val("");
  $("#superficie_ac").val("");
 
    $("input[name=norte_ac]").val("");
  $("input[name=matricula_ac]").val("");
           $("input[name=medida_norte_ac]").val("");

           $("input[name=sur_ac]").val("");
           $("input[name=medida_sur_ac]").val("");
           $("input[name=este_ac]").val("");
           $("input[name=medida_este_ac]").val("");
           $("input[name=oeste_ac]").val("");
           $("input[name=medida_oeste_ac]").val("");
           $('select[name=idCategoria_ac]').empty();
            $("select[name=estado_ac]").empty();
            idLote="";
  punto= punto.trim();
    $.get('../cargar_lote/'+punto , function (response) { 
      idLote=response[0][0].id;
        $("#id_lote").val(response[0][0].id);      
        $("#nro_lote_ac").val(response[0][0].nroLote);
        $("#superficie_ac").val(response[0][0].superficie);
        $("input[name=manzano_ac]").val(response[0][0].manzano);
           $("input[name=norte_ac]").val(response[0][0].norte);
           $("input[name=matricula_ac]").val(response[0][0].matricula);

           $("input[name=medida_norte_ac]").val(response[0][0].medidaNorte);

           $("input[name=sur_ac]").val(response[0][0].sur);
           $("input[name=medida_sur_ac]").val(response[0][0].medidaSur);
           $("input[name=este_ac]").val(response[0][0].este);
           $("input[name=medida_este_ac]").val(response[0][0].medidaEste);
           $("input[name=oeste_ac]").val(response[0][0].oeste);
           $("input[name=medida_oeste_ac]").val(response[0][0].medidaOeste);
           $("input[name=uv_ac]").val(response[0][0].uv);
           $('select[name=idCategoria_ac]').append('<option value='+response[0][0].idCategoria+' >'+response[0][0].categoria);
           for (var i = 0; i <response[1].length; i++) {
             $('select[name=idCategoria_ac]').append('<option value='+response[1][i].id+' >'+response[1][i].categoria);
           }

           switch(response[0][0].estado){
            case 0:
           
           $("select[name=estado_ac]").append("<option value='0'>Disponible <option value='1'>Pre-Reserva<option value='2'>Reservado<option value='3'>Vendido");
            
            break;
            case 1:
           $("select[name=estado_ac]").append("<option value='1'>Pre-Reserva<option value='2'>Reservado<option value='3'>Vendido");
           
            
            break;case 2:
           
           $("input[name=estado_actual]").val("Vendido");
            
            break;
           }
  $("#loading").css('display','none');  

        $("#btn_actualizar").show();  
    });
  
}

function ActualizarLote(){

   
          
       nroLote= $("#nro_lote_ac").val();
        superficie=$("#superficie_ac").val();
        manzano=$("input[name=manzano_ac]").val();
           norte=$("input[name=norte_ac]").val();
           matricula=$("input[name=matricula_ac]").val();

           medidaNorte=$("input[name=medida_norte_ac]").val();

          sur= $("input[name=sur_ac]").val();
           medidaSur=$("input[name=medida_sur_ac]").val();
        este=   $("input[name=este_ac]").val();
         medidaEste=  $("input[name=medida_este_ac]").val();
          oeste= $("input[name=oeste_ac]").val();
          medidaOeste= $("input[name=medida_oeste_ac]").val();
          uv= $("input[name=uv_ac]").val();

estado=$('select[name=estado_ac]').val();
idCategoria=$('select[name=idCategoria_ac]').val();

id=idLote;
   $.ajax({
     url:'../ModificarLote/'+id,
     type: 'GET',
     dataType: 'json',
    data:{idLote:idLote,manzano:manzano,nroLote:nroLote,estado:estado,superficie:superficie,matricula:matricula,idCategoria:idCategoria,norte:norte,
      medidaNorte:medidaNorte,sur:sur,medidaSur:medidaSur,este:este,medidaEste:medidaEste
      ,oeste:oeste,medidaOeste:medidaOeste,uv:uv},
      success:function(response){
        if (response.mensaje==1) {
        toastr.success('Modificado correctamente');
       $('input[name=nro_lote_ac]').val("");

  $('input[name=manzano_ac]').val();
  $('input[name=superficie_ac]').val("");
 $('input[name=matricula_ac]').val("");
  $('input[name=norte_ac]').val("");
  $('input[name=medida_norte_ac]').val("");
 $('input[name=sur_ac]').val("");
 $('input[name=medida_sur_ac]').val("");
  $('input[name=este]').val("");
 $('input[name=medida_este]').val("");
$('input[name=oeste]').val("");
$('input[name=medida_oeste_ac]').val("");
  $('#tipo').val("");
    $('#myModalActualizar').modal('hide');

        }
        else{
          toastr.error('Ya existe ese lote');
        }
      }

  });
}

function validarLote(){
  nroLote= $('input[name=nroLote]').val();
  manzano= $('input[name=manzano]').val();
  superficie= $('input[name=superficie]').val();
  matricula= $('input[name=matricula]').val();
  idCategoria= $('input[name=idCategoria]').val();
  norte= $('input[name=norte]').val();
  medida_norte= $('input[name=medida_norte]').val();
  sur= $('input[name=sur]').val();
  medida_sur= $('input[name=medida_sur]').val();



  if (nroLote!="" && manzano!="" && superficie!="" && matricula!="" && idCategoria!="" && norte!="" && medida_norte!="" && sur!="" && medida_sur!="") {
return true;
  }
  else{
  return false;
  }
}


 function guardarLote(){
  if (validarLote()) {
  
  $("#loading").css('display','block');  
fase=$('input[name=fase]').val();
nroLote= $('input[name=nroLote]').val();
uv=$('input[name=uv]').val();
estado=$('select[name=estadoLote]').val();

  manzano= $('input[name=manzano]').val();
  superficie= $('input[name=superficie]').val();
  matricula= $('input[name=matricula]').val();
  idCategoria= $('select[name=idCategoriaLote]').val();
  norte= $('input[name=norte]').val();
  medida_norte= $('input[name=medida_norte]').val();
  sur= $('input[name=sur]').val();
  medida_sur= $('input[name=medida_sur]').val();
  este= $('input[name=este]').val();
  medida_este= $('input[name=medida_este]').val();
  oeste= $('input[name=oeste]').val();
  medida_oeste= $('input[name=medida_oeste]').val();
  tipo= $('#tipo').val();
  punto=punto.trim();
  $.ajax({
     url:'../guardarLote',
     type: 'GET',
     dataType: 'json',
    data:{fase:fase,tipo:tipo,punto:punto,manzano:manzano,nroLote:nroLote,estado:estado,superficie:superficie,matricula:matricula,idCategoria:idCategoria,norte:norte,
      medida_norte:medida_norte,sur:sur,medida_sur:medida_sur,este:este,medida_este:medida_este,oeste:oeste,medida_oeste:medida_oeste,uv:uv},
      success:function(response){
        if (response.mensaje==1) {
        toastr.success('Guardado correctamente');
        $(point).attr('data-status',0);
        $(point).css('fill','#85f793');
    $('#myModal').modal('hide');
   $('input[name=nroLote]').val("");

  $('input[name=manzano]').val();
 
 $('input[name=matricula]').val('0');
  $('input[name=norte]').val('0');
  $('input[name=medida_norte]').val('0');
 $('input[name=sur]').val('0');
 $('input[name=medida_sur]').val('0');
  $('input[name=este]').val('0');
 $('input[name=medida_este]').val('0');
$('input[name=oeste]').val('0');
$('input[name=medida_oeste]').val('0');
  $('#tipo').val("");
        $('#btnAgregar').attr('disabled',true);


        }
        else{
          toastr.error('Ya existe ese lote');
        }
  $("#loading").css('display','none');  

      }

  });
}
else{
          toastr.error('Rellene todos los campos correspondientes');

}
 
}

/*
function guardar_lote(){
      $.ajax({
            url:"mapa",
          headers: {'X-CSRF-TOKEN': token},
         type: 'POST',
        dataType: 'json',
    data: {nro_lote:nro_lote,dimension:dimension, estado:estado},
              });
}*/

