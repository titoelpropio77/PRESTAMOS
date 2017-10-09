@extends('layouts.inicio')
@section('contenido')
@include('alerts.errors')
@include('alerts.success')
@include('planpago.DetalleCuota')
@include('alerts.cargando')
<section class="content-header">
    <h1>
        GESTION DE COBRANZA
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">VENTAS</a></li>
        <li class="active">GESTION DE COBRANZA</li>
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
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <th>DATOS DEL CLIENTE</th>
                <th>DATOS DEL PREVIO</th>
                <th>CUOTA INICIAL</th>
                <th>TIPO</th>
                <th>Bs</th>
                <th>$us</th>
                <th>Pagado</th>
                <th>Saldo Capital</th>
                <!--th><CENTER>PRECIO LOTE</CENTER></th-->
                <!--th><CENTER>CARNET</CENTER></th>
                <th><CENTER>EMPLEADO</CENTER></th-->
                <th>FECHA</th>
                <th>ESTADO</th>
                <th>OPCION</th>
                </thead>
                @foreach ($lista as $lis)

                <tbody id="idTbody">
                                <?php
                                 
                                    echo '<tr>
                                    <td><span class="negritaTabla">Nombre:</span> '.$lis[0]->cliente.'<br>
                                    <span class="negritaTabla">CI:</span> '.$lis[0]->ci_cliente.' '.$lis[0]->expedido.'.<br>
                                    <span class="negritaTabla">Telefono:</span> '.$lis[0]->celular.'</td>
                                    
                                    <td><span class="negritaTabla">Urbanizacion:</span> '.$lis[0]->nombre.'<br>
                                    <span class="negritaTabla">Manzano:</span> '.$lis[0]->manzano.' <br>
                                    <span class="negritaTabla">Nro. Lote:</span> '.$lis[0]->nroLote.'</td>';

                                 ?>
                                 <td>{{$lis[0]->cuotaInicial}}</td>
                                    <?php if ($lis[0]->estado_venta==='c'):
                                    echo '<td>Plazo';
                                else:
                                    echo '<td>Contado';
                                         ?>
                                        
                                    <?php endif ?>
                                    <td>{{$lis[0]->precio*$lis[0]->monedaVenta}}</td>
                                    <td>{{$lis[0]->precio}}</td>
                                    <td>{{$lis[0]->TotalPagado+$lis[0]->cuotaInicial}}</td>
                                    <td>{{$lis[0]->precio-($lis[0]->TotalPagado+$lis[0]->cuotaInicial)}}</td>

                                    <td>{{$lis[0]->fecha}}</td>


                                    <?php if ($lis[0]->estado_venta==='c'):
                                    echo '<td><span style="color:red">Pendiente</span>';
                                else:
                                    echo '<td><span style="color:green">Pagado</span>';
                                         ?>
                                        
                                    <?php endif ?>
                                    <td><a href="{!!URL::to('PlanPago')!!}<?php echo "/".$lis[0]->id ?>" class="btn-sm btn-success" >PAGAR</a>
                                        <a data-toggle="modal" style="cursor: pointer;" data-target="#DetalleCuota" href="#" onclick="CargarCuotas(<?php echo $lis[0]->id ?>)" class="btn-sm btn-info" >DETALLE</a>
                                    </td>                        
                                    </tr>

               
                                
               
                    <!--td align=center>{{$lis[0]->precio}}</td-->
                    <!--td align=center>{{$lis[0]->ci_empleado}}</td>
                    <td align=center>{{$lis[0]->empleado}}</td-->
                   
                               

                    </td>                             
                </TR>
                @endforeach 
            </table>
        </div>
    </div>

</div>
       </div><!-- /.row -->
    </div><!-- /.box-body -->
</div>
{!!Html::script('js/cuotas.js')!!}

    @endsection