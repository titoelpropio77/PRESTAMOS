@extends('layouts.inicio')
 @section('breadcumbs')
 
<div id="breadcrumbs-wrapper">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Agregar Empleado</h5>
                <ol class="breadcrumbs">
                    <li><a href="/index">Dashboard</a></li>
                    <li><a href="/Empleados">Gestionar DE COBRANZA</a></li>
                    <!-- <li class="active">Formulatio Empleado</li> -->
                </ol>
            </div>
        </div>
    </div>
</div>
  @endsection

 @section('Contenido')


<a class="waves-effect waves-light btn modal-trigger" href="#modal1">AGREGAR</a>

    <table id="">
      <thead>
        <tr>
          <th>NOMBRE Y APELLIDO</th>
          <th>CEDULA DE IDENTIDAD</th>
          <th>ESTADO CIVIL</th>
          <th>TELEFONO</th>
          <th>TELEFONO</th>
        </tr>
      </thead>
     <!--  <tfoot  style=" display: table-header-group; background: white;">
 <th>NOMBRE Y APELLIDO</th>
          <th>CEDULA DE IDENTIDAD</th>
          <th>ESTADO CIVIL</th>
          <th>TELEFONO</th>
          <th>TELEFONO</th>
</tfoot> -->

      <tbody id="tbodyCuotas">
        
      </tbody>

    </table>

      @endsection

      @section('script')
        {!!Html::script('js/pais.js')!!}

     <script type="text/javascript">
    //        $('#tableCliente').dataTable({
    //       "ajax": {
    // "method":"GET",
    // "url": "listarCliente"
    //               },
    //       "columns":[
    //         {"data":"nombre"}
    //       ]
    //        }); 
     
     </script>
       @endsection

