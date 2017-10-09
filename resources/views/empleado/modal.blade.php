<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="titulogalpon" class="modal-title" >ELIMINAR EMPLEADO</h4>
      </div>

      <div class="modal-body">
        {!!Form::open(['route'=>['Empleado.destroy','null'],'method'=>'DELETE'])!!}
	<h4 style="font-weight: bold">¿DESEA ELIMINAR A ESTE EMPLEADO?</h4>
	
       <input type="hidden" name="idEmpleado" >
  </div>

      <div class="modal-footer">
  {!!Form::submit('ELIMINAR',['class'=>'btn btn-danger'])!!}
  <button data-dismiss="modal" type="button" class="btn btn-warning">CANCELAR</button>
  {!!Form::close()!!}
<!--footer del modal-->
      </div>
    </div>
  </div>
</div>
