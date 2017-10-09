<div class="modal fade" id="ModalMoneda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="titulos" class="modal-title" >CAMBIO DOLAR</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
            {!!Form::label('usuario','Usuario:')!!}
            {!!Form::text('usuario',null,['class'=>'form-control ','placeholder'=>'Usuario'])!!}
        </div>

        <div class="form-group">
            {!!Form::label('password','Contraseña:')!!}
            <input type="password" name="password" class="form-control" placeholder="Contraseña">
        </div>

        <div class="form-group">
            {!!Form::label('moneda','Moneda:')!!}
            <input type="number" class="form-control" placeholder="Moneda" name="moneda" step="0.001" required autofocus>
        </div>
       
      </div>
      <div class="modal-footer">
          <button class="btn btn-primary" onclick="CambioMoneda()">ACTUALIZAR</button>      
          <?php //{!!Form::submit('ACTUALIZAR',['class'=>'btn btn-primary pull-right'])!!} ?>
      </div>
    </div>
  </div>
</div>
 