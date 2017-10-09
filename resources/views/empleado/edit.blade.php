@extends('layouts.inicio')
	@section('contenido')
	@include('alerts.request')
	<h1>Actualizar Empleado</h1>
		{!!Form::model($empleado,['route'=>['Empleado.update',$empleado->id],'method'=>'PUT'])!!}
			@include('empleado.forms.usr')
			<div class="panel-footer">
  {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
  <a class="btn btn-danger" href="../../Empleado">Cancelar</a>    
  </div>
			
		{!!Form::close()!!}

		
	@endsection