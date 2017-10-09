@extends ('layouts.inicio')
@section ('contenido')
@include('alerts.request')
<section class="content-header">
    <h1>
        REPROGRAMACION DE VENTAS REVERTIDAS
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">RPROG. Y TRASPASO</a></li>
        <li class="active">REPOGRAMAR</li>
    </ol>
</section>

<div class="col-md-12">
    <div class="box box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">REPROGRAMACION</h3>
            <div class="box-tools pull-right">

            </div>
        </div
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <!--Contenido-->
                    <div class="table-responsive">
                      <!--   <div class="form-group">
                            <label>FECHA INICIO - FECHA FIN:</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="$resultado2ervation">
                                <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat" id="btnBuscar">Go!</button>
                    </span>
                            </div>
                        </div> -->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>DATOS DEL CLIENTE</th>
                                    <th>DATOS DEL PREVIO</th>
                                    <th>FECHA DE VENTA</th>
                                    <th>CUOTA INICIAL</th>
                                    <th>CUOTAS</th>
                                    <th>TOTAL</th>
                                    <th>OPERACION</th>
                                </tr>
                            </thead>
                            <tbody id="idTbody">
                                <?php
                                 for ($i=0; $i <count($resultado2) ; $i++) { 
                                    echo '<tr style="" role="row" class="odd" >
          <td class="sorting_1" ><span class="negritaTabla">Nombre:</span> '.$resultado2[$i][0]->nombreCliente.' '.$resultado2[$i][0]->apellidoCliente.' <br><span class="negritaTabla">CI:</span>  '.$resultado2[$i][0]->ci_cliente.' '.$resultado2[$i][0]->expedido.' <br><span class="negritaTabla">Telefono:</span> '.$resultado2[$i][0]->celular.' <br></td>
       <td > <span class="negritaTabla">Urbanizacion:</span> '.$resultado2[$i][0]->nombreProyecto.' <br><span class="negritaTabla">Manzano:</span> '.$resultado2[$i][0]->manzano.'<br><span class="negritaTabla">Lote:</span> '.$resultado2[$i][0]->nroLote.' <br> </td>
        <td >'.$resultado2[$i][0]->fecha.'</td>
         <td >'.$resultado2[$i][0]->cuotaInicial.'</td><td>'.$resultado2[$i][0]->montoTotal.'</td><td>'.$resultado2[$i][0]->total.'</td>
        <td><a class="btn btn-primary" >REPROGRAMAR</a><a class="btn btn-warning">TRASPASO</a></td></td>
         </tr>';
                                } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                     <th>DATOS DEL CLIENTE</th>
                                    <th>DATOS DEL PREVIO</th>
                                    <th>FECHA DE VENTA</th>
                                    <th>CUOTA INICIAL</th>
                                    <th>CUOTAS</th>
                                    <th>TOTAL</th>
                                    <th>OPERACION</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div><!-- /.row -->
</div><!-- /.box-body -->


{!!Html::script('js/reprogramacion.js')!!}

@endsection
