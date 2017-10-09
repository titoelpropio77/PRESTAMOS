@extends('layouts.inicio')
@section('contenido')
@include('alerts.errors')
@include('alerts.success')
@include('alerts.cargando')
@include('planpago.modal')
<div class="row"> 
{!!Form::open(['route'=>'Pago.store', 'method'=>'POST','onKeypress'=>'if(event.keyCode == 13) event.returnValue = false;', 'onsubmit'=>'javascript: return Validar_Plan_Pago()' ])!!}
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="panel panel-success">
            <div class="panel-heading"><b>PLAN DE PAGO</b></div>        
                <div class="panel-body">    
                    <div class="form-group">
                        {!!Form::label('tipoPago','Tipo De Pago:')!!}
                        {!!Form::select('tipoPago', array('e'=>'EFECTIVO', 'b'=>'BANCO', 'be'=>'BANCO - EFECTIVO'),null,array('class'=>'form-control'))!!}
                    </div> 

                    <div class="form-group" id="div_montoEfectivo" style="display:block">
                        {!!Form::label('monto','Monto En Efectivo:')!!}
                        {!!Form::text('monto',null,['class'=>'form-control','placeholder'=>'Monto En Efectivo','onkeypress'=>'return numerosmasdecimal(event)'])!!}
                    </div>                     

                    <div class="form-group" id="div_banco" style="display:none">
                        {!!Form::label('banco','Seleccione Un Banco:')!!}
                        <select onchange=cargarCuenta(this) name="banco" class="form-control" id="banco"></select>
                    </div> 

                    <div class="form-group" id="div_cuenta" style="display:none">
                        {!!Form::label('cuenta','Seleccione Una Cuenta:')!!}
                        <select  name="cuenta" class="form-control" id="cuenta"></select>                    
                    </div> 

                    <div class="form-group" id="div_nroDoc" style="display:none">
                        {!!Form::label('nroDocumento','Nro De Documento:')!!}
                        {!!Form::number('nroDocumento',null,['class'=>'form-control ','placeholder'=>'Nro De Documento','onkeypress'=>'return bloqueo_de_punto(event)'])!!}                                     
                    </div>   

                    <div class="form-group" id="div_montoBanco" style="display:none">
                        {!!Form::label('montoBanco','Monto En Banco:')!!}
                        {!!Form::number('montoBanco',null,['class'=>'form-control ','placeholder'=>'Monto En Banco','onkeypress'=>'return bloqueo_de_punto(event)'])!!}                                     
                    </div>  

                    <div class="form-group" id="div_fecha" style="display:none">
                        {!!Form::label('fecha','Fecha:')!!}
                        {!!Form::date('fecha',null,['class'=>'form-control'])!!}                                     
                    </div>  
            
                    @foreach ($debe as $deb)
                        <input type="hidden" name="idVenta" value="{{$deb->idVenta}}">  <?php break; ?>
                    @endforeach                                 
                </div>
            </div>          
        </div>

        <?php /*<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="div_pago_banco" style="display:none">
          <div class="panel panel-success">
            <div class="panel-heading"><b>BANCO</b></div>        
                <div class="panel-body">    
                 
                    <div class="form-group" id="div_banco" style="display:none">
                        {!!Form::label('banco','Seleccione Un Banco:')!!}
                        <select onchange=cargarCuenta(this) name="banco" class="form-control" id="banco"></select>
                    </div> 

                    <div class="form-group" id="div_cuenta" style="display:none">
                        {!!Form::label('cuenta','Seleccione Un Cuenta:')!!}
                        <select  name="cuenta" class="form-control" id="cuenta"></select>                    
                    </div> 

                    <div class="form-group" id="div_nroDoc" style="display:none">
                        {!!Form::label('nroDocumento','Nro De Documento:')!!}
                        {!!Form::number('nroDocumento',null,['class'=>'form-control ','placeholder'=>'Nro de Documento','onkeypress'=>'return bloqueo_de_punto(event)'])!!}                                     
                    </div>              
             
                </div>
            </div>          
        </div>*/ ?>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="panel panel-success">
            <div class="panel-heading"><b>CONTROL</b></div>        
                <div class="panel-body">  

                    <!--table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <th><CENTER>MONTO DEBE</CENTER></th>
                            <th><CENTER>COUTA</CENTER></th>
                        </thead>
                        <TR>
                        @foreach ($monto_cuota as $pag)
                            <td align="center">{{$pag->monto_cuota}}</td>
                        @endforeach 
                        @foreach ($mora as $mor)
                            <td align="center">{{$mor->contador+1}} Cuota</td>
                        @endforeach 
                        </TR>
                    </table-->

                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <th><CENTER>MONTO TOTAL</CENTER></th>
                            <th><CENTER>CUOTA</CENTER></th>
                        </thead>
                        <TR>
                        @foreach ($monto_pagar as $pag)
                            <td align="center"><b><font size="4">{{$pag->cuota}}</font> $u$</b></td>
                        @endforeach 
                        @foreach ($cantidad as $pag)
                            <td align="center"><font size="4"><b>{{$pag->contador}} Cuota</b></font></td>
                        @endforeach 
                        </TR>
                    </table>                
                </div>
            </div>          
        </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
      <div class="panel panel-success">
        <div class="panel-heading">
            <b>CABIO DE MONEDA</b>
            <div class="pull-right"><button type="button" class="btn-sm btn-info" data-toggle="modal" data-target="#ModalMoneda"><i class="fa fa-usd" aria-hidden="true"></i></button></div>
        </div>        
            <div class="panel-body">    
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th><center>VENTA $u$</center></th>
                        <th><center>COMPRA $u$</center></th>
                    </thead>
                    <?php $moneda=DB::select("SELECT *from tipocambio WHERE tipocambio.deleted_at IS NULL"); ?>
                    <tbody align="center">
                        <tr>
                            <td><b><font id='venta' size="3">{{$moneda[0]->monedaVenta}}</font> Bs.</b></td>
                            <td><b><font id='compra' size="3">{{$moneda[0]->monedaCompra}}</font> Bs. </b><input type="hidden" name="compra_aux"></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                            <div class="form-group">
                                {!!Form::label('boliviano','Monto Boliviano:')!!}
                                {!!Form::number('boliviano',null,['class'=>'form-control ','placeholder'=>'Monto Boliviano','onkeypress'=>'return numerosmasdecimal(event)','onchange'=>'CalcularMoneda()'])!!}                                                             
                            </div>                                     
                            </td>
                            <td>
                            <div class="form-group">
                                {!!Form::label('dolar','Monto Dolar:')!!}
                                {!!Form::text('dolar',null,['class'=>'form-control ','placeholder'=>'Monto Dolar','onkeypress'=>'return numerosmasdecimal(event)','readonly'])!!}                                                             
                            </div>                                     
                            </td>                                
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>          
    </div>

        </div>
    </div>



    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div align="right">
        <?php if ($monto_pagar[0]->cuota != 0): ?>
            {!!Form::submit('PAGAR',['class'=>'btn btn-primary','id'=>'btn_registrar','onclick'=>'btn_esconder()'])!!}  <br><br>              
        <?php endif ?>                         
        </div>         
    </div>               

<?php $cont=0; ?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">      
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">      
        <h3 style="font-weight: bold">DEUDAS POR PAGAR</h3>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <!--th><CENTER>ID</CENTER></th-->
                <th><CENTER>FECHA</CENTER></th>
                <th><CENTER>DEBE</CENTER></th>
                <th><CENTER>MORA</CENTER></th>
                <!--th><CENTER>ID VENTA</CENTER></th-->
                <th><CENTER>ESTADO</CENTER></th>
                </thead>
                @foreach ($debe as $deb)

                <?php if ($deb->mora == 1): ?>
                <TR style="background: #F5A9BC">
                <?php else: ?>
                <TR style="background: #E6F8E0">                    
                <?php endif ?>
                
                <!--td><CENTER>{{$deb->id}}</CENTER></td-->
                <td><CENTER>{{$deb->fechaLimite}}</CENTER></td>

                <?php if ($cont==0) {
                    if ($ultimo[0]->contador == 1) {
                        echo "<td><CENTER>".$monto_pagar[0]->cuota."</CENTER></td>";                                                       
                    } else {
                        if ($monto_cuota[0]->monto_cuota > 0) {
                            echo "<td><CENTER>".$monto_cuota[0]->monto_cuota."</CENTER></td>";                             
                        }else{
                            echo "<td><CENTER>".$deb->monto."</CENTER></td>";                               
                        }                          
                    }
                    $cont++;                                           
                } else {
                    echo "<td><CENTER>".$deb->monto." </CENTER></td>";
                }
                 ?>

                <!--td><CENTER>{{$deb->monto}}</CENTER></td-->
                <td><CENTER>{{$deb->mora}}</CENTER></td>
                <!--td><CENTER>{{$deb->idVenta}}</CENTER></td-->
                <td><CENTER>{{$deb->estado}}</CENTER></td>
                </TR>
                @endforeach 
            </table>
        </div>  
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">      
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <!--th><CENTER>ID</CENTER></th-->
                <th><CENTER>FECHA</CENTER></th>
                <th><CENTER>PAGADO</CENTER></th>
                <th><CENTER>MORA</CENTER></th>
                <!--th><CENTER>ID VENTA</CENTER></th-->
                <th><CENTER>ESTADO</CENTER></th>
                </thead>
                @foreach ($pago as $pag)
                <TR>
                <!--td><CENTER>{{$pag->id}}</CENTER></td-->
                <td><CENTER>{{$pag->fechaLimite}}</CENTER></td>                
                <td><CENTER>{{$pag->monto}}</CENTER></td>
                <td><CENTER>{{$pag->mora}}</CENTER></td>
                <!--td><CENTER>{{$pag->idVenta}}</CENTER></td-->
                <td><CENTER>{{$pag->estado}}</CENTER></td>
                </TR>
                @endforeach 
            </table>
        </div>            
    </div>    
{!!Form::close()!!}
</div>
{!!Html::script('js/plan_pago.js')!!}

@endsection