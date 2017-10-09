@extends('layouts.inicio')
@section('contenido')

@include('alerts.cargando')

@include('alerts.success')
@include('alerts.request')
@include('alerts.errors')
@include('venta.modal')
<h3 style="font-weight: bold">FORMULARIO DE VENTA</h3>
<div class="panel panel-success" style="text-transform: uppercase;">
<div class="panel-heading">
  {!!Form::open(['route'=>'Venta.store', 'method'=>'POST','onKeypress'=>'if(event.keyCode == 13) event.returnValue = false;'])!!}

<strong>DATOS DEL CLIENTE</strong>  
<div class="form-group pull-right">
codigo vendedor
  <select name="idEmpleado" class="form-control selectpicker" data-live-search="true">
  <option value="0">seleccione</option>
    <?php 
      foreach ($vendedor as $key => $value) {
        echo "<option value=".$value->id.">".$value->codigo;
      }
     ?>
  </select>
</div>     
  </div>  
  <div class="panel-body">
    
    <div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>
        <input type="hidden" name="idTipoCambio" value=<?php echo $tipoCambio[0]->id ?>>
        <input type="hidden" name="CuotaMinima" value=<?php echo $cuotaMinima[0]->porcentaje; ?>>

           <div class="col-sm-2 ">
          <div class="form-group">
          <label for="ci">CEDULA DE IDENTIDAD *</label>
          <input type="hidden" name="idCliente" value="0">
                {!!Form::text('ci',$ci,['id'=>'ci','class'=>'form-control ','placeholder'=>'NUMERO DE CARNET','onchange'=>'BuscarCliente()'])!!}

          </div>        
          </div>
           <div class="col-sm-2 ">
           <div class="form-group">
                {!!Form::label('expedido','Expedido:')!!}
                <select name="expedido" class="form-control">
                    <option value="SC">[SC] SANTA CRUZ</option>
                    <option value="LP">[LP] LA PAZ</option>
                    <option value="CB">[CB] COCHABAMBA</option>
                    <option value="BN">[BN] BENI</option>
                    <option value="CH">[CH] CHUQUISACA</option>
                    <option value="PA">[PA] PANDO</option>
                    <option value="TJ">[TJ] TARIJA</option>
                    <option value="PT">[PT] POTOSI</option>
                    <option value="OR">[OR] ORURO</option>
                    <option value="EX">[EX] EXTRANJERO</option>
                </select>
            </div>       
            </div>  
          <div class="col-sm-2 ">
          <div class="form-group">
          <label for="nacionalidad">Pais de origen *</label>
                <select name="idPais" class="form-control"  id="nacionalidad">
                    <?php foreach ($nacionalidad as $key => $value) {
                        echo "<option value=".$value->id.">".$value->paisnombre;
                    } ?>
                </select>
          </div>        
          </div>     
          <div class="col-sm-3 ">
          <div class="form-group">
         
           <div class="form-group">
                <label>Fecha Nac. *</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="fechaNacimiento" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
          </div>        
          </div>
          
          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="lugarProcedencia">Ciudad de Procedencia*</label>
          <input  type="text"  class="form-control" name="lugarProcedencia" placeholder="" >  
          </div>        
          </div>
           
        </section>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>
   
          
          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="nombre">Nombres *</label>
          <input  type="text"  class="form-control" name="nombre" placeholder="" >  
          </div>        
          </div>
          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="apellidos">Apellidos *</label>
          <input type="text"  class="form-control" name="apellidos" >  
          </div>        
          </div>
            <div class="col-sm-2 ">
          <div class="form-group">
          <label for="estadoCivil">Estado Civil *</label>
         <select name="estadoCivil" class="form-control" id="estadoCivil">
         <option value="s">SOLTERO (A)</option>
         <option value="c">CASADO (A)</option>
         <option value="d">DIVORCIADO (A)</option>
         <option value="v">VIUDO (A)</option>

         </select>
          </div>        
          </div>
          <div class="col-sm-4 ">
          <div class="form-group">
          <label for="genero">Genero *</label>
<div class="radio">
  <label>
    <input type="radio" name="genero" value="m" id="m" checked="">
    Masculino
    

  </label>
  <label>
   
    <input type="radio" name="genero" value="f"  id="f">
    Femenino

  </label>
</div>
          </div>        
          </div>
           
        </section>
      </div>
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>
        <div class="col-sm-3 ">
          <div class="form-group">
          <label for="ocupacion">Ocupacion</label>
          <input  type="text"  class="form-control" name="ocupacion"  placeholder="Cargo " >  
          </div>        
          </div>
        <div class="col-sm-3 ">
          <div class="form-group">
          <label for="domicilio">Domicilio *</label>
          <input   type="text"  class="form-control" name="domicilio"  placeholder="Direccion del Domicilio actual" >  
          </div>        
          </div>
          <div class="col-sm-2 ">
          <div class="form-group">
          <label for="celular">Celular *</label>
          <input  type="text"  class="form-control" name="celular"  placeholder="Celular del Cliente">  
          </div>        
          </div>

          <div class="col-sm-2 ">
          <div class="form-group">
          <label for="celular_ref">Celular Ref:</label>
          <input  type='text'  class="form-control" name="celular_ref"  placeholder="Telefono de referencia " >  
          </div>        
          </div>
          
             <div class="col-sm-2 ">
          <div class="form-group">
          <label for="nit">NIT</label>
          <input  type="text"  class="form-control" name="nit"  placeholder="Nit " >  
          </div>        
          </div>
          
        </section>
      </div>
    </div>                  
                     
</div>
  <div class="panel-footer"></div>
<div class="panel panel-success">
<div class="panel-heading">
<h4>DATOS DEL LOTE DE TERRENO</h4>       
  
  </div>  
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>
        <div class="col-sm-1 ">
          <div class="form-group">
          <label for="id_lote">CODIGO</label>
          
           <input <?php echo "value=".$id_lote ?>  type="text"  class="form-control" name="id_lote" readonly="readonly"> 
          </div>        
          </div>
             <div class="col-sm-2 ">
          <div class="form-group">
          <label for="proyecto">Proyecto</label><br>
          <label for="proyecto" style="color: rgba(255, 26, 0, 0.86);"><?php echo $lote[0]->nombreProyecto ?></label>
          
            </div>        
          </div>
            <div class="col-sm-2 ">
          <div class="form-group">
          <label for="fase">Fase</label>
           <input value=<?php echo $lote[0]->fase ?>  class="form-control" type="number"  class="form-control" name="fase" placeholder="USD$" id="fase"  disabled="">  
          
          </div>        
          </div>
            <div class="col-sm-2 ">
          <div class="form-group">
          <label for="nro_manzano">Nro. U-V</label>
          <input value=<?php echo $lote[0]->uv ?> type="text"  class="form-control" name="nro_manzano"   disabled="">  
          </div>        
          </div>
              <div class="col-sm-2 ">
          <div class="form-group">
          <label for="nro_manzano">Nro. Manzano</label>
          <input value=<?php echo $lote[0]->manzano ?> type="text"  class="form-control" name="nro_manzano"   disabled="">  
          </div>        
          </div>
          <div class="col-sm-2 ">
          <div class="form-group">
          <label for="nro_lote">Nro. Lote</label>
          <input value=<?php echo $lote[0]->nroLote ?>  type="text"  class="form-control" name="nro_lote" disabled="">  
            <input value=<?php echo $lote[0]->nroLote ?>  type="hidden"  class="form-control" name="nro_lote"  disabled="" > 
          </div>        
          </div>
      
         
            <div class="col-sm-2 ">
          <div class="form-group">
          <label for="superfice">Supercie(mt2)</label>
          <input value=<?php echo $lote[0]->superficie ?> type="text"  class="form-control" name="superficie"    id="superficie" disabled="" >  
          </div>        
          </div>
          
            <div class="col-sm-2 ">
          <div class="form-group">
          <label for="categoria">Categoria</label>
           <input value=<?php echo $lote[0]->categoria ?>  class="form-control"   class="form-control" name="categoria" placeholder="USD$" disabled="" >
               </div>        
          </div>  
          <div class="col-sm-5 ">
          <div class="form-group">
          <label for="detalleCategoria">Detalle Categoria:</label> <br>
          <textarea rows="4" cols="50" class="form-control" disabled="">
<?php echo $lote[0]->descripcion."." ?>
</textarea>
               </div>        
          </div>  
           <div class="col-sm-2 ">
          <div class="form-group">
          <label for="precio">Precio(mt2) </label>
           <input value=<?php echo $lote[0]->precio ?>  class="form-control" type="number"  class="form-control" name="precio" placeholder="USD$" id="precio" >
               </div>  
               <input type="hidden" name="idReserva" value=<?php echo $idReserva; ?>>      
                <input type="hidden" name="idPreReserva" value=<?php echo $idPreReserva; ?>> 
          </div>  
        </section>
      </div>
    <h3 style="text-align: center">Colindancias</h3>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>
        <div class="col-sm-3 ">
          <div class="form-group">
          <label for="norte">Norte</label>
                

           <input <?php echo "value=".$lote[0]->norte ?>  type="text"  class="form-control" name="norte" disabled=""> 
          </div>        
          </div>
          <div class="col-sm-1 ">
          <div class="form-group">
          <label for="nro_lote">Medida</label>
          <input value=<?php echo $lote[0]->medidaNorte ?>  type="text"  class="form-control" name="nro_lote" disabled="">  
            <input value=<?php echo $lote[0]->nroLote ?>  type="hidden"  class="form-control" name="nro_lote"  > 
          </div>        
          </div>
          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="sur">sur</label>
          <input value=<?php echo $lote[0]->sur ?> type="text"  class="form-control" name="sur"   disabled="">  
          </div>        
          </div>
           <div class="col-sm-1 ">
          <div class="form-group">
          <label for="medidaSur">Medida</label>
          <input value=<?php echo $lote[0]->medidaSur ?> type="text"  class="form-control" name="medidaSur"   disabled="">  
          </div>        
          </div>
            <div class="col-sm-3 ">
          <div class="form-group">
          <label for="este">Este</label>
          <input value=<?php echo $lote[0]->este ?> type="text"  class="form-control" name="este"    id="este" disabled="">  
          </div>        
          </div>
            <div class="col-sm-1 ">
          <div class="form-group">
          <label for="medidaEste">Medida</label>
           <input value=<?php echo $lote[0]->medidaEste ?>  class="form-control" type="number"  class="form-control" name="medidaEste" placeholder="USD$" id="medidaEste" disabled="">  
          </div>     

          </div>
           <div class="col-sm-3 ">
          <div class="form-group">
          <label for="oeste">Oeste</label>
          <input value=<?php echo $lote[0]->oeste ?> type="text"  class="form-control" name="oeste"    id="oeste" disabled="">  
          </div>        
          </div>
            <div class="col-sm-1 ">
          <div class="form-group">
          <label for="medidaOeste">Medida</label>
           <input value=<?php echo $lote[0]->medidaOeste ?>  class="form-control" type="number"  class="form-control" name="medidaOeste" placeholder="USD$" id="medidaOeste"  disabled="">  
          </div>     
        </section>
      </div>
 

    </div>                  
                     
</div>
  <div class="panel-footer"></div>
</div>
<div class="panel panel-success">
<div class="panel-heading">
<h4>DATOS DE LA TRANSACCCION COMERCIAL</h4> 
<label>
  <input type="radio" id="tipoPagoc" name="tipoPago" value="c" checked="" onclick="CargarTabla(this)">Contado
  </label>      
<label>

  <input type="radio" id="tipoPagop" name="tipoPago" value="p" onclick="CargarTabla(this)">Plazo
  </label>      

  </div>  
  <div class="panel-body">
    <div class="row">
      
           <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
           <?php 
$tipoCambioVenta=$tipoCambio[0]->monedaVenta;
$tipoCambioCompra=$tipoCambio[0]->monedaCompra;

$precioPlazo=$lote[0]->precio*$lote[0]->superficie;
$precioPlazoBs=$precioPlazo;
 $pagoInicial=($precioPlazoBs*$cuotaMinima[0]->porcentaje)/100;


$pagoInicialReserva=$pagoInicial-$reserva;
$precioContado=($lote[0]->precio*$lote[0]->superficie)-((($lote[0]->precio*$lote[0]->superficie)*$lote[0]->descuento)/100) ;

$precioContadoMenoReserva=$precioContado-$reserva;
$precioContadoBs=$precioContado*$tipoCambio[0]->monedaVenta;
$precioContadoBs=$precioContadoBs-$reserva;
$precioContadoDolar=$precioContadoBs/$tipoCambioVenta;
// $pagoInicialReserva=$pagoInicial-$reserva;
number_format($pagoInicialReserva, 0, '.', '');//esto es lo qe tiene q pagar como minimo
 ?>
  
 <input type="hidden" name="cuotaMinima">
 <!-- tabla plazo -->
 <label>todo esta expresado en dolares americanos</label>
     

<table class="table table-striped table-bordered table-condensed table-hover" style="display: block;border: 1px solid;" id="TablaContado">
       <thead>
         <th>PRECIO DEL LOTE DE TERRENO</th>
       
          <th>reserva</th>
          <th>Total</th>
       </thead>
       <tbody>
         <tr>
        
           <td><input type="hidden" name="PrecioLote" value= <?php $precioVenta=($lote[0]->precio*$lote[0]->superficie);
          echo number_format($precioVenta, 0, '.', ''); ?> readonly="readonly" class="form-control">
          <input type="hidden" name="descuentoContado" value=<?php echo $lote[0]->descuento ?> readonly="readonly" class="form-control"><input type="text" name="PrecioContado" value=  <?php echo number_format($precioContadoMenoReserva, 0, '.', '');  ?> readonly="readonly" class="form-control">
          </td>
         
           <td><?php echo $reserva ?></td>
           <td>
           <input type="text" name="PrecioContado" value=  <?php echo number_format($precioContado, 0, '.', '');  ?> readonly="readonly" class="form-control">
          </td>
            
         </tr>
       </tbody>
     </table>
 <table class="table table-striped table-bordered table-condensed table-hover" style="display: none ;     border: 1px solid;" id="TablaPlazo">
       <thead>
         <th>PRECIO DEL LOTE DE TERRENO</th>
         <th>CUOTA iNICIAl</th>
         <th>Plazos</th>
         <th>Día de Pago</th>
         <th>Cuota MENSUAL</th>
         <th>% Descuento</th>
         <th>Total a Pagar 
         <th>Reserva</th>
         <th>Total</th>
         <th>.</th> 
       </thead>
       <tbody>
         <tr>
             <td><input type="text" name="PrecioLotePlazo" value= <?php $precioVenta=($lote[0]->precio*$lote[0]->superficie);
          echo number_format($precioVenta, 0, '.', ''); ?> readonly="readonly" class="form-control">
          <td><!-- <input class="form-control" type="hidden" name="pago" value=<?php echo number_format($pagoInicialReserva, 2, '.', '');; ?>> -->
  <select name="SelectPagoInicial" onchange="PagoInicial(this)" style="display: none" class="form-control">

    <option >seleccione</option>

    <option value="0">Calcular</option>
    <option value="1">Ingresar</option>

  </select>
  <input class="form-control" type="number" name="pagoInicial" style="display: none" onchange="VerificarPagoInicial(this)" >
  </td>
           <td><input type="number" name="meses" class="form-control" onchange="verificarPlazo(this)">
           <td><select class="form-control" name="diaMes">
            <?php for ($i=1; $i <29 ; $i++) { 
              echo "<option value=".$i.">".$i;
            } ?>
           </select>

           <td><input type="number" name="cuotaMensual" readonly="readonly" class="form-control">
<input type="hidden" name="sumarDecimal" readonly="readonly" class="form-control">
           </td>
           <td>
              <input class="form-control" type="text" name="DescuentoPlazo" value="0" readonly="readonly">
           </td>
           <td> 
             <input class="form-control" type="text" name="PrecioPlazo" value= <?php echo number_format($precioPlazo, 0, '.', ''); ?> readonly="readonly">
           </td>
  
  <td><input type="text" name="reserva" value=<?php echo $reserva ?> disabled="" class="form-control"></td>
  <td><input type="text" class="form-control" name="totalPagado"  readonly="readonly"></td>

         </tr>
       </tbody>
     </table>


      </div>
           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
           <label>TIPO DE PAGO</label><br>
          <label>
  <input type="radio" name="tipoDepositoC"   value='e' onclick="cargarBanco(this)" checked="">Efectivo
  </label>      
<label>

  <input type="radio" name="tipoDepositoC" value='b'onclick="cargarBanco(this)">Banco
  </label>  
<label>

  <input type="radio" name="tipoDepositoC" value='be'onclick="cargarBanco(this)">Banco y Efectivo
  </label>
   <br>
   <div id="divBanco" class="form-group" style="display: none">
  <select name="bancoC" onchange="cargarCuenta(this)"  class="form-control"></select>
  <select name="cuentaC" class="form-control"></select>
  <label for="fechaDeposito">Fecha Deposito</label>
<input type="date" name="fechaDeposito" placeholder="Fecha Depósito" class="form-control">
  <label for="nroDocumentoC">Nro. documento</label>
<input type="number" name="nroDocumentoC" placeholder="Número Documento" class="form-control">
</div>
<div class="form-group" id="divMontoMixto" style="display: none">
<label for="montoBanco"> Monto Banco</label>
<input type="number" onchange="CompletarPago(this,1)" name="montoBanco" placeholder="Monto Banco"  class="form-control">
<label for="montoBanco"> Monto Efectivo</label>

<input type="number" onchange="CompletarPago(this,2)" name="montoEfectivo" placeholder="Monto Efectivo"  class="form-control">
</div>
           </div>                  

    </div>                  
                     
</div>
  <div class="panel-footer">
 
    {!!Form::submit('VENDER',['class'=>'btn btn-primary','id'=>'btn_registrar'])!!}

<a  class="btn btn-danger " href="{!!URL::to('Venta')!!}">CANCELAR</a>

{!!Form::close()!!}
  </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<label>TIPO DE CAMBIO OFICIAL:  </label>
<input type="text" value=<?php echo $tipoCambio[0]->monedaVenta ?> name="TipoDeCambio" readonly="readonly">

         <label>TIPO DE CAMBIO Compra: </label>
         <input type="text" value=<?php echo $tipoCambio[0]->monedaCompra ?> name="TipoDeCambioCompra" readonly="readonly">
         <input class="btn btn-info" value="$" type="button" data-toggle="modal" data-target="#ModalMoneda">
           </div>
<div class="form-group pull-right">
<label>Cambiar dolar</label>
  <input type="" class="form-control" name="boliviano" id="" onchange="cambiarDolar(this)">
<label id="cambiarDolar">0 Bs.</label>

</div>
<script type="text/javascript">
  $('#bodyPrincipal').removeClass();
  $('#bodyPrincipal').addClass('hold-transition skin-blue sidebar-collapse sidebar-mini');
   //Date picker
  

</script>
{!!Html::script('js/venta2.js')!!}

   <!-- {!!Html::script('js/venta.js')!!} -->
@endsection