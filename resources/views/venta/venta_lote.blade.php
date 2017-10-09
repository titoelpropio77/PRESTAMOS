@extends('layouts.inicio')

@section('contenido')
@include('alerts.success')
@include('alerts.request')
@include('alerts.errors')


{!!Html::script('js/mapas.js')!!}

<div class="panel panel-success">
     <div class="panel-heading">
          <ul class="nav nav-pills">
           <li onclick="cambiomapa(3)" class=" pull-right"><a href="#">FASE 3</a></li>
            <li onclick="cambiomapa(2)" class=" pull-right"><a href="#">FASE 2</a></li>
               
            <li  onclick="cambiomapa(1)"class=" pull-right"><a href="#">FASE 1</a></li>
  <input type="hidden" value="{!!URL::to('seccion2/3')!!}" id="mapa2">
  <input type="hidden" value="{!!URL::to('seccion3/3')!!}" id="mapa3">

  <input type="hidden" value="{!!URL::to('seccion1/3')!!}" id="mapa1">

       
        </ul>
        
    </div>  
  <div class="panel-body">
                     

                     
      <iframe id="seccion" style="border: none; height: 800px ; overflow: none;width: 100%" src="{!!URL::to('seccion1/3')!!}">
                         
                     </iframe>
                     
</div>
  <div class="panel-footer">Pie del panel</div>
</div>

<!--
<div id="caja" style="    min-width: 189px;
     max-height: 128px;
     " >
    <span>Detalle</span>
    <div style="text-align: right;"><a id="active">x</a></div>
    <span style="color: white">
        LOTE NRO: <span style="color: yellow">  1058</span>
    </span> <br>
        <span style="color: white">
            DIMENSION: <span style="color: yellow"> 300x300 mt2</span>
        </span> <br>
            <span style="color: white">
                PRECIO CONTADO: <span style="color: yellow"> 2000$</span>
            </span> <br>
                <span style="color: white">
                    PRECIO CREDITO: <span style="color: yellow"> 3000$</span>
                </span> <br>


                    </div>-->

    @endsection
