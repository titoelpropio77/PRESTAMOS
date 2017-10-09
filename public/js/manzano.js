function CargarManzano(id){
  $.get('cargar_manzano/'+id , function (response) { 
    $("#id_manzano").val(response[0].id);      
    $("#numero_ac").val(response[0].numero);
    $("#id_proyecto_ac").val(response[0].id_proyecto);
  });
}