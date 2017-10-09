<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <title>RECIBO RESERVA</title>
</head>

<body>

  <img src="{{asset('images/logo.png')}}" width="150px" height="70px" style="padding: 10px; margin: 10px; float: right;">
  <font size="4" color="red" style="padding: 5px; margin: 5px; float: left;">Nº: <b>{{$reserva[0]->codigo}}</b></font>
  <table align="center">
    <tr>
      <td><font size="6">RECIBO DE RESERVA</font></td>
    </tr> 
  </table>

  <table >
    <tr>  
      <td><font size="4">Recibí de: </font></td>
      <td><font size="4"><b>{{$reserva[0]->cliente}}</b></font></td>
      <td>                  </td>
      <td><font size="4"> Carnet: </font></td>
      <td><font size="4"><b>{{$reserva[0]->ci}}</b></font></td>         
    </tr> 

    <?php $total_2=0; ?>
    @foreach($reserva as $res)  
      <?php $total_2 = $total_2 + $res->subTotal; ?>
    @endforeach

    <tr>  
      <td><font size="4">La suma de: </font></td>
      <td><font size="4"><b>{{$total_2}} Bs.</b></font></td>
    </tr> 



    <tr>  
      <td><font size="4">Fecha: </font></td>
      <td><font size="4"><b>{{$reserva[0]->fecha}}</b></font></td>
    </tr> 
  </table>    

<?php $total=0; ?>
  <table border="2" cellspacing="3" cellpadding="5">
    <thead>
      <tr style="background: #16AEDC">
        <th><center>Nro LOTE</center></th>
        <th><center>MANZANO</center></th>
        <th><center>FASE</center></th>
        <th><center>SUPERFICIE</center></th>
        <th><center>CATEGORIA</center></th>
        <th><center>PROYECTO</center></th>
        <th><center>SUB TOTAL</center></th>
      </tr>
    </thead> 

    <tbody>   
    @foreach($reserva as $res)
    <tr align="center">
      <td>{{$res->nroLote}}</td>
      <td>{{$res->manzano}}</td>
      <td>{{$res->fase}}</td>
      <td>{{$res->superficie}} mt²</td>
      <td>{{$res->categoria}}</td>
      <td>{{$res->nombre}}</td>
      <td>{{$res->subTotal}}</td>
    </tr>    
    <?php $total = $total + $res->subTotal; ?>

    @endforeach
    </tbody>

    <tfoot>
      <tr>
        <td colspan="6"><font size="4"><b>TOTAL</b></font></td>
        <td align="center"><font size="4"><b>{{$total}} Bs.</b></font></td>
      </tr>
    </tfoot>

  </table>

<br><br><br><br>
  <table >
    <tr>  
      <td><font size="4">--------------------------------</font></td>       
    </tr> 

    <tr>  
      <td align="center"><font size="4">RECIBIDO POR </font></td>
    </tr> 
  </table>   
  
</body>
</html>
