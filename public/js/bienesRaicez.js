function CalcularComision(valor){
valorVenta=parseInt($(valor).val());
comision=parseInt($('#comision').val());
total=(comision*valorVenta)/100;
$('#totalVenta').val(total);
}

function agregarRequisitos(select){

	$('#theadRequisitos').empty();
	$('#tbodyRequisitos').empty();
	cabeza1="<th>TESTIMONIO</th><th>CERT. CATASTRAL</th><th>PLANO APROBADO DE UBICACION</th><th>IMPUESTO ULTIMA GESTION</th><th>ALODIAL ACTUALIZADO</th>";
	cuerpo1="<td><input type='checkbox' ></td><td><input type='checkbox'></td><td><input type='checkbox'></td><td><input type='checkbox' ></td><td><input type='checkbox' ></td>";
	cabeza2="<th>TITULO EJECUTORIAL</th><th>RESOLUCION ADMINISTRATIVA</th><th>PLANO APROVADO INRA</th><th>ALODIAL ACTUALIZADO</th><th>CERTIFICADO CATASTRAL</th><th>IMPUESTO ULTIMA GESTION</th>";
	cuerpo2="<td><input type='checkbox' ></td><td><input type='checkbox'></td><td><input type='checkbox'></td><td><input type='checkbox' ></td><td><input type='checkbox' ></td></td><td><input type='checkbox' ></td>";
	opcion=$(select).val();
	switch(opcion){
		case 'CASA': 
				$('#theadRequisitos').append(cabeza1);	
				$('#tbodyRequisitos').append(cuerpo1);	
				break;
		case 'PROPIEDAD':
				$('#theadRequisitos').append(cabeza2);
				$('#tbodyRequisitos').append(cuerpo2);	
				break;
	}
}