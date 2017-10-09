<div class="form-group">
    {!!Form::label('nombre','Nombre:')!!}
    {!!Form::text('name',null,['class'=>'form-control ','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('apellido','Apellido:')!!}
    {!!Form::text('apellido',null,['class'=>'form-control ','placeholder'=>'Ingresa el apellido del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('direccion','Direccion:')!!}
    {!!Form::text('direccion',null,['class'=>'form-control ','placeholder'=>'Ingresa el Direccion del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('ci','C.I.:')!!}
    {!!Form::text('ci',null,['class'=>'form-control ','placeholder'=>'Ingresa el C.I. del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('celular','Celular:')!!}
    {!!Form::text('celular',null,['class'=>'form-control ','placeholder'=>'Ingresa el Celular del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('telefono','Celular Ref:')!!}
    {!!Form::text('telefono',null,['class'=>'form-control ','placeholder'=>'Ingresa el Celular de referebcua del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('nit','Nit:')!!}
    {!!Form::text('nit',null,['class'=>'form-control ','placeholder'=>'Ingresa el Nit del usuario'])!!}
</div>

<div class="form-group">
    {!!Form::label('nick','Nick:')!!}
    {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('password','Contraseña:')!!}
    {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>

<div class="form-group">
    {!!Form::label('privilegio','Privilegios:')!!}
    <select class="selectpicker" name="privilegio">
    <option value="0">ADMINISTRADOR</option>
    <option value="1">OFICINA</option>
    <option value="2">VENDEDOR</option>
    <option value="3">CONTADOR</option>

   
    </select>
</div>
<div class="form-group">
    {!!Form::label('estado','ESTADO DEL USUARIO:')!!}
    <select class="selectpicker" name="estado">
    <option value="1">ACTIVO</option>
    <option value="0">INACTIVO</option>
   

   
    </select>
</div>

