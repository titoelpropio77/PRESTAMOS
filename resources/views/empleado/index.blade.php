@extends('layouts.inicio')
 @section('breadcumbs')
 
<div id="breadcrumbs-wrapper">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">AGREGAR NUEVOS EMPLEADOS</h5>
                <ol class="breadcrumbs">
                    <li><a href="/index">Dashboard</a></li>
                    <li><a href="/Empleados">Gestionar Empleados</a></li>
                    <li class="active">FormulaRRio Empleado</li>
                </ol>
            </div>
        </div>
    </div>
</div>
  @endsection

 @section('Contenido')
@extends('empleado.modalEmpleado')

<a class="waves-effect waves-light btn modal-trigger" href="#modal1">AGREGAR</a>

    <table id="tableEmpleado">
      <thead>
        <tr>
          <th>NOMBRE</th>
          <th>APELLIDOS</th>
          <th>CARGO</th>
          <th>USUARIO</th>
          <th>PASSWORD</th>
        </tr>
      </thead>
      <tfoot  style=" display: table-header-group; background: white;">
          <th>NOMBRE</th>
          <th>APELLIDOS</th>
          <th>CARGO</th>
          <th>USUARIO</th>
          <th>PASSWORD</th>
</tfoot>

      <tbody id="tbodyEmpleado">
        
      </tbody>

    </table>

      @endsection

      @section('script')
        {!!Html::script('js/empleado.js')!!}
 

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

