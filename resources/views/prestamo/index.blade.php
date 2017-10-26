@extends('layouts.inicio')
@section('Contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <font size="6">LISTA DE PRESTAMOS</font>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"> 
        <label for="">HASTA</label>
                
            <?php $fecha=date('Y-m-j'); ?>
           <input type="date" name="fecha_fin" value="" class="form-control">
           <a href="Gestionarprestamo/create">
           <button  type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i>NUEVO PRESTAMO</button ></a>
        </div>    
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
         <label for="">DESDE</label> 
               
                    
<input type="date" name="fecha_inicio" value="" class="form-control">
       
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th><p align="left">DATOS DEL CLIENTE</p></th>
                <th><CENTER>CAPITAL PRESTADO</CENTER></th>                
                <th><CENTER>FECHA</CENTER></th>
                <th><CENTER>ESTADO</CENTER></th>

                <th><CENTER>INTERES</CENTER></th>

                <th><CENTER>GANANCIAS</CENTER></th>
                <th><CENTER>CLIENTE</CENTER></th>
                <th><CENTER>EMPLEADO</CENTER></th>

                </thead>
                <tbody>
                    @foreach($prestamo as $pre)
                    <tr>
                        <td>
                            <SPAN style='font-weight: bold;'>NOMBRE: </SPAN> {{$pre->cliente}}<br>
                            <SPAN style='font-weight: bold;'>CI: </SPAN>{{$pre->ci}} <br>
                            <SPAN style='font-weight: bold;'>TELEFONO: </SPAN>{{$pre->celular}} 
                        </td>
                            
                        <td>
                            <SPAN style='font-weight: bold;'>CAPITAL: </SPAN> {{$pre->capitalPrestado}}<br>                
                        </td>

                        <td>
                            <SPAN style='font-weight: bold;'>FECHA: </SPAN> {{$pre->fecha}}<br>                
                        </td>    
                        
                        <td>
                            <SPAN style='font-weight: bold;'>ESTADO: </SPAN> {{$pre->estado}}<br>                
                        </td>  

                        <td>
                            <SPAN style='font-weight: bold;'>INTERES: </SPAN> {{$pre->interes}}<br>                
                        </td>  

                        <td>
                            <SPAN style='font-weight: bold;'>GANANCIA: </SPAN> {{$pre->ganancia}}<br>                
                        </td>  

                        <td>
                            <SPAN style='font-weight: bold;'>PRESTADO: </SPAN> {{$pre->capitalPrestado}}<br>                
                        </td>  

                        <td>
                            <SPAN style='font-weight: bold;'>EMPLEADO: <BR></SPAN> {{$pre->empleado}}<br>                
                        </td>  

                    </tr>


                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>

</div>
</div>
{!!Html::script('js/listaventa.js')!!}

    @endsection