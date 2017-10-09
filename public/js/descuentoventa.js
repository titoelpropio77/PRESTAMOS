function cargarModal(id){
	$.get('cargarModalTDescuentoVenta/'+id,function(response){
		$('#id').val(response.id);
		$('#descuento').val(response.descuento);
		$('#descuento_minimo').val(response.descuento_minimo);
		$('#descuento_maximo').val(response.descuento_maximo);


	});
}