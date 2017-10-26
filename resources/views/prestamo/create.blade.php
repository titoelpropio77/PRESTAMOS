@extends('layouts.inicio')
@section('Contenido')

@include('alerts.request')
<div class="row">
 {!!Form::open(['route'=>'Gestionarprestamo.store', 'method'=>'POST'])!!}
<div class="col s12 m12 l12">
		
		

     

		

  <div class="collection">
    <a href="#!" class="collection-item"><span class="badge"><i class="material-icons dp48">people</i></span><b>DATOS DEL CLIENTE</b></a>
    	<input type="hidden" name="cliente">
	    <div class="col s12 m2 l2">
			Carnet: <input placeholder="Carnet" type="number" name="ci" id="ci" onchange="BuscarCliente()">
		</div>
		<div class="col s12 m2 l2">
			Expedido:
	    <select class="browser-default" name="expedido" id="expedido">
	      <option value="" disabled selected>SELECCIONAR</option>
	      <option value="SANTA CRUZ">SANTA CRUZ</option>
	      <option value="BENI">BENI</option>
	      <option value="PANDO">PANDO</option>
	      <option value="TARIJA">TARIJA</option>
	      <option value="COCHABAMBA">COCHABAMBA</option>
	      <option value="LA PAZ">LA PAZ</option>
	      <option value="CHUQUISACA">CHUQUISACA</option>
	      <option value="ORURO">ORURO</option>
	      <option value="POTOSI">POTOSI</option>
	      <option value="EXTRANJERO">EXTRANJERO</option>
	    </select>
		</div>	    

	    <div class="col s12 m2 l2">
	    	<label>Nombre:</label>
	    			 <input placeholder="Nombre" type="text" name="nombre" id="nombre">
		</div>

		<div class="col s12 m2 l2">
			Apellidos: <input placeholder="Apellidos" type="text" name="apellidos" id="apellidos">
		</div>

		<div class="col s12 m2 l2">
			Lugar de Procedencia: <input placeholder="Lugar de Procedencia" type="text" name="lugarProcedencia" id="lugarProcedencia">
		</div>	

		<div class="input-field col s12 m12 l6">
                <i class="mdi-editor-insert-invitation prefix"></i>
                <label for="fechaNac">Fecha de Nacimiento:</label>
                <input type="date"  id="fechaNac" name="fechaNac"  class="datepicker" placeholder=""  />
        </div>

		<div class="col s12 m2 l2">
				Género:
		    <select class="browser-default" name="genero" id="genero">
		      <option value="" disabled selected>SELECCIONAR</option>
		      <option value="MASCULINO">MASCULINO</option>
		      <option value="FEMENINO">FEMENINO</option>
		    </select>
		</div>
		<div class="col s12 m2 l2">
			Celular: <input placeholder="Celular" type="text" name="celular" id="celular">
		</div>	
		<div class="col s12 m2 l2">
			Celular Referencia: <input placeholder="Celular Referencia" type="text" name="celular_ref" id="celular_ref">
		</div>			
		<div class="col s12 m2 l2">
			Estado Civil:
	    <select class="browser-default"  name="estadoCivil" id="estadoCivil">
	      <option value="" disabled selected>SELECCIONAR</option>
	      <option value="SOLTERO">SOLTERO</option>
	      <option value="CASADO">CASADO</option>
	      <option value="VIUDO">VIUDO</option>
	    </select>
		</div>

		<div class="col s12 m4 l4">
			Ocupación: <input placeholder="Ocupación" type="text" name="ocupacion" id="ocupacion">
		</div>	

		<div class="col s12 m4 l4">
			Domicilio: <input placeholder="Domicilio" type="text" name="domicilio" id="domicilio">
		</div>	

		<div class="col s12 m2 l2">
			NIT: <input placeholder="NIT" type="number" name="nit" id="nit">
		</div>	

		<div class="col s12 m2 l2">
	        Pais: 
	        <select class="browser-default" name="idPais" id="idPais">
	      		<option value="" disabled selected>SELECCIONAR</option>
                <?php foreach ($pais as $key => $value) {
                    echo "<option value=".$value->id.">".$value->paisnombre;
                } ?>
            </select>
		</div>	
  </div>
</div>	

<div class="col s12 m12 l12">
  <div class="collection">
    <a href="#!" class="collection-item"><span class="badge"><i class="material-icons dp48">queue</i></span><b>GARANTIA</b></a>
	<div class="col s12 m6 l6">
		Garantia: <textarea placeholder="Garantia" name="tipoGarantia" id="tipoGarantia"> </textarea>
	</div>
	<div class="col s12 m2 l2">
		Tipo de Pago: 	   
		<select class="browser-default"  name="tipoPago" id="tipoPago">
	      <option value="" disabled selected>Seleccione el tipo de pago</option>
	      <option value="i">INTERES</option>
	      <option value="ic">INTERES + CAPITAL</option>
	    </select>
	</div>
		<div class="col s12 m2 l3">
		Tipo Moneda: 
		<select class="browser-default" >
			<option>Seleccione el tipo de moneda</option>
			<option>BS</option>
			<option>$US</option>
		</select>
	</div>	
  </div>
</div>

<div class="col s12 m12 l12">
  <div class="collection">
    <a href="#!" class="collection-item"><span class="badge"><i class="material-icons dp48">attach_money</i></span><b>PRESTAMO</b></a>

	<div class="col s12 m2 l2">
		Capital Prestado: <input placeholder="0" type="number" name="capital_prestado" id="capital_prestado" onchange="Calcular()">
	</div>

	<div class="col s12 m2 l2">
		Tasa del interes (%): <input placeholder="0" type="number" name="interes" id="interes" onchange="Calcular()">
	</div>

	<div class="col s12 m2 l2">
		Total del Periodo: <input placeholder="0" type="number" name="periodo" id="periodo" onchange="Calcular()">
	</div>	

	<div class="col s12 m2 l2">
		Total del Ganado: <input placeholder="0" type="number" name="ganancia" id="ganancia">
	</div>	

	<div class="col s12 m2 l2">
		Interes Mensual: <input placeholder="0" type="number" name="interes_mensual" id="interes_mensual">
	</div>	

	<div class="col s12 m2 l2">
		Total a Pagar: <input placeholder="0" type="number" name="total_pago" id="total_pago">
	</div>	
	<div class="col s12 m2 l2">
		Pago Mensual: <input placeholder="0" type="number" name="pago_mensual" id="pago_mensual">
	</div>			

	<div class="input-field col s12 m12 l4">
                <i class="mdi-editor-insert-invitation prefix"></i>
                <label for="fechainicio">Fecha de Inicio:</label>
                <input type="date"  id="fechainicio" name="fechainicio" class="datepicker" placeholder=""  />
    </div>


		
  </div>
</div>	


<div class="col s12 m12 l12">
	<div class="col s12 m12 l12">
		<table id="Tableprestamos">
			<thead>
				<th><center>PERIODO</center></th>
				<th><center>SALDO INICIAL</center></th>
				<th><center>INTERES</center></th>
				<th><center>PAGO</center></th>
				<th><center>SALDO CAPITAL</center></th>
				<th><center>FECHA LIMITE</center></th>



				
			</thead>
			<tbody id="body_prestamo"></tbody>
		</table>
	</div>	
</div>	
<div class="col s12 m12 l12">
<button class="btn waves-effect waves-light">Registrar</button>
<a class="btn btn-danger" >Cancelar</a> 



{!!Form::close()!!}
</div>

</div>

{!!Html::script('js/prestamos.js')!!}

@endsection