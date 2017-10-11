@extends('layouts.inicio')
@section('contenido')
@include('alerts.errors')
@include('alerts.success')
@include('alerts.cargando')
@include('alerts.request')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <font size="6">LISTA DE VENTAS</font>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"> 
        <label for="">HASTA</label>
                
            <?php $fecha=date('Y-m-j'); ?>
           <input type="date" name="fecha_fin" value="" class="form-control">
           <button  type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>    
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
         <label for="">DESDE</label> 
               
                    
<input type="date" name="fecha_inicio" value="" class="form-control">
       
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th><CENTER>ID</CENTER></th>
                <th><CENTER>CAPITAL PRESTADO</CENTER></th>                
                <th><CENTER>FECHA</CENTER></th>
                <th><CENTER>ESTADO</CENTER></th>

                <th><CENTER>INTERES</CENTER></th>

                <th><CENTER>GANANCIAS</CENTER></th>
                <th><CENTER>CLIENTE</CENTER></th>
                <th><CENTER>EMPLEADO</CENTER></th>

                </thead>
                <tbody>
                    @foreach($prestamo as $pre)
                    <tr>
                        <td>$pre->id</td>
                        <td>$pre->capitalPrestado</td>
                        <td>$pre->fecha</td>
                        <td>$pre->estado</td>
                        <td>$pre->interes</td>
                        <td>$pre->ganancia</td>
                        <td>$pre->cliente</td>
                        <td>$pre->empleado</td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>

</div>
</div>
{!!Html::script('js/listaventa.js')!!}

    @endsection