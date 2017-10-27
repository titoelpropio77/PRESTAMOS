

var saldo_inicial = [];
var periodo_c = [];
var interes_c = [];
var pago = [];
var saldo_capital = [];
var fecha_limite = [];

function Calcular(){
  periodo=$("#periodo");
  capital_prestado=$("#capital_prestado");
	if ( $("#interes").val()!="" && capital_prestado.val()!="" && periodo.val()!="" ) {
    $("#body_prestamo").empty();
		interes_mensual=parseFloat(parseFloat(capital_prestado.val())*parseFloat($("#interes").val())/100);
    interes_mensualx=interes_mensual;
		$("#interes_mensual").val(interes_mensual);
		$total_pago=parseFloat(parseFloat(interes_mensual)*parseFloat(periodo.val()))+parseFloat(capital_prestado.val());
		$("#total_pago").val($total_pago);
		$pago_mensual=parseFloat($total_pago)/parseFloat(periodo.val());
		$("#pago_mensual").val($pago_mensual);
		$ganancia=parseFloat($total_pago)-parseFloat(capital_prestado.val());
		$("#ganancia").val($ganancia);
		for (var i = 1; i <= periodo.val(); i++) {
        var f = new Date();
      if (f.getDate() == "30" || f.getDate() == "31" || f.getDate() == "29") {
        $fecha=("28/" + (f.getMonth() +i) + "/" + f.getFullYear());   
      } else {
        $fecha=(f.getDate() + "/" + (f.getMonth() +5) + "/" + f.getFullYear());
        alert(f.getMonth() +i)       ;        
      }

			$("#body_prestamo").append("<tr align='center'><td><input type=text value="+i+" name='periodo_c[]' id='periodo_c"+i+"' readonly style='text-align:center'></td>\N\
			<td><input type='text' name='saldo_inicial[]' id='saldo_inicial"+i+"' style='text-align:center' readonly></td>\N\
			<td><input type='text' value='"+interes_mensualx+"' name='interes_c"+i+"' id='interes_c"+i+"' style='text-align:center' ></td>\N\
			<td><input type='text' value='"+$pago_mensual+"' name='pago[]' id='pago"+i+"' style='text-align:center' readonly></td>\N\
			<td><input type='text' name='saldo_capital[]' id='saldo_capital"+i+"' style='text-align:center' readonly>\n\
      <td><input type='text' name='fecha_limite[]' id='fecha_limite"+i+"' value='"+$fecha+"' style='text-align:center' readonly></td></tr>");	

      // $("#body_prestamo").append("<td><input type='text' name='fecha_limite[]' id='fecha_limite"+i+"' value='"+$fecha+"' style='text-align:center' readonly></td></tr>");
				
      if (periodo.val()-1==i) {
        interes_mensualx=interes_mensual+parseFloat(capital_prestado.val());
      }
      $("#saldo_inicial"+i).val(parseFloat(capital_prestado.val()) + (parseFloat(interes_mensual)*i) ); 
      $("#saldo_capital"+i).val(parseFloat($("#total_pago").val()) - (parseFloat($pago_mensual)*i) ); 
	
		}

	}
}


function BuscarCliente(){
  $.get('../verificarCarnet/'+$("input[name=ci]").val(), function(res){
    if (res[0].contador == 0) {
      alert("EL CLIENTE ES NUEVO");
      $("input[name=cliente]").val(0);
      $("input[name=ocupacion]").val("");
      $("select[name=expedido]").val("");
      $("input[name=nombre]").val("");
      $("input[name=apellidos]").val("");
      $("input[name=fechaNacimiento]").val("");
      $("select[name=idPais]").val("");
      $("select[name=genero]").val("");
      $("input[name=celular]").val("");
      $("input[name=celular_ref]").val("");
      $("input[name=lugarProcedencia]").val("");
      $("select[name=estadoCivil]").val("");
      $("input[name=domicilio]").val("");
      $("input[name=nit]").val("");      
    } else {
      $("input[name=cliente]").val(res[0].id);
      $("input[name=ocupacion]").val(res[0].ocupacion);
      $("select[name=expedido]").val(res[0].expedido);
      $("input[name=nombre]").val(res[0].nombre);
      $("input[name=apellidos]").val(res[0].apellidos);
      $("input[name=fechaNacimiento]").val(res[0].fechaNacimiento);
      $("select[name=idPais]").val(res[0].idPais);
      $("select[name=genero]").val(res[0].genero);
      $("input[name=celular]").val(res[0].celular);
      $("input[name=celular_ref]").val(res[0].celular_ref);
      $("input[name=lugarProcedencia]").val(res[0].lugarProcedencia);
      $("select[name=estadoCivil]").val(res[0].estadoCivil);
      $("input[name=domicilio]").val(res[0].domicilio);
      $("input[name=nit]").val(res[0].nit);
      
      alert("EXISTE ESE CLIENTE");      
    }
  });	
}

function paginator(){
 $('#Tableprestamos').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

}