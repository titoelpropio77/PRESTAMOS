function cargarModal(id){
	$.get('cargarModalPlazo/'+id,function(response){
		$('#id_plazo').val(response.id);
		$('#meses_act').val(response.meses);

	});
}