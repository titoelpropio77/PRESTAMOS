<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <title>RECIBO RESERVA</title>
</head>

<body>

  <table style="width: 100%">
    <tr>
    <td width="250px"><font size="2" style="color:red;font-weight: bold; "">Nro: <?php echo $datos[0]->idVenta; ?></font></td>
      <td width="320px"> <font size="6">Plan de Pago</font></td>
      <td><img src="{{asset('images/logo.png')}}" width="150px" height="70px"></td>
    </tr> 
  </table>

  <table >
  <tr>
    <th style="text-align: left;">Cliente: </th>
    <td style="text-align: left;"> <?php echo $datoventa[0]->nombre. " ".$datoventa[0]->apellidos; ?> </td>
    <td style="font-weight: bold">C.I. :</td>
    <td style="text-align: left;"> <?php echo $datoventa[0]->ci; ?></td>
  </tr>
  <tr>
 <th>Fecha de Venta: </th>
    <td><?php
echo $datos[0]->fecha; ?> </td>
     <td style="font-weight: bold">Cuota Inicial: <?php echo $datos[0]->cuotaInicial; ?></td>
  </tr>
  <tr >
 <th style="text-align: left;">Nro. de Lote: </th>
  <td style="text-align: left;"><?php echo $datos[0]->nroLote; ?> </td>
  <td style="font-weight: bold">Manzano:</td>
  <td style="text-align: left;"><?php echo $datos[0]->manzano; ?></td>
  <td style="font-weight: bold">Fase:</td>
  <td><?php echo $datos[0]->fase; ?></td>
  </tr>
  <tr>
    <th>Precio de Venta:</th>
    <td><?php echo $datos[0]->precio; ?></td>
  </tr>
  
  </table>  
    

<?php $total=0; ?>
  <table border="2" cellspacing="3" cellpadding="5" style="width: 100%">
    <thead>
      <tr style="background: #db4437 ; text-align: center;">
        <th>Nro.</th>

        <th>Fecha de Pago</th>
        <th>Cuota</th>
        <th>Estado</th>
        
      </tr>
    </thead> 

    <tbody>   
    @foreach($datoventa as $res)
    <tr align="center">
      <td>{{$res->num}}</td>

      <td>{{$res->fechaPago}}</td>

      <td>{{$res->cuota}}</td>
      <td><?php if($res->estado=="d"){
          echo "PENDIENTE";
        }else{
          echo "PAGADO";

          } ?></td>
   
    </tr>    
   

    @endforeach
    </tbody>

  <tfoot border="2" style="text-align: center; background: #4EB7EC">
    <td style="font-weight: bold">Total</td>
    <td></td>
    <td> <?php echo $datos[0]->total ?> </td>
    <td></td>
  </tfoot>

  </table>

  
</body>
</html>
