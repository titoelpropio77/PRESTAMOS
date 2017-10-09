@extends('layouts.inicio')
	
	@section('contenido')
        @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{Session::get('message')}}
</div>
@endif
 @include('alerts.errors')
@include('TasaInteres.modal')              
                 <button class="btn btn-success" data-toggle='modal' data-target='#myModal'>
                    <i class="fa fa-plus-square" aria-hidden="true"></i>     
                </button>
               
  <div class="row">	
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="table-responsive">
		<H1>Tasa Interes</H1>
		<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
		<th><CENTER>ID</CENTER></th>
		<th><CENTER>Porcentaje</CENTER></th>
	
                <th><CENTER>Operacion</CENTER></th>
		
		</thead>
		 @foreach ($tasaInteres as $tra)
			<TR>
			<td><CENTER>{{$tra->id}}</CENTER></td>
			<td><CENTER>{{$tra->porcentaje}}</CENTER></td>
			
			<td><CENTER>
			<button class="btn btn-primary" data-toggle='modal' data-target='#myModalActualizar' onclick= "cargarModal({{$tra->id}})">ACTUALIZAR</button>

			</CENTER></td>
		</TR>
		@endforeach 
		</table>
	{!!$tasaInteres->render()!!}
	</div>
</div>
</div>
{!!Html::script('js/tasainteres.js')!!}
	@endsection