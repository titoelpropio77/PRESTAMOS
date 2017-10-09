@extends('layouts.inicio')
@section('contenido')
@include('alerts.cargando')
@include('alerts.request')
@include('alerts.errors')
          {{Form::open(array('url' => 'RegistrarEmpleadoGestor','onKeypress'=>'if(event.keyCode == 13) event.returnValue = false;','onsubmit'=>'javascript: return validar()'))}} 
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
        <div class="col-sm-3 ">
                   <div class="form-group">
              {!!Form::label('nombre','Nombre:')!!}
              {!!Form::text('nombre',null,['class'=>'form-control ','placeholder'=>'Ingresa el Nombre del usuario'])!!}
          </div>
          </div>
          <div class="col-sm-4 ">
            <div class="form-group">
                {!!Form::label('apellido','Apellido:')!!}
                {!!Form::text('apellido',null,['class'=>'form-control ','placeholder'=>'Ingresa el apellido del usuario'])!!}
            </div>    
          </div>

           <div class="col-sm-2 ">
         <div class="form-group">
            {!!Form::label('ci','C.I.:')!!}
            {!!Form::number('ci',null,['class'=>'form-control ','placeholder'=>'Ingresa el C.I. del usuario'])!!}
        </div> 
          </div>

           <div class="col-sm-3 ">
         <div class="form-group">
          {!!Form::label('ci','Expedido:')!!}
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

<div class="col-sm-3 ">
 <div class="form-group">
                {!!Form::label('nacionalidad','Nacionalidad:')!!}
                   {!!Form::select('idPais',$pais,null,array('class'=>'form-control'))!!}
            </div>
          </div>
            <div class="col-sm-2">
                <div class="form-group">
                  {!!Form::label('idPadre','Género:')!!}    <br>            
                  <label>{!!Form::radio('genero','m',['class'=>'form-control'])!!}Masculino</label>          
                  <label>{!!Form::radio('genero','f',null)!!}Femenino</label>   <br> 
            </div>
          </div>
          
                <div class="col-sm-3">
                <div class="form-group">
                    {!!Form::label('celular','Celular:')!!}
                    {!!Form::number('celular',null,['class'=>'form-control ','placeholder'=>'Ingresa el Celular del usuario'])!!}<br><br>
                </div>
 
          </div>     
          <div class="col-sm-5 ">
          <div class="form-group">
                {!!Form::label('direccion','Direccion:')!!}
                {!!Form::text('direccion',null,['class'=>'form-control ','placeholder'=>'Ingresa el Direccion del usuario'])!!}
            </div>
          </div>
 <div class="col-sm-3">
                <div class="form-group">
                    {!!Form::label('idCargo','Cargo:')!!}
                  <select name="idCargo" id="idCargo" class="form-control"> </select>                  
                   <?php /*{!!Form::select('idCargo',array('0'=>'Seleccione Un Cargo','7'=>'VENDEDOR','3'=>'GESTOR DE VENTA','6'=>'ASESOR DE VENTA'),null,array('class'=>'form-control'))!!}*/ ?>
                </div>
          </div>

           <div class="col-sm-3">
                <div class="form-group">
                    {!!Form::label('idPadre','Superior:')!!}
                    <?php $login=DB::select("SELECT *FROM empleado where empleado.id=".Session::get('idEmpleado')); ?>
                    {!!Form::text('aux',$login[0]->nombre.' '.$login[0]->apellido,['id'=>'aux','class'=>'form-control ','readonly'])!!}                    
                    <select name="idPadre" id="idPadre" class="form-control" >
                    </select>                   
                </div>
          </div>
               <div class="col-sm-2 ">
                <div class="form-group">
                    {!!Form::label('codigo','Generar Codigo Vendedor:')!!}
                    {!!Form::text('codigo',null,['class'=>'form-control ','placeholder'=>'Ingresa el codigo del usuario'])!!}
                    <input class="btn btn-warning" onclick="generarCodigo()" value="generar">
                </div>
          </div>
           
           

          
          <input type="hidden" name="login" id="login" value="{{Session::get('idEmpleado')}}">
          <input type="hidden" name="tipo" id="tipo" value="{{$tipo[0]->idCargo}}">
           <?php /*<div class="col-sm-3">
                <div class="form-group">
                    {!!Form::label('idPadre','Superior:')!!}
                      <select name="idPadre" class="form-control selectpicker" id="idPadre" data-live-search="true">
                       <option value="">Seleccione al Superior</option>
                          @foreach($padre as $pad)
                          <option value="{{$pad->id}}">{{$pad->nombre}} {{$pad->apellido}}sss</option>
                          @endforeach
                      </select><br>                     
                </div>
          </div>*/ ?>

        </section>
      </div>
     
    </div>                  
                     
</div>
 <script type="text/javascript">
  $(document).ready(function(){
    tipo=$("#tipo").val();
    switch(tipo) {
        case '5':
            $('#idCargo').append("<option value='0'>Seleccione Un Cargo");            
            $('#idCargo').append("<option value='7'>VENDEDOR");            
            $('#idCargo').append("<option value='3'>GESTOR DE VENTAS");            
            $('#idCargo').append("<option value='6'>ASESOR DE VENTAS");            
            break;
        case '6':
            $('#idCargo').append("<option value='0'>Seleccione Un Cargo");            
            $('#idCargo').append("<option value='7'>VENDEDOR");            
            $('#idCargo').append("<option value='3'>GESTOR DE VENTAS"); 
            break;                
    }
      $('#aux').hide();   
      $('#loading').css('display','none');      
  }); 
   function generarCodigo(){
    yourNumber=parseInt($('input[name=ci]').val());
    hexString = yourNumber.toString(16);
    $('input[name=codigo]').attr('type','text');
    $('input[name=codigo]').val(hexString);
   }


  $("#idCargo").change(function(event){    
      $('#loading').css('display','block');      
      $('#idPadre').show();   
      $('#aux').hide();   
      var id = $("#idCargo").val(); 
      if (id==0) {
        $('#idPadre').empty();              
        $('#loading').css('display','none');      
      } else {
        if (id == 6) { //BUSCA AL GERENTE DE VENTAS Q ESTA LOGEADO PORQ ELEGI UN TIPO ASESOR VENTA EN EL OTRO SELECT
            $('#idPadre').empty();   
            $('#idPadre').hide();   
            $('#aux').show();   
            login=$("#login").val();
            $('#idPadre').append("<option value='"+login+"'>"+login);                                  
            $('#loading').css('display','none');      
        } else {
          switch(id) {
              case '7':
                  ruta="BuscarSuperior/3"; //BUSCA A TODOS LOS GESTORES PORQ ELEGI UN TIPO VENDEDOR EN EL OTRO SELECT              
                  break;
              case '3':
                  ruta="BuscarSuperior/6"; //BUSCA A TODOS LOS ACESORES PORQ ELEGI UN TIPO GESTOR VENTA EN EL OTRO SELECT
                  break;                
          }
          $('#idPadre').empty();      
          $.get(ruta, function(res){
            $('#idPadre').append('<option value=0>Seleccione Un Superior ...');
            for (var i = 0; i < res.length; i++) {
              $('#idPadre').append('<option value='+res[i].id+'>'+res[i].nombre+' '+res[i].apellido +' - '+ res[i].codigo);    
            }
            $('#loading').css('display','none');      
          });
         }
      } 
  });   


function validar(){
  if ($('input[name=nombre]').val()=="" || $('input[name=apellido]').val()=="" || $('input[name=ci]').val()=="" || $('input[name=direccion]').val()=="" || $('input[name=codigo]').val()=="" || $('input[name=celular]').val()=="" || $('select[name=idCargo]').val()==0 || $('select[name=idPadre]').val()==0) {
      if ($('input[name=nroDocumento]').val()=="") {
          toastr.error('El campo nroDocumento no debe estar vacio');
      }              
      if ($('input[name=nombre]').val()=="") { toastr.error('El campo Nombre no debe estar vacio'); }      
      if ($('input[name=apellido]').val()=="") { toastr.error('El campo Apellido no debe estar vacio'); }
      if ($('input[name=ci]').val()=="") { toastr.error('El campo Carnet no debe estar vacio'); }            
      if ($('input[name=direccion]').val()=="") { toastr.error('El campo Direccion no debe estar vacio'); }            
      if ($('input[name=codigo]').val()=="") { toastr.error('El campo Codigo no debe estar vacio'); }            
      if ($('input[name=celular]').val()=="") { toastr.error('El campo Celular no debe estar vacio'); }            
      if ($('select[name=idCargo]').val()==0) { toastr.error('No selecciono ningun Cargo'); }            
      if ($('select[name=idPadre]').val()==0) { toastr.error('No selecciono ningun Superior'); }           
       return false;
  } else {
      toastr.success('CREADO CORRECTAMENTE');            
       return true;
  }
}


 </script>



   <div class="panel-footer">
   {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
  <a class="btn btn-danger" href="ListaEmpleado">Cancelar</a>    
  </div>
</div> 

           </div>
</div>
  {!!Form::close()!!}
 
  @endsection