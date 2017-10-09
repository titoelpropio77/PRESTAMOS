@extends('layouts.inicio')
	
	@section('contenido')
        @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{Session::get('message')}}
</div>
@endif
 @include('alerts.errors')
 @include('empleado.modal')
<section class="content-header">
    <h1>
        GESTION DE EMPLEADO
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">EMPLEADO</a></li>
        <li class="active">GESTION DE EMPLEADO</li>
    </ol>
</section>

<div class="col-md-12">
    <div class="box box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right">

            </div>
        </div>
<div class="box-body">
<div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 pull-right">
            <div class="pull-right">
                <a class="btn btn-success" href="{!!URL::to('Empleado/create')!!}"><i class="fa fa-plus-square" aria-hidden="true"></i></a> 
            </div>

        </div>  
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"> 
            {!! Form::open(['route' => 'BuscarEmpleado', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}

            <div class="pull-right">
                <button  type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>        
                <div class="pull-right">{!!Form::number('ci',null,['class'=>'form-control ','placeholder'=>'Coloque el CI a buscar'])!!}</div>
          
        </div>    
 
{!!Form::close()!!}  
    </div>  
  <div class="row">	
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="table-responsive">
		  

		<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
		<th><CENTER>Nombre</CENTER></th>
		<th><CENTER>Apellido</CENTER></th>
		<th><CENTER>Direccion</CENTER></th>
                <th><CENTER>C.I.</CENTER></th>
                <th><CENTER>Celular</CENTER></th>
                <th><CENTER>Genero</CENTER></th>
                <th><CENTER>Estado</CENTER></th>
                <th><CENTER>Cargo</CENTER></th>
                <th><CENTER>Turno</CENTER></th>
                <th><CENTER>Codigo Vendedor</CENTER></th>

                <th><CENTER>Operacion</CENTER></th>
		</thead>
		 @foreach ($empleado as $tra)
			<TR  onmouseover="this.style.backgroundColor = '#F6CED8'" onmouseout="this.style.backgroundColor = 'white'">
			<td><CENTER>{{$tra->nombre}}</CENTER></td>
			<td><CENTER>{{$tra->apellido}}</CENTER></td>
            <td><CENTER>{{$tra->direccion}}</CENTER></td>
            <td><CENTER>{{$tra->ci}}</CENTER></td>
            <td><CENTER>{{$tra->celular}}</CENTER></td>
            <td><CENTER>{{$tra->genero}}</CENTER></td>

            <td><CENTER>{{$tra->estado}}</CENTER></td>
            <td><CENTER>{{$tra->nombreCargo}}</CENTER></td>

            <td><CENTER>{{$tra->nombreTurno}}</CENTER></td>
            <td><CENTER>{{$tra->codigo}}</CENTER></td>

			
			<td><CENTER>
			 <a href="Empleado/{{$tra->id}}/edit" class="btn btn-primary" title="Modificar"><i class="fa fa-pencil" aria-hidden="true" ></i></a>
			   <BUTTON  class="btn btn-danger" title="Eliminar" onclick="cargarDatos({{$tra->id}})" data-toggle='modal' data-target='#myModal'><i class="fa fa-trash-o"></i></BUTTON>
			  <a href="Usuario/{{$tra->id}}" class="btn btn-warning" title="Asignar Usuario"><i class="fa fa-user"></i></a>
			</CENTER></td>
		</TR>
		@endforeach 
		</table>

	</div>
	{!!$empleado->render()!!}
	<script type="text/javascript">
		function cargarDatos(id){
				$('input[name=idEmpleado]').val(id);
		}
	</script>
</div>
</div>
    </div><!-- /.row -->
    </div><!-- /.box-body -->
</div>
	@endsection