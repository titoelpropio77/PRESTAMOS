$(document).ready(function(){
        listarCliente();

});

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

function addCliente(){
        nombre=$('#nombreC').val();
        apellidos=$('#apellidosC').val();
        celular=$('#celularC').val();
        ci=$('#ciC').val();
        expedido=$('#expedidoC').val();
        fechaNac=$('#fechaNac').val();
        celularRefC=$('#celularRefC').val();
        genero=$('#genero').val();
        paisC=$('#paisC').val();
        $.ajax({
                url:"guarCliente",
                type:"GET",
                dataType:"JSON",
                data:{nombre:nombre,apellidos:apellidos,celular:celular,ci:ci,expedido:expedido,celularRef:celularRefC,
                      pais:paisC },
                success:function(res){

                },
        });
}

function listarCliente(){
        tableCliente=$('#tbodyCliente');
        $.ajax({
                url:"listarCliente",
                type:"GET",
                dataType:"json",
                success:function(res){
                        
                        $(res).each(function (key, value) {
        tableCliente.append('<tr>'+
                '<td>'+value.nombre+
                '<td>'+value.apellidos+
                '<td>'+value.ci+
                '<td>'+value.genero+
                '<td>'+value.celular+
                '</tr>');
                   
                        });
paginador();

                }
        });

}


function paginador() {
   $('#tableCliente tfoot th').each(function () {
        var title = $(this).text();
        if (title == "") {
        } else {
            $(this).html('<input type="text" placeholder="' + title + '" style=" border-radius: 3px;"/>');
        }
    });
    var table;
            table = $('#tableCliente').DataTable({
                "pagingType": "full_numbers",
                retrieve: true,
                "order": [0, "asc"],
                "lengthMenu": [['20'], ['20']],
                responsive: true
            });
            table.columns().every(function () {
                var that = this;
                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });
}