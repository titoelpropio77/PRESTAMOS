<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <title>RECIBO RESERVA</title>
</head>

<body>
<table border="1">
                <thead >
                <tr>
                <th>Superior</th>
                <th>Codigo Superior</th>
                <th>Inferior</th>
                <th>ci</th>
                <th>Codigo Inferior</th>
           </tr>
                </thead>
                @foreach ($vendedor as $cli)
                <tr style="text-align: center;">
                <?php $padre=DB::select("SELECT nombre,apellido,codigo from empleado WHERE empleado.deleted_at IS NULL and empleado.id=".$cli->idEmpleadoPadre); ?>
                <td>{{$padre[0]->nombre}} {{$padre[0]->apellido}}</td>
                 <td>{{$padre[0]->codigo}} </td>
                <?php $hijo=DB::select("SELECT nombre,apellido,codigo,ci from empleado WHERE empleado.deleted_at IS NULL and empleado.id=".$cli->idEmpleadoHijo);
                       if (count($hijo)!=0) {
                          
                        
                 ?>                
                <td>{{$hijo[0]->nombre}} {{$hijo[0]->apellido}}</td>
                  <td>{{$hijo[0]->ci}} </td>
                
                <td>{{$hijo[0]->codigo}} </td>
               <?php } ?>
                </tr>
                @endforeach 
 </table>
</body>
</html>
