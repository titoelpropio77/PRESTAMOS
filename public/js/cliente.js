function cargarModal(id){
	$.get('cargarModalCliente/'+id,function(response)
	{
		$('#id_cliente').val(response.id);
		$('#nombre_cliente').val(response.nombre);
        $('#apellido_cliente').val(response.apellido);
        $('#ci_cliente').val(response.ci);
        $('#direccion_cliente').val(response.direccion);
        $('#celular_cliente').val(response.celular);
        $('#telefono_cliente').val(response.telefono_adicional);
        $('#nit_cliente').val(response.nit);

	});
}