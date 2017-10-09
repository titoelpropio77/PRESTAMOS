function generarcodigo(option){//genera el codigo de la cuenta para ponerlo en en imput codigo del modal
    var id_padre=$(option).val();
    var token=$("#token").val();
    
    $.ajax({
       url:'extraercodigo',
       headers: {'X-CSRF-TOKEN': token},
                type: 'GET',
                dataType: 'json',
                data: {id_padre:id_padre},
                success: function (data) {
                 $('#tipo').val(data);
                }

    });
    
}