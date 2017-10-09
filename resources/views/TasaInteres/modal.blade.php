<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="titulogalpon" class="modal-title" >CREAR TASA INTERES</h4>
      </div>

      <div class="modal-body">
      {!!Form::open(['route'=>'tasaInteres.store', 'method'=>'POST'])!!}
		
    
<div class="form-group">
    {!!Form::label('porcentaje','Porcentaje:')!!}
    {!!Form::number('porcentaje',null,['class'=>'form-control ','placeholder'=>'Ingresa el porcentaje de ta tasa de interes'])!!}
</div>

		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
       
  </div>

      <div class="modal-footer">

<!--footer del modal-->
      </div>
    </div>
  </div>
</div>



<!-- MODAL ACTUALIZAR -->

<div class="modal fade" id="myModalActualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="titulogalpon" class="modal-title" >ACTUALIZAR TASA INTERES</h4>
      </div>

      <div class="modal-body">
      {!!Form::open(['route'=>['tasaInteres.update','null'],'method'=>'PUT'])!!}
    
    <input type="hidden" name="id_act" id="id_act">
<div class="form-group">
    {!!Form::label('porcentaje','Porcentaje:')!!}
    {!!Form::number('porcentaje_act',null,['id'=>'porcentaje_act','class'=>'form-control ','placeholder'=>'Ingresa el porcentaje de ta tasa de interes'])!!}
</div>

    {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
  {!!Form::close()!!}
       
  </div>

      <div class="modal-footer">

<!--footer del modal-->
      </div>
    </div>
  </div>
</div>
