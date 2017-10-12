$(document).ready(function(){

	mostrarPais();
});

function mostrarPais(){

pais=$('select[name=pais]');
$.ajax({
	url:"mostrarPais",
	type:"GET",
	dataType:"JSON",
	success:function(res){
		for (var i = 0; i < res.length; i++) {
			pais.append('<option value="'+res[i].id+'">'+res[i].paisnombre+'</opion>');
			pais.material_select();
		}
	}
})

}