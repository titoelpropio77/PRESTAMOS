@extends('layouts.inicio')
@section('contenido')
@include('alerts.errors')
@include('alerts.success')

<div class="row">   
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <font size="6">VENDEDOR</font>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
            <div class="pull-right">
                <a class="btn btn-success" href="{!!URL::to('Vendedor/create')!!}">REGISTRAR</a> 
            </div>
        </div>    
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th><CENTER>Superior</CENTER></th>
                <th><CENTER>Inferior</CENTER></th>
                <th><CENTER>OPCION</CENTER></th>
                </thead>
                @foreach ($vendedor as $cli)
                <TR>
                <?php $padre=DB::select("SELECT nombre,apellido from empleado WHERE empleado.id=".$cli->idEmpleadoPadre); ?>
                <td><CENTER>{{$padre[0]->nombre}} {{$padre[0]->apellido}}</CENTER></td>
                <?php $hijo=DB::select("SELECT nombre,apellido from empleado WHERE empleado.id=".$cli->idEmpleadoHijo); ?>                
                <td><CENTER>{{$hijo[0]->nombre}} {{$hijo[0]->apellido}}</CENTER></td>
                <td><CENTER>
                {!!link_to_route('Vendedor.edit', $title = 'ACTUALIZAR', $parameters = $cli->id, $attributes = ['class'=>'btn btn-primary'])!!} 
                </CENTER></td>
                </TR>
                @endforeach 
            </table>
            {!!$vendedor->render()!!}
        </div>
    </div>
</div>

    @endsection