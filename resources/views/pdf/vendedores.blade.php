<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <title>RECIBO RESERVA</title>
</head>

<body>
<table border="1">
<tr>
    <th>nombre y apellido</th>
    <th>ci</th>
    <th>codigo</th>
</tr>
    
      <?php 
        for ($i=0; $i <count($vendedor) ; $i++) { 

          echo "<tr><td>".$vendedor[$i]->nombre." ".$vendedor[$i]->apellido.'<td>'.$vendedor[$i]->ci.'<td>'.$vendedor[$i]->codigo;
        }
       ?>
    
  </table>


</body>
</html>
