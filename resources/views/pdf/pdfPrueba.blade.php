<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <title>RECIBO RESERVA</title>
</head>

<body>
<div style="width: 100%;border: rgb(196, 209, 220) solid 3px; margin-bottom: 10px; border-radius: 25px; padding: 10px; background: #e6e6e8">
<div style="width: 80%;display: inline-block;">
  <table style="width: 100%" >
    <tr>
    <td width="250px"><font size="2" style="color:red;font-weight: bold; "">Nro: 5</font></td>
      <td width="320px"> <font size="6">Plan de Pago</font></td>
    
    </tr> 
  </table>
 
  <!-- <table cellspacing="3" cellpadding="2" style=" border-spacing:  1px">
  <tr style="padding:  1px;text-align: left;">
    <th style="text-align: left;">Cliente: </th>
    <td style="text-align: left;"> MODESTO SALDANA MICHALEC </td>
    <td style="font-weight: bold">C.I. :</td>
    <td style="text-align: left;"> 8883510</td>
  </tr>
  <tr>
 <th  style="text-align: left;">Fecha de Venta: </th>
    <td>2017/02/02 15:00:00</td>
     <td style="font-weight: bold">Cuota Inicial:</td>
     <td>3555</td>
  </tr>
  <tr >

 <th style="text-align: left;">Urbanización: </th>
  <td style="text-align: left;">La Barranca</td>
   <td style="text-align: left;font-weight: bold">Fase:</td>
   <td style="text-align: left;">1</td>

   
  <td style="font-weight: bold">Manzano:</td>
  <td>1</td>
  </tr>
  <tr>
    <th style="text-align: left;font-weight: bold">Nro. Lote: </th>
  <td style="text-align: left;">5 </td>
  <td style="font-weight: bold;text-align: left">Precio del lote</td>
  <td style="text-align: left">3555</td>
   <td style="font-weight: bold;text-align: left">Descuento</td>
  <td style="text-align: left">10%</td>
  </tr>
  <tr>
    <th style="text-align: left">Precio de Venta:</th>
    <td>3400</td>
  </tr>
  
  </table>  -->
  <div style="margin-bottom: 10px">
    <span style="margin-right: 10px"><b> Cliente: </b> <?php echo $cliente[0]->nombre.' '.$cliente[0]->apellidos; ?></span>
    <span style="margin-right: 10px;"><b> CI:</b> <?php echo $cliente[0]->ci.' '.$cliente[0]->expedido.'.'; ?></span>
    </div> 
    <span style="margin-right: 10px"><b> Fecha de Venta: </b> <?php echo $cliente[0]->fecha; ?></span>
    <span style="margin-right: 10px"><b> Cuota Inicial:</b> <?php echo $cliente[0]->cuotaInicial;  ?></span> <br>
    <div style="margin-top: 10px">
    <span style="margin-right: 10px"><b> Urbanizacion: </b> <?php echo $cliente[0]->nombreProyecto; ?></span>
      <span style="margin-right: 10px"><b> FASE: </b> <?php echo $cliente[0]->fase; ?></span>  
      <span style="margin-right: 10px"><b> MANZANO: </b> <?php echo $cliente[0]->manzano; ?></span>  
      <span style="margin-right: 10px"><b> LOTE: </b> <?php echo $cliente[0]->nroLote; ?></span>  
    </div> 
<div style="margin-top: 10px">
    <span style="margin-right: 10px"><b> Superficie: </b> <?php echo $cliente[0]->superficie; ?> MT2</span> 
    <span style="margin-right: 10px"><b> Precio de Venta: </b> <?php echo $cliente[0]->precio; ?> $US</span> 

    </div> 

</div>
<div style="width: 20%; display: inline-block;">
  <img src="{{asset('images/logo-oficial.png')}}" width="140px" height="125px">
</div>
</div>

<?php $total=0; ?>
  <table border="2" cellspacing="3" cellpadding="5" style="width: 100% ; border-radius: 15px; border-color:rgba(57, 151, 190, 1);" >
    <thead style=" border-radius: 25px;">
      <tr style="background: rgba(57, 151, 190, 1); text-align: center;">
        <th>Nro.</th>

        <th>Fecha de Pago</th>
        <th>Cuota</th>
        <th>Estado</th>
        
      </tr>
    </thead> 

    <tbody>   

 
        <?php 
                for ($i=0; $i <count($cuotas) ; $i++) { 
                  echo  '   <tr align="center">
                  <td>'.$cuotas[$i]->num.'</td>
                  <td>'.$cuotas[$i]->fechaLimite.'</td>
                  <td>'.$cuotas[$i]->monto.'</td>';
                   echo '<td>DEBE</td></tr>';
                  // if ($cuotas[$i]->estado==='d') {
                  //   echo '<td>DEBE</td></tr>';
                  // }else{
                  //    echo '<td>PAGADO</td></tr>';
                  // }
                }
           ?>
   
    
   


    </tbody>

  <tfoot border="2" style="text-align: center; background: #4EB7EC">
    <td style="font-weight: bold">Total</td>
    <td></td>
    <td> <?php echo $totalCuotas[0]->totalCuotas; ?> </td>
    <td></td>
  </tfoot>

  </table>

  
</body>
</html>
