@extends('layouts.inicio')
@section('contenido')
@include('alerts.cargando')
@include('alerts.request')
@include('alerts.errors')
          {{Form::open(array('url' => 'ActualizarEmpleadoGestor','onKeypress'=>'if(event.keyCode == 13) event.returnValue = false;'))}} 
	     <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<div class="panel panel-success">
<div class="panel-heading">
<h4>DATOS DEL EMPLEADO</h4>       
  
  </div>  
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>
        <div class="col-sm-3">
        <input type="hidden" name="id_empleado" value="{{$vendedor[0]->id}}">
         <div class="form-group">
    {!!Form::label('nombre','Nombre:')!!}
    {!!Form::text('nombre',$vendedor[0]->nombre,['class'=>'form-control ','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
          </div>
          <div class="col-sm-4 ">
            <div class="form-group">
                {!!Form::label('apellido','Apellido:')!!}
                {!!Form::text('apellido',$vendedor[0]->apellido,['class'=>'form-control ','placeholder'=>'Ingresa el apellido del usuario'])!!}
            </div>    
          </div>
           <div class="col-sm-2 ">
         <div class="form-group">
            {!!Form::label('ci','C.I.:')!!}
            {!!Form::number('ci',$vendedor[0]->ci,['class'=>'form-control ','placeholder'=>'Ingresa el C.I. del usuario'])!!}
            <input type="hidden" name="ci_aux" value="{{$vendedor[0]->ci}}">
        </div> 
          </div>

           <div class="col-sm-3 ">
         <div class="form-group">
          {!!Form::label('ci','Expedido:')!!}
          {!!Form::select('expedido',array('SC'=>'[SC] SANTA CRUZ','LP'=>'[LP] LA PAZ','CB'=>'[CB] COCHABAMBA','BN'=>'[BN] BENI','CH'=>'[CH] CHUQUISACA','PA'=>'[PA] PANDO','TJ'=>'[TJ] TARIJA','PT'=>'[PT] POTOSI','OR'=>'[OR] ORURO','EX'=>'[EX] EXTRANJERO'),$vendedor[0]->expedido,array('class'=>'form-control'))!!}          
          </div>
          </div>
<div class="col-sm-3 ">
 <div class="form-group">
                {!!Form::label('nacionalidad','Nacionalidad:')!!}
                   {!!Form::select('idPais',$pais,null,array('class'=>'form-control'))!!}
            </div>
          </div>
            <div class="col-sm-2">
          <div class="form-group">
            <label>Género</label><br>
            <?php if ($vendedor[0]->genero == 'm'): ?>
              <label>{!!Form::radio('genero','m',['class'=>'form-control'])!!}Masculino</label>
              <label>{!!Form::radio('genero','f',null)!!}Femenino</label>                
            <?php else: ?>
              <label>{!!Form::radio('genero','m',null)!!}Masculino</label>
              <label>{!!Form::radio('genero','f',['class'=>'form-control'])!!}Femenino</label>              
            <?php endif ?>
  
          </div>
 
          </div>

          <div class="col-sm-6 ">
          <div class="form-group">
                {!!Form::label('direccion','Direccion:')!!}
                {!!Form::text('direccion',$vendedor[0]->direccion,['class'=>'form-control ','placeholder'=>'Ingresa el Direccion del usuario'])!!}
            </div>
          </div>

               <div class="col-sm-3 ">
                <div class="form-group">
                    {!!Form::label('codigo','Generar Codigo Vendedor:')!!}
                    {!!Form::text('codigo',$vendedor[0]->codigo,['class'=>'form-control ','placeholder'=>'Ingresa el codigo del usuario'])!!}
                </div>
            <input class="btn btn-warning" onclick="generarCodigo()" value="generar">
          </div>
           
            <div class="col-sm-3 ">
                <div class="form-group">
                    {!!Form::label('celular','Celular:')!!}
                    {!!Form::number('celular',$vendedor[0]->celular,['class'=>'form-control ','placeholder'=>'Ingresa el Celular del usuario'])!!}
                </div>
 
          </div>

           <div class="col-sm-3 ">
                <div class="form-group">
                    {!!Form::label('idCargo','Cargo:')!!}
                    <?php 
                    switch ($vendedor[0]->idCargo) {
                      case 7:
                        $cargo="VENDEDOR";
                        break;
                      case 3:
                        $cargo="GESTOR DE VENTAS";
                        break;
                      case 6:
                        $cargo="ASESOR DE VENTAS";
                        break;                                                
                    }
                    ?>
                    <input type="hidden" name="idCargo" value="{{$vendedor[0]->idCargo}}">
                    {!!Form::text('cargo',$cargo,['class'=>'form-control ','readonly'])!!}                  
                </div>
          </div>



        </section>
      </div>
     
    </div>                  
                     
</div>
 <script type="text/javascript">
  $(document).ready(function(){
      $('#loading').css('display','none')
  }); 
   function generarCodigo(){
    yourNumber=parseInt($('input[name=ci]').val());
    hexString = yourNumber.toString(16);
    $('input[name=codigo]').attr('type','text');
    $('input[name=codigo]').val(hexString);
   }
 </script>



   <div class="panel-footer">
   {!!Form::submit('ACTUALIZAR',['class'=>'btn btn-primary'])!!}
  <a class="btn btn-danger" href="../ListaEmpleado">CANCELAR</a>    
  </div>
</div>

		       </div>
</div>
	{!!Form::close()!!}
 
	@endsection