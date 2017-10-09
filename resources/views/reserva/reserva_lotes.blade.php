@extends('layouts.inicio')

@section('contenido')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif

@include('alerts.errors')
@include('alerts.cargando')

@include('reserva.modal')


{!!Html::script('js/reserva.js')!!}
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<label for="">BUSCAR POR FECHA</label>
<input type="date" class="form-control" id="fecha">

<button onclick="buscarReservas(1)" class="btn btn-success" data-toggle='modal' data-target='#myModal'>
   BUSCAR
</button>
</div >   
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 " >
<div class="form-group pull-rigth">
<label for="">BUSCAR POR CARNET DE IDENTIDAD</label>

<input type="number" class="form-control " id="ci">
<button  onclick="buscarReservas(2)" class="btn btn-success" data-toggle='modal' data-target='#myModal'>
   BUSCAR
</button>
<input id="urlveta" type='hidden' value= <?php echo URL::to('ventareserva/'); ?> >
</div>
</div >
<div class="row">	
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">

            <H1>LOTES RESERVADOS</H1>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th><CENTER>Nombre Cliente</CENTER></th>
                <th><CENTER>Apellido</CENTER></th>
                <th><CENTER>C.I.</CENTER></th>
                <th><CENTER>Fecha Reserva</CENTER></th>
                
                <th><CENTER>Nro Lote</CENTER></th>

                <th><CENTER>Nro Manzano</CENTER></th>

                <th><CENTER>Vendedor</CENTER></th>
                <th><CENTER>OPERACION</CENTER></th>
               
               

                </thead>
                <tbody id="lista_reserva">
                @foreach ($lista_reserva as $rer)
                <TR>
                 <td><CENTER>{{$rer->nombre_cliente}}</CENTER></td>
                <td><CENTER>{{$rer->apellido_cliente}}</CENTER></td>
                <td><CENTER>{{$rer->ci}}</CENTER></td>
                <td><CENTER>{{$rer->fecha}}</CENTER></td>

                   <td><CENTER>{{$rer->nro_lote}}</CENTER></td>
                   <td><CENTER>{{$rer->nro_manzano}}</CENTER></td>

             
                <td><CENTER>{{$rer->name}}</CENTER></td>

             
                
                

                <td><CENTER>
                    <button  data-toggle='modal' data-target='#myModalAnular'  
                    onclick="anularReserva({{$rer->id_reserva}})" class="btn btn-danger">ANULAR RESERVA</button>
                    <a class="btn btn-primary" href=<?php echo URL::to('ventareserva/'.$rer->id_reserva) ?>>VENDER</a>
                
                </CENTER></td>
                </TR>
                @endforeach 
                </tbody>
            </table>
           
        </div>
    </div>
</div>
@endsection