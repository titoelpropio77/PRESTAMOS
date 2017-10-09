@extends('layouts.inicio')
	@section('contenido')
        <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	@include('alerts.request')
	{!!Form::open(['route'=>'Usuario.store', 'method'=>'POST'])!!}
		@include('usuario.forms.usrCreate')
	
	{!!Form::close()!!}
        </div>
</div>
	@endsection