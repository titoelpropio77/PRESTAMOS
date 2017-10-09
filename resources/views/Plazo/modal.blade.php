<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="titulogalpon" class="modal-title" >CREAR PLAZO</h4>
      </div>

      <div class="modal-body">
      {!!Form::open(['route'=>'plazo.store', 'method'=>'POST'])!!}
		
    
<div class="form-group">
    {!!Form::label('meses','Meses')!!}
    {!!Form::number('meses',null,['class'=>'form-control ','placeholder'=>'Ingresa el plazo en meses'])!!}
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

<!-- MODAL ACTUALIZAR-->

<div class="modal fade" id="myModalActualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="titulogalpon" class="modal-title" >ACTUALIZAR PLAZO</h4>
      </div>

      <div class="modal-body">
     {!!Form::open(['route'=>['plazo.update','null'],'method'=>'PUT'])!!} 
    
    
    <input type="hidden" name="id_plazo" id="id_plazo">
<div class="form-group">
    {!!Form::label('meses_act','Meses')!!}
    {!!Form::number('meses_act',null,['class'=>'form-control ','placeholder'=>'Ingresa el plazo en meses'])!!}
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
