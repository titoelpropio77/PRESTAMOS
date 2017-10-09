$(document).ready(function(){
	$('#loading').css('display','none');

});
function CargarModal(id){
$('input[name=idPerfilObjetoA]').val(id);
$.get('../CargarSelectPerfilObjeto/'+id,function(res){
	$('select[name=idObjetoA]').empty();
for (var i =0 ; i < res.length; i++) {
		$('select[name=idObjetoA]').append('<option value='+res[i].idObjeto+'>'+res[i].nombre);
	}
});
}

function ModificarPerfilObjeto(id){
	$('#loading').css('display','block');
var puedeImprimir="";
	idPerfilObjeto=$('input[name=idPerfilObjetoA]').val();

	puedeGuardar=$('input[name=puedeGuardarA]:checked').val();
	puedeModificar=$('input[name=puedeModificarA]:checked').val();
	puedeImprimir=$('input[name=puedeImprimirA]:checked').val();
	puedeEliminar=$('input[name=puedeEliminarA]:checked').val();
	puedeListar=$('input[name=puedeListarA]:checked').val();
	puedeVerReporte=$('input[name=puedeVerReporteA]:checked').val();
if (puedeGuardar===undefined){
	puedeGuardar=0;
}
if (puedeGuardar===undefined){
	puedeGuardar=0;
}if (puedeModificar===undefined){
	puedeModificar=0;
}if (puedeEliminar===undefined){
	puedeEliminar=0;
}if (puedeListar===undefined){
	puedeListar=0;
}
if (puedeVerReporte===undefined){
	puedeVerReporte=0;
}
if (puedeImprimir===undefined){
	puedeImprimir=0;
}
	$.ajax({
			url:'../PerfilObjetoUpdate/'+id,
			datatype:'json',
			  type: 'GET',
			data:{idPerfilObjeto:idPerfilObjeto,puedeGuardar:puedeGuardar,puedeModificar:puedeModificar,puedeListar:puedeListar,puedeImprimir:puedeImprimir,puedeVerReporte:puedeVerReporte},
			success:function(res){
	$('#loading').css('display','none');

					alert('Se actualizo Correctamente');
					location.reload();
			}
	});

}