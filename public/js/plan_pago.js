$(document).ready(function(){    
    $('#loading').css('display','none');         
});

function Validar_Plan_Pago(){          
  switch($('select[name=tipoPago]').val()) {
  case 'e':
    if ($('input[name=monto]').val() == "") { toastr.error('El campo Monto no debe estar vacio'); $('#loading').css('display','none'); $("#btn_registrar").show(); return false; }
    else{ toastr.success('GUARDADO CORRECTAMENTE'); return true; }    
    break;
  case 'b':     
    if ($('input[name=montoBanco]').val() == "" || $('select[name=banco]').val() == 0 || $('select[name=cuenta]').val() == 0 || $('input[name=nroDocumento]').val() == "") {
      if ($('input[name=montoBanco]').val()=="") { toastr.error('El campo Monto Banco no debe estar vacio'); }                           
      if ($('input[name=nroDocumento]').val()=="") { toastr.error('El campo Nro de Documento no debe estar vacio'); }  
      if ($('select[name=banco]').val()==0) { toastr.error('No Selecciono un Banco'); }                      
      if ($('select[name=cuenta]').val()==0) { toastr.error('No Selecciono una Cuenta'); }                                        
      $('#loading').css('display','none'); 
      $("#btn_registrar").show();        
      return false; 
    }else{ toastr.success('GUARDADO CORRECTAMENTE'); return true; }
    break;
  case 'be':   
    if ($('input[name=monto]').val() == "" || $('input[name=montoBanco]').val() == "" || $('select[name=banco]').val() == 0 || $('select[name=cuenta]').val() == 0 || $('input[name=nroDocumento]').val() == "") {
      if ($('input[name=montoBanco]').val()=="") { toastr.error('El campo Monto Banco no debe estar vacio'); }
      if ($('input[name=monto]').val()=="") { toastr.error('El campo Monto Efectivo no debe estar vacio'); }
      if ($('input[name=nroDocumento]').val()=="") { toastr.error('El campo Nro de Documento no debe estar vacio'); }  
      if ($('select[name=banco]').val()==0) { toastr.error('No Selecciono un Banco'); }                      
      if ($('select[name=cuenta]').val()==0) { toastr.error('No Selecciono una Cuenta'); }                                        
      $('#loading').css('display','none'); 
      $("#btn_registrar").show();          
      return false; 
    }else{ toastr.success('GUARDADO CORRECTAMENTE'); return true; }
    break;                      
  }
}


$("#tipoPago").change(function(event){    
    $('#loading').css('display','block');
    switch($("#tipoPago").val()) {
        case 'e':        
            $('select[name=banco]').empty();
            $('select[name=cuenta]').empty();
            $('input[name=nroDocumento]').val("");        
            $('input[name=monto]').val("");         
            $('input[name=montoBanco]').val("");         
            $('input[name=monto]').val("");         
            $('#div_montoEfectivo').css('display','block');
            $('#div_pago_banco').css('display','none');
            $('#div_banco').css('display','none');
            $('#div_cuenta').css('display','none');
            $('#div_nroDoc').css('display','none');
            $('#div_montoBanco').css('display','none');
            $('#div_fecha').css('display','none');
            $('#loading').css('display','none');
            break;
        case 'b':
            $('select[name=banco]').empty();
            $('select[name=cuenta]').empty();
            $('input[name=nroDocumento]').val("");        
            $('input[name=monto]').val("");         
            $('input[name=montoBanco]').val("");         
            $('input[name=monto]').val("");           
            $('#div_montoEfectivo').css('display','none');
            $('#div_pago_banco').css('display','block');
            $('#div_banco').css('display','block');
            $('#div_cuenta').css('display','block');
            $('#div_nroDoc').css('display','block');
            $('#div_fecha').css('display','block');
            $('#div_montoBanco').css('display','block');
            $.get('../cargarBanco',function(res){
               $('#banco').append('<option value=0> Seleccione un Banco') ;
                for (var i = 0; i < res.length; i++) {
                   $('#banco').append('<option value='+res[i].id+'>'+res[i].nombre) ;
                }
            $('#loading').css('display','none');      
            });        
            break;
        case 'be':
            $('select[name=banco]').empty();
            $('select[name=cuenta]').empty();
            $('input[name=nroDocumento]').val("");        
            $('input[name=monto]').val("");         
            $('input[name=montoBanco]').val("");         
            $('input[name=monto]').val("");                  
            $('#div_montoEfectivo').css('display','block');
            $('#div_pago_banco').css('display','block');
            $('#div_banco').css('display','block');
            $('#div_cuenta').css('display','block');
            $('#div_nroDoc').css('display','block');
            $('#div_fecha').css('display','block');
            $('#div_montoBanco').css('display','block');
            $.get('../cargarBanco',function(res){
               $('#banco').append('<option value=0> Seleccione un Banco') ;
                for (var i = 0; i < res.length; i++) {
                   $('#banco').append('<option value='+res[i].id+'>'+res[i].nombre) ;
                }
            $('#loading').css('display','none');      
            });   
            break;                       
    }        
});   

function cargarCuenta(select){
  $('#loading').css('display','block');      
  idBanco=$(select).val();
    $('#cuenta').empty();
    $.get('../cargarCuenta/'+idBanco,function(res){
        $('select[name=cuenta]').append('<option value=0> Seleccione Una Cuenta') ;
        for (var i = 0; i < res.length; i++) {
           $('#cuenta').append('<option value='+res[i].id+'>'+res[i]. nroCuenta) ;
        }
    $('#loading').css('display','none');      
    });
}

///MONEDAS
function CalcularMoneda(){
  $("input[name=dolar]").val((parseFloat($("input[name=boliviano]").val()) / parseFloat($("#compra").text())).toFixed(2));
}


function CambioMoneda(){//genera el codigo de la cuenta para ponerlo en en imput codigo del modal
  var moneda = $("input[name=moneda]").val(); 
  var usuario = $("input[name=usuario]").val();
  var password = $("input[name=password]").val();    
  if(moneda == ""){
    toastr.error("INTRODUSCA LOS DATOS CORRECTAMENTE");            
  }else{

    $('#loading').css('display','block');           
   
    $.ajax({
       url:'../AutorizarCambioMoneda',
        type: 'GET',
        dataType: 'json',
        data: {usuario:usuario, password: password, moneda:moneda},
        success: function(message){
          if (message.mensaje == 1) {
            $("#compra").text(moneda);
            $("input[name=dolar]").val(""); 
            $("input[name=boliviano]").val(""); 
            $("input[name=compra_aux]").val(moneda); 
            $('#ModalMoneda').modal('hide');
            toastr.success("TIENE PERMISO");                        
            $('#loading').css('display','none');         
          } else {
            toastr.error("NO TIENE PERMISO");                        
            $('#loading').css('display','none');         
          }
            //toastr.success(message.mensaje);  //asi se optiene cuando se envia algo en ajax           
        },error: function(){
            toastr.error("ERROR");            
            $('#loading').css('display','none');         
        },
    });
  }
}
