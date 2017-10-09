@extends('layouts.inicio')
	@section('contenido')
	@include('alerts.request')
		{!!Form::model($empleado,['route'=>['Usuario.update',$empleado],'method'=>'PUT'])!!}
			@include('usuario.forms.usr')
			
		{!!Form::close()!!}

		
	@endsection