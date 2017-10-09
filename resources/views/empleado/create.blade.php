@extends('layouts.inicio')
	@section('contenido')
   
	@include('alerts.request')
	{!!Form::open(['route'=>'Empleado.store', 'method'=>'POST'])!!}
	     <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		@include('empleado.forms.usr')

   <div class="panel-footer">
   {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
  <a class="btn btn-danger" href="../Empleado">Cancelar</a>    
  </div>
</div>

		       </div>
</div>
	{!!Form::close()!!}
 
	@endsection