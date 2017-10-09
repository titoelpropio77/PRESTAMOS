$(document).ready(function(){
$('#loading').css('display','none');


});

function buscarVenta(id){
$('#loading').css('display','block'); 
nombre=$('input[name=nombre]');
apellidos=$('input[name=apellidos]');
lugarProcedencia=$('input[name=lugarProcedencia');
ci=$('input[name=ci]');
direccion=$('input[name=direccion]');
expedido=$('select[name=expedido]');
fechaNac=$('input[name=fechaNac]');
genero=$('input[name=genero]');
celular=$('input[name=celular]');
ocupacion=$('input[name=ocupacion]');
idPais=$('select[name=idPais]');
proyecto=$('input[name=proyecto]');
fase=$('input[name=fase]');
nroLote=$('input[name=nroLote]');
superficie=$('input[name=superficie]');
uv=$('input[name=uv]');
manzano=$('input[name=manzano]');
tablaLote=$('#tablaLote');
tablaVenta=$('#tablaVenta');
tablaVenta.empty();
tablaLote.empty();
nombre.val("");
apellidos.val("");
lugarProcedencia.val("");
ci.val("");
expedido.val("");
celular.val("");
ocupacion.val("");
direccion.val("");
fechaNac.val("");
proyecto.val("");
fase.val("");


$.get('ObtenerVenta/'+id,function(res){
nombre.val(res[0].nombreCliente);
apellidos.val(res[0].apellidos);
lugarProcedencia.val(res[0].lugarProcedencia);
ci.val(res[0].ciCliente);
expedido.val(res[0].expedido);
celular.val(res[0].celular);
ocupacion.val(res[0].ocupacion);
direccion.val(res[0].domicilio);
fechaNac.val(res[0].fechaNacimiento);
idPais.val(res[0].idPais);
proyecto.val(res[0].nombreProyecto);
fase.val(res[0].fase);
uv.val(res[0].uv);
manzano.val(res[0].manzano);
nroLote.val(res[0].nroLote);
superficie.val(res[0].superficie);
tablaLote.append('<tr><td>'+res[0].nombreProyecto+'<td>'+res[0].fase+'<td>'+res[0].uv+'<td>'+res[0].manzano+'<td>'+res[0].nroLote+'<td>'+res[0].superficie+'</tr>');

if (res[0].estado=='p') {
	tablaVenta.append('<tr><td>'+res[0].cuotaInicial+'<td>'+res[0].fecha+'<td>CONTADO</tr>');
}else{
	if (res[0].estado=='c') {
	tablaVenta.append('<tr><td>'+res[0].precio+'<td>'+res[0].fecha+'<td>PLAZO</tr>');

	}
}
 if (res[0].genero == 'm') {
       document.getElementById("m").checked = true;                      
      } else {
       document.getElementById("f").checked = true;                
      }


$('#loading').css('display','none');


});
}