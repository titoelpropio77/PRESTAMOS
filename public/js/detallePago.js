idPlandePago=0;

function listarDetalle(id){
tbodyDetalle=$('#tbodyDetalle');
tbodyDetalle.empty();
$.get('listarDetalle/'+id,function(res){
	for (var i = 0; i < res.cuota.length; i++) {
		tbodyDetalle.append("<tr><td>"+res.cuota[i].nroCuota+
			"<td>"+res.cuota[i].importe+
			"<td>"+res.cuota[i].fechaLimite+
			"<td>"+res.cuota[i].estado+
			"<td><button class='btn'>PAGAR</button>");
	}
idPlandePago=res.plandepago[0];
});
}


function pagarCuota(){
importe=$('#importe').val();
tipoPago=$('#tipoPago').val();
	$.ajax({
		url:"guardarDetalle",
		typeData:"JSON",
		type:"GET",
		data:{importe:importe,idPlandePago:idPlandePago,tipoPago:tipoPago},
		success:function(res){

			}
	});
}