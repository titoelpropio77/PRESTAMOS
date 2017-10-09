

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="titulogalpon" class="modal-title" >CREAR USUARIO</h4>
      </div>
      <div class="modal-body">
      {!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
    @include('vendedor.forms.usr')
    {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
  {!!Form::close()!!}
       
  </div>

      <div class="modal-footer">

<!--footer del modal-->
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="myModalupdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="titulogalpon" class="modal-title" >MODIFICAR USUARIO</h4>

      </div>
<input type="text" value="" id="id_usuario" hidden="">
      <div class="modal-body">
      {!!Form::open(['route'=>'lote.store', 'method'=>'POST'])!!}
      
   <input type="text" hidden id="id_usuario_up" name="id_usuario_up">

    <div class="form-group">
    {!!Form::label('nombre','Nombre:')!!}
    {!!Form::text('name_up',null,['id'=>'name_up','class'=>'form-control ','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('apellido','Apellido:')!!}
    {!!Form::text('apellido_up',null,['id'=>'apellido_up','class'=>'form-control ','placeholder'=>'Ingresa el apellido del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('direccion','Direccion:')!!}
    {!!Form::text('direccion_up',null,['id'=>'direccion_up','class'=>'form-control ','placeholder'=>'Ingresa el Direccion del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('ci','C.I.:')!!}
    {!!Form::text('ci_up',null,['id'=>'ci_up','class'=>'form-control ','placeholder'=>'Ingresa el C.I. del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('celular','Celular:')!!}
    {!!Form::text('celular_up',null,['id'=>'celular_up','class'=>'form-control ','placeholder'=>'Ingresa el Celular del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('telefono','Celular Ref:')!!}
    {!!Form::text('telefono_up',null,['id'=>'telefono_up','class'=>'form-control ','placeholder'=>'Ingresa el Celular de referebcua del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('nit','Nit:')!!}
    {!!Form::text('nit_up',null,['id'=>'nit_up','class'=>'form-control ','placeholder'=>'Ingresa el Nit del usuario'])!!}
</div>


<div class="form-group">
    {!!Form::label('estado_up','ESTADO DEL USUARIO:')!!}
   
   {!!Form::select('estado_up',[],null,['id'=>'estado_up','class','form-control'])!!}
    
</div>
<div class="form-group">
    {!!Form::label('privilegio_up','PRIVILEGIOS DEL USUARIO:')!!}
   
  
    <select class="" name="privilegio_up">
    </select>
    
</div>

</div>
 <div class="modal-footer">
 {!!Form::submit('ACTUALIZAR',['class'=>'btn btn-primary'])!!}
      </div>
  {!!Form::close()!!}
   
       
  </div>

     
    </div>
  </div>
</div>
