@extends('layouts.inicio')
@section('contenido')
@include('alerts.errors')
@include('alerts.success')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-success">
        <div class="panel-heading"><b>DATOS DEL CLIENTE ANTIGUO</b></div>        
        <div class="panel-body">
            <div class="col-sm-2">
                {!!Form::label('ci_ant','Carnet:')!!}
                {!!Form::text('ci_ant',$cliente[0]->ci,['class'=>'form-control ','disabled'])!!}
            </div>            
            <div class="col-sm-2">
                {!!Form::label('nombre_ant','Nombre:')!!}
                {!!Form::text('nombre_ant',$cliente[0]->nombre,['class'=>'form-control ','disabled'])!!}
            </div>
            <div class="col-sm-2">
                {!!Form::label('apellido_ant','Apellidos:')!!}
                {!!Form::text('apellido_ant',$cliente[0]->apellidos,['class'=>'form-control ','disabled'])!!}
            </div>            
        </div>
        </div>          
    </div>   
{!!Form::open(['route'=>'SesionVenta.store','method'=>'POST','onsubmit'=>'javascript: return Validar_SesionVenta()','onKeypress'=>'if(event.keyCode==13) event.returnValue=false;'])!!}    

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-success">
        <div class="panel-heading"><b>DATOS DEL NUEVO CLIENTE</b></div>        
        <div class="panel-body">
            <div class="col-sm-2">
                {!!Form::label('ci','Carnet:')!!}
                {!!Form::text('ci',null,['class'=>'form-control ','placeholder'=>'Carnet','onchange'=>'BuscarCliente()'])!!}
            </div>         
            <div class="col-sm-2">
                {!!Form::label('nombre','Nombre:')!!}
                {!!Form::text('nombre',null,['class'=>'form-control ','placeholder'=>'Nombre'])!!}
            </div>
            <div class="col-sm-2">
                {!!Form::label('apellidos','Apellidos:')!!}
                {!!Form::text('apellidos',null,['class'=>'form-control ','placeholder'=>'Apellidos'])!!}
            </div> 
            <div class="col-sm-2">
                {!!Form::label('fechaNacimiento','Fecha Nacimiento:')!!}
                {!!Form::date('fechaNacimiento',null,['class'=>'form-control ','placeholder'=>'Fecha Nacimiento'])!!}
            </div>
            <div class="col-sm-2">
                {!!Form::label('nacionalidad','Nacionalidad:')!!}
                {!!Form::text('nacionalidad',null,['class'=>'form-control ','placeholder'=>'Nacionalidad'])!!}
            </div>
            <div class="col-sm-2">
                {!!Form::label('lugarProcedencia','Lugar Procedencia:')!!}
                {!!Form::text('lugarProcedencia',null,['class'=>'form-control ','placeholder'=>'Lugar Procedencia'])!!}<br>
            </div>  


            <div class="col-sm-2">
                {!!Form::label('genero','Genero:')!!} <br>
                <label><input type="radio" name="genero" id="M" value="M"> Masculino</label>
                <label><input type="radio" name="genero" id="F" value="F"> Femenino</label>
            </div>
            <div class="col-sm-2">
                {!!Form::label('celular','Celular:')!!}
                {!!Form::text('celular',null,['class'=>'form-control ','placeholder'=>'Celular','onkeypress'=>'return bloqueo_de_punto(event)','maxlength'=>'8'])!!}
            </div>  
            <div class="col-sm-2">
                {!!Form::label('celular_ref','Celular Referencia:')!!}
                {!!Form::text('celular_ref',null,['class'=>'form-control ','placeholder'=>'Celular Referencia','onkeypress'=>'return bloqueo_de_punto(event)','maxlength'=>'8'])!!}
            </div>   
            <div class="col-sm-2">
                {!!Form::label('estadoCilvil','Estado Civil:')!!}
                {!!Form::select('estadoCilvil', array('SOLTERO' => 'SOLTERO', 'CASADO' => 'CASADO', 'VIUDO' => 'VIUDO', 'DIVORCIADO' => 'DIVORCIADO'),null,array('id'=>'estado','class'=>'form-control'))!!}
            </div>  
            <div class="col-sm-2">
                {!!Form::label('domicilio','Domicilio:')!!}
                {!!Form::text('domicilio',null,['class'=>'form-control ','placeholder'=>'Domicilio'])!!}
            </div>  
            <div class="col-sm-2">
                {!!Form::label('nit','NIT:')!!}
                {!!Form::text('nit',null,['class'=>'form-control ','placeholder'=>'NIT','onkeypress'=>'return bloqueo_de_punto(event)'])!!}
            </div>                
        </div>
        </div>          
    </div> 

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-success">
        <div class="panel-heading"><b>DATOS DEL LOTE</b></div>        
        <div class="panel-body">
            <div class="col-sm-1">
                {!!Form::label('nroLote','Nro Lote:')!!}
                {!!Form::text('nroLote',$lote[0]->nroLote,['class'=>'form-control','disabled'])!!}
            </div>            
            <div class="col-sm-1">
                {!!Form::label('manzano','Manzano:')!!}
                {!!Form::text('manzano',$lote[0]->manzano,['class'=>'form-control','disabled'])!!}
            </div>
            <div class="col-sm-1">
                {!!Form::label('fase','Fase:')!!}
                {!!Form::text('fase','FASE '.$lote[0]->fase,['class'=>'form-control','disabled'])!!}
            </div>         
            <div class="col-sm-2">
                {!!Form::label('superficie','Superficie:')!!}
                {!!Form::text('superficie',$lote[0]->superficie,['class'=>'form-control','disabled'])!!}
            </div>   
            <div class="col-sm-2">
                {!!Form::label('matricula','Matricula:')!!}
                {!!Form::text('matricula',$lote[0]->matricula,['class'=>'form-control','disabled'])!!}
            </div>   
            <div class="col-sm-2">
                {!!Form::label('uv','UV:')!!}
                {!!Form::text('uv',$lote[0]->uv,['class'=>'form-control','disabled'])!!}
            </div>     
            <div class="col-sm-2">
                {!!Form::label('proyecto','Proyecto:')!!}
                {!!Form::text('proyecto',$lote[0]->nombre,['class'=>'form-control','disabled'])!!}<br>
            </div>  


            <div class="col-sm-2">
                {!!Form::label('categoria','Categoria:')!!}
                {!!Form::text('categoria',$lote[0]->categoria,['class'=>'form-control','disabled'])!!}
            </div>            
            <div class="col-sm-4">
                {!!Form::label('descripcion','Detalle Categoria:')!!}
                {!!Form::text('descripcion',$lote[0]->descripcion,['class'=>'form-control','disabled'])!!}
            </div>
            <div class="col-sm-2">
                {!!Form::label('precio','Precio mt²:')!!}
                {!!Form::text('precio',$lote[0]->precio,['class'=>'form-control','disabled'])!!}
            </div>         
        </div>
        </div>          
    </div>   

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-success">
        <div class="panel-heading">
            <b>DATOS DE LA TRANSACCION COMERCIAL</b> 
            <div class="pull-right">
                <label> <input type="radio" name="tipoPago" value="Contado" checked="" onclick="CargarTabla(this)"> Contado </label>      
                <label> <input type="radio" name="tipoPago" value="Plazo" onclick="CargarTabla(this)"> Plazo </label> 
            </div>
        </div>        
        <div class="panel-body">
            {!!Form::hidden('idVenta',$venta[0]->id,['class'=>'form-control'])!!} 
            <table class="table table-striped table-bordered table-condensed table-hover" style="display: none" id="TablaPlazo">
            <thead>
              <th>Plazo</th>    
              <th>Día de Pago</th>    
              <th>Cuota Bs.</th>    
              <th>Total Pagar Bs.</th>    
              <th>Pago Minimo en Bs.(----)</th>    
              <th>Total</th>    
              <th>Tipo de Pago</th>    
            </thead>
            <tbody>
            <tr>
              <td>{!!Form::text('plazo',null,['class'=>'form-control','placeholder'=>'Plazo','onkeypress'=>'return bloqueo_de_punto(event)'])!!}</td>
              <td><select class="form-control"><?php for ($i=1; $i<29; $i++) { echo "<option value=".$i.">".$i; } ?></select></td>
              <td>{!!Form::text('cuotaMensual',null,['class'=>'form-control','placeholder'=>'Cuota','onkeypress'=>'return numerosmasdecimal(event)'])!!}</td>
              <td align="center">{{$lote[0]->precio_total}}</td>
              <td>FALTA</td>
              <td>FALTA</td>
              <td>
                <label><input type="radio" name="tipoDepositoP" checked="" value='e' onclick="cargarBanco(this)"> Efectivo</label>      
                <label><input type="radio" name="tipoDepositoP" value='b'onclick="cargarBanco(this)"> Banco</label> <br>
                <select name="bancoP" onchange="cargarCuenta(this)" style="display: none" class="form-control"></select>
                <select name="cuentaP" style="display: none" class="form-control"></select>
                <input type="text" name="nroDocumentoP" style="display: none" class="form-control">                                 
              </td>
            </tr>
            </tbody>
            </table>               
     
            <table class="table table-striped table-bordered table-condensed table-hover" style="display: block" id="TablaContado">
            <thead>
              <th>Plazo</th>    
              <th>Día de Pago</th>    
              <th>Cuota Bs.</th>    
              <th>Total Pagar Bs.</th>    
              <th>Pago Minimo en Bs.(----)</th>    
              <th>Total</th>    
              <th>Tipo de Pago</th>    
            </thead>
            <tbody>
            <tr>
              <td>{!!Form::text('plazo',null,['class'=>'form-control','placeholder'=>'Plazo','onkeypress'=>'return bloqueo_de_punto(event)'])!!}</td>
              <td><select class="form-control"><?php for ($i=1; $i<29; $i++) { echo "<option value=".$i.">".$i; } ?></select></td>
              <td>{!!Form::text('cuotaMensual',null,['class'=>'form-control','placeholder'=>'Cuota','onkeypress'=>'return numerosmasdecimal(event)'])!!}</td>
              <td align="center">{{$lote[0]->precio_total}}</td>
              <td>FALTA</td>
              <td>FALTA</td>
              <td>
                <label><input type="radio" name="tipoDeposito" checked="" value='e' onclick="cargarBanco(this)"> Efectivo</label>      
                <label><input type="radio" name="tipoDeposito" value='b'onclick="cargarBanco(this)"> Banco</label> <br>
                <select name="bancoC" onchange="cargarCuenta(this)" style="display: none" class="form-control"></select>
                <select name="cuentaC" style="display: none" class="form-control"></select>
                <input type="text" name="nroDocumentoC" style="display: none" class="form-control">                                 
              </td>
            </tr>
            </tbody>
            </table>     

        </div>
        <div class="panel-footer">
            {!!Form::submit('VENDER',['class'=>'btn btn-primary','id'=>'btn_registrar','onclick'=>'btn_esconder()'])!!}
            <a href="{!!URL::to('PagoVenta')!!}" class="btn btn-danger">CANCELAR</a>
        </div>        
      </div>          
    </div>   
{!!Form::close()!!}
</div>

{!!Html::script('js/sesion_venta.js')!!}
@endsection