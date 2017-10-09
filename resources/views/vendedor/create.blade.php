@extends('layouts.inicio')
    @section('contenido')
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    @include('alerts.request')
    {!!Form::open(['route'=>'Vendedor.store', 'method'=>'POST'])!!}

    <div class="form-group" >
        {!!Form::label('padre','Superior:')!!}                
        <select name="padre" class="form-control selectpicker" id="padre" data-live-search="true">
         <option value="">Seleccione al Superior</option>
            @foreach($padre as $pad)
            <option value="{{$pad->id}}">{{$pad->nombre}} {{$pad->apellido}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group" >
        {!!Form::label('hijo','Inferior:')!!}                
        <select name="hijo" class="form-control selectpicker" id="hijo" data-live-search="true">
         <option value="">Seleccion al Inferior</option>
            @foreach($hijo as $hij)
            <option value="{{$hij->id}}">{{$hij->nombre}} {{$hij->apellido}}</option>
            @endforeach
        </select>
    </div>
</div>
</div>


    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">      
    <div align="right">
        {!!Form::submit('REGISTRAR',['class'=>'btn btn-primary','id'=>'btn_registrar','onclick'=>'btn_esconder()'])!!}      
        <a href="{!!URL::to('Vendedor')!!}" class="btn btn-danger">CANCELAR</a>
    </div>      
    {!!Form::close()!!}
    </div>

</div>
    @endsection