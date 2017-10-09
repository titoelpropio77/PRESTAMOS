@extends('layouts.inicio')
@section('contenido')
@include('alerts.errors')
@include('alerts.success')
@include('alerts.cargando')

<div class="row">   
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <font size="6">LOTES DISPONIBLES</font>
        </div>  
    </div>

    {!!Form::open(['class'=>'form-group','route'=>'Venta.index', 'method'=>'GET'])!!}

    <!-- ,'onsubmit'=>'javascript: return validar()' -->

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-sm-3">
         <label for="">Fase</label>
         <select class="form-control" onchange="BuscarManzano(this)"" ><option value=0>Nro FASE<option value=1 >FASE 1<option value=2 >FASE 2<option value=3 >FASE 3</select>
        </div>
        <div class="col-sm-3">
            <center><label for="">NÚMERO DE MANZANO</label></center>
           <select class="form-control" name="nro_manzano" id="nro_manzano" onchange="BuscarLote(this)"" ></select>

        </div>
         <div class="col-sm-3">
            <center><label for="">NÚMERO DE Lote</label></center>
            <select class="form-control" name="nroLote" id="nro_lote" onchange="(this)"" type="onsubmit"></select>

        </div>
        {!!Form::submit('Buscar',['class'=>'btn btn-primary','id'=>'btn_registrar'])!!}

    </div>


        <!-- <button id="btnbuscarlote" class="btn btn-primary"  onclick="Pintar()" ><i class="fa fa-search" aria-hidden="true"></i>
        </button> -->
  

     {!!Form::close()!!}


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                        <th><center>Nro Lote</center></th>
                        <th><center>Superficie (m<sup>2</sup>)</center></th>
                        <th><center>Manzano</center></th>
                        <th><center>Categoria</center></th>
                        <th><center>Precio al Contado</center></th>
                        <th><center>Precio a Plazo</center></th>
                        <th><CENTER>Operación</CENTER></th>
                       
                        @foreach ($Lote as $Lot)
                        <TR>    
                        <td><center>{{$Lot->nroLote}}</center></td>
                        <td><center>{{$Lot->superficie.' '}}m<sup>2</sup></center></td>

                        <td><center>{{$Lot->manzano}}</center></td>
                        <td><center>{{$Lot->categoria}}</center></td>
                        <td><center>{{($Lot->precio*$Lot->superficie)-((($Lot->precio*$Lot->superficie)*$Lot->descuento)/100).' '}}$us</center></td>
                        <td><center>{{$Lot->precio*$Lot->superficie.' '}}$us</center></td>
                       
                        <td><center>
                        <a href="{!!URL::to('VentaLote')!!}<?php echo "/".$Lot->id ?>" class="btn btn-success">Vender</a>
                        </center></td>
                        </TR>
                        @endforeach 
            </table>

        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
$('#loading').css('display','none');
});
    function BuscarManzano(select){
  $('#loading').css('display','block');      

  fase=$(select).val();
  $('#nro_manzano').empty();
  $('#nro_lote').empty();
  $.get('BuscarManzano/'+fase,function(res){
    $('#nro_manzano').append('<option value=0>Nro MANZANO');
    for (var i = 0; i < res.length; i++) {
      $('#nro_manzano').append('<option value='+res[i].manzano+'>'+res[i].manzano);
    }
    $('#loading').css('display','none');      
  });
}
function Buscar_Lote(select){
  $('#loading').css('display','block');      
  idLote = $("#nro_lote").val();
  $.get('BuscarLoteId/'+idLote , function (response) { 
  
    $('#loading').css('display','none');      
  });
}


function BuscarLote(select){
  $('#loading').css('display','block');      
 
  manzano=$(select).val();
  $('#nro_lote').empty();
  $.get('BuscarLoteReserva/'+manzano,function(res){
    $('#nro_lote').append('<option value=0>Nro LOTE');
    for (var i = 0; i < res.length; i++) {
      $('#nro_lote').append('<option value='+res[i].id+'>'+res[i].nroLote);    
    }
    $('#loading').css('display','none');      
  });
}

</script>
 @endsection

  


