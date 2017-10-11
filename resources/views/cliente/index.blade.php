@extends('layouts.inicio')
 @section('breadcumbs')
 
  <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">FORMUALRIO CLIENTE</h5>
                <ol class="breadcrumbs">
                  <li><a href="index.html">Dashboard</a>
                  </li>
                  <li><a href="#">cliente</a>
                  </li>
                  <li class="active">lista de cliente</li>
                </ol>
              </div>
</div>
  @endsection

 @section('Contenido')
@extends('cliente.modalCliente')

<a class="waves-effect waves-light btn modal-trigger" href="#modal1">AGREGAR</a>

    <table id="tableCliente">
      <thead>
        <tr>
          <th>NOMBRE Y APELLIDO</th>
          <th>CEDULA DE IDENTIDAD</th>
          <th>ESTADO CIVIL</th>
          <th>TELEFONO</th>
        </tr>
      </thead>

    </table>

      @endsection

      @section('script')
     <script type="text/javascript">
           $('#tableCliente').dataTable({
          "ajax": {
    "method":"GET",
    "url": "listarCliente"
                  },
          "columns":[
            {"data":"nombre"}
          ]
           }); 
     
     </script>
       @endsection

