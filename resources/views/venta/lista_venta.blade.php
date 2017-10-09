@extends('layouts.inicio')
@section('contenido')
@include('alerts.errors')
@include('alerts.success')
@include('alerts.cargando')

@include('venta.modalDetalle')
<div class="row">
{!! Form::open(['route' => 'ListaVentasearch', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <font size="6">LISTA DE VENTAS</font>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"> 
        <label for="">HASTA</label>
                
            <?php $fecha=DB::select("SELECT curdate()as fecha"); ?>
           <input type="date" name="fecha_fin" value="{{$fecha[0]->fecha}}" class="form-control">
           <button  type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>    
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
         <label for="">DESDE</label> 
               
                    
<input type="date" name="fecha_inicio" value="{{$fecha[0]->fecha}}" class="form-control">
       
    </div>
{!!Form::close()!!}

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th><CENTER>CARNET</CENTER></th>
                <th><CENTER>CLIENTE</CENTER></th>                
                <th><CENTER>CELULAR</CENTER></th>
                <th><CENTER>PROYECTO</CENTER></th>

                <th><CENTER>MANZANO</CENTER></th>

                <th><CENTER>NRO LOTE</CENTER></th>
                <th><CENTER>SUPERFICIE</CENTER></th>
                <th><CENTER>CUOTA INICIAL</CENTER></th>
                <th><CENTER>PRECIO DE VENTA</CENTER></th>

                <!--th><CENTER>PRECIO LOTE</CENTER></th-->
                <th><CENTER>CATEGORIA</CENTER></th>
                <th><CENTER>CARNET</CENTER></th>
                <th><CENTER>EMPLEADO</CENTER></th>
                <th><CENTER>FECHA</CENTER></th>
                <th><center>OPERACION</center></th>
                </thead>
                @foreach ($lista as $lis)
                <TR>
                    <td align=center>{{$lis->ci_cliente}}</td>
                    <td align=center>{{$lis->cliente}}</td>                
                    <td align=center>{{$lis->celular}}</td>
                    <td align=center>{{$lis->nombre}}</td>

                    <td align=center>{{$lis->manzano}}</td>

                    <td align=center>{{$lis->nroLote}}</td>
                    <td align=center>{{$lis->superficie}} MT²</td>
                    <td align=center>{{$lis->cuotaInicial}}</td>
                    <td align=center>{{$lis->precio}}</td>

                    <!--td align=center>{{$lis->precio}}</td-->
                    <td align=center>{{$lis->categoria}}</td>
                    <td align=center>{{$lis->ci_empleado}}</td>
                    <td align=center>{{$lis->empleado}}</td>
                    <td align=center>{{$lis->fecha}}</td>
                    <td align=center><button onclick="buscarVenta({{$lis->id}})" class="btn btn-primary" type="button" data-toggle="modal" data-target="#ModalDetalleVenta">DETALLE</button></td>

                </TR>
                @endforeach 
            </table>
        </div>
    </div>

</div>
{!!Html::script('js/listaventa.js')!!}

    @endsection