<div class="modal fade" id="DetalleCuota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="titulos" class="modal-title">DETALLE DE PAGOS</h4>
      </div>

      <div class="modal-body">

                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                        <th><CENTER>NRO. CUOTAS</CENTER></th>
                        <th><CENTER>FECHA</CENTER></th>
                        <th><CENTER>MONTO</CENTER></th>
                        <th><CENTER>ESTADO</CENTER></th>
                        <th><CENTER>DETALLE</CENTER></th>
                        </thead>
                        
                        <tbody id="body_cuota">
                          
                        </tbody>

                      
                    </table>


      </div>
      <div class="modal-footer">
          <?php //{!!Form::submit('ACTUALIZAR',['class'=>'btn btn-primary pull-right'])!!} ?>
      </div>
    </div>
  </div>
</div>
 

 <?php /*

                        <TR>
                        <td align=center>FECHA</td>
                        <td align=center>MONTO</td>
                        <td align=center>ESTADO</td>
                        <td align=center>


                        <div class="box box-warning direct-chat direct-chat-warning collapsed-box">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <div class="box-body" style="display: none;">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <tr>
                                <td>MONTO</td>
                                <td>FECHA</td>
                            </tr>
                        </table>
                    </div>                    
                        </div>
                        </td>
                        </TR>
 */ ?>