$(document).ready(function(){
        listarEmpleado();

});

function cargarModal(id){
	$.get('cargarModalEmpleado/'+id,function(response)
	{
		$('#id_empleado').val(response.id);
		$('#nombre_empleado').val(response.nombre);
        $('#apellidos_empleado').val(response.apellidos);
        $('#cargo').val(response.cargo);
        $('#usuario').val(response.usuario);
        $('#password').val(response.password);
 

	});
}

function addEmpleado(){
        nombre=$('#nombreE').val();
        apellidos=$('#apellidosE').val();
        cargo=$('#cargo').val();
        
        usuario=$('#usuario').val();
        password=$('#pass').val();

        $.ajax({
                url:"guarEmpleado",
                type:"GET",
                dataType:"JSON",
                data:{nombre:nombre,apellidos:apellidos,cargo:cargo,usuario:usuario,password:password},
                success:function(res){
                        $('#modal1').modal('hide');
                },
        });
}

function listarEmpleado(){
        tableEmpleado=$('#tbodyEmpleado');
        $.ajax({
                url:"listarEmpleado",
                type:"GET",
                dataType:"json",
                success:function(res){
                        
                        $(res).each(function (key, value) {
        tableEmpleado.append('<tr>'+
                '<td>'+value.nombre+
                '<td>'+value.apellidos+
                '<td>'+value.cargo+
                '<td>'+value.usuario+
                '<td>'+value.password+
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
            table = $('#tableEmpleado').DataTable({
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