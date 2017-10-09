<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SISTEMA INMOBILIARIO</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
       <!-- <meta name="viewport" content="width=500, initial-scale=1"> -->
              <!-- Bootstrap 3.3.5 -->
  {!!Html::style('css/bootstrap/bootstrap.css')!!}
        <!-- Font Awesome -->
        {!!Html::style('css/font-awesome.min.css')!!}
        <!-- Theme style -->
        {!!Html::style('css/plugins/AdminLTE.min.css')!!}
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        {!!Html::style('css/plugins/moment.min.css')!!}

        {!!Html::style('css/plugins/_all-skins.min.css')!!}
        {!!Html::style('css/bootstrap/bootstrap-select.min.css')!!}
        {!!Html::style('css/bootstrap/datepicker3.css')!!}

        {!!Html::style('css/plugins/toastr.css')!!}
        {!!Html::style('css/bootstrap/daterangepicker.css')!!}
        {!!Html::style('css/personalizado.css')!!}
  <!-- DataTables -->
        {!!Html::style('datatables/dataTables.bootstrap.css')!!}
        {!!Html::style('css/plugins/jquery-jvectormap-2.0.3.css')!!}


        {!!Html::script('js/plugins/jquery.min.js')!!}
        {!!Html::style('css/cargando.css')!!}
        <link rel="shortcut icon" href="{{asset('images/sinfondo.png')}}">

        <link rel="apple-touch-icon" href="{{asset('images/sinfondo.png')}}">


    </head>

    <!-- <body class="hold-transition skin-blue sidebar-mini"> -->
    <body id="bodyPrincipal" class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper"> 

            <header class="main-header" >

                <!-- Logo -->
                <a href="{!!URL::to('index')!!}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->

                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">LA PROVISION</span>


                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation" style="text-transform: uppercase;">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Navegación</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav" style="text-transform: uppercase;">
                            <!-- Messages: style can be found in dropdown.less-->

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <small class=""><?php echo Session::get('nombre')." ".Session::get('apellido') ;?></small>
                                         <img src="{{asset('images/logout.png')}}" class="user-image" alt="User Image">
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                    <img src="{{asset('images/user.png')}}" class="img-circle" alt="User Image">
                                        <p>
                                           <?php echo Session::get('nombre')." ".Session::get('apellido') ;?>
                                            <small> <?php echo Session::get('cargo') ;?></small>
                                        </p>

                                    </li>

                                    <!-- Menu Footer-->
                                    <li class="user-footer">

                                        <div class="pull-right">

                                            <a href="{!!URL::to('logout')!!}" ><button class="btn btn-danger">CERRAR SESION</button></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>

                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" style="text-transform: uppercase;">

                    <?php
                        $verficar = DB::select('select  modulo.nombre count from perfil,perfilobjeto,objeto,modulo where perfil.id=perfilobjeto.idPerfil and perfilobjeto.idObjeto=objeto.id and modulo.id=objeto.idModulo and perfil.id=' . Session::get('idPerfil') . ' and modulo.nombre="Vendedor"');
                        if (count($verficar) != 0) {
                            ?>
                        <li class="header"></li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span>VENDEDOR</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">

                                <li><a href="{!!URL::to('PreReserva')!!}"><i class="fa fa-building-o" aria-hidden="true"></i></i>PRE-RESERVAR LOTE</a></li>
                                <li><a href="{!!URL::to('seccion1/1')!!}"><i class="fa fa-building-o" aria-hidden="true"></i></i>Mapa</a></li>

                                <!-- <li><a href="{!!URL::to('cliente')!!}"><i class="fa fa-user"></i> Mapa</a></li> -->
                                <li><a href="{!!URL::to('ControlPreReserva')!!}"><i class="fa fa-circle-o"></i>Pre-Reservas Activas</a></li>
                                <?php
                        $verficar = DB::select('select  modulo.nombre count from perfil,perfilobjeto,objeto,modulo where perfil.id=perfilobjeto.idPerfil and perfilobjeto.idObjeto=objeto.id and modulo.id=objeto.idModulo and perfil.id=' . Session::get('idPerfil') . ' and modulo.nombre="Vendedor" and objeto.urlObjeto="/Vendedor"');
                        if (count($verficar) != 0) {
                            ?>
                                    
                                     <li><a href="{!!URL::to('ListaEmpleado')!!}"><i class="fa fa-circle-o"></i> Gestionar Vendedor</a></li>
<?php } ?>
                                    

                            </ul>

                        </li>
<?php } ?>

 <?php
                        $verficar = DB::select('select  modulo.nombre count from perfil,perfilobjeto,objeto,modulo where perfil.id=perfilobjeto.idPerfil and perfilobjeto.idObjeto=objeto.id and modulo.id=objeto.idModulo and perfil.id=' . Session::get('idPerfil') . ' and modulo.nombre="Ventas y Reservas"');
                        if (count($verficar) != 0) {
                            ?>
                        <li class="treeview">
                            <a href="#"> 
                                <i class="fa fa-calculator" aria-hidden="true"></i>
                                <span>RESERVAS</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul id="listacategoria1" class="treeview-menu">
                            
                                <li><a href="{!!URL::to('Reserva')!!}"><i class="fa fa-tasks"></i>Reservar</a></li>
                                
                               
                                 <li><a href="{!!URL::to('ListaReserva')!!}"><i class="fa fa-circle-o"> </i>LISTA Reserva</a></li>
                                  <li><a href="{!!URL::to('ListaPreReserva')!!}"><i class="fa fa-circle-o"></i>LISTA Pre-Reserva</a></li>
                            </ul>
                        </li>
                           <li class="treeview">
                            <a href="#"> 
                                <i class="fa fa-calculator" aria-hidden="true"></i>
                                <span>VENTAS</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul id="listacategoria1" class="treeview-menu">
                            <li><a href="{!!URL::to('Venta')!!}"><i class="fa fa-handshake-o" aria-hidden="true""></i>Vender</a></li>
                                <li><a href="{!!URL::to('PagoVenta')!!}"><i class="fa fa-tasks"></i>GESTION DE COBRANZA</a></li>
                                  
                                <li><a href="{!!URL::to('ListaVenta')!!}"><i class="fa fa-tasks"></i>LISTA VENTAS</a></li>
                               
                            </ul>
                        </li>
               <li class="treeview">
                            <a href="#"> 
                                <i class="fa fa-calculator" aria-hidden="true"></i>
                                <span>RPROG. Y TRASPASO</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul id="listacategoria1" class="treeview-menu">
                            <li><a href="{!!URL::to('Venta')!!}"><i class="fa fa-circle-o"></i>REPROGRAMAR</a></li>
                                <li><a href="{!!URL::to('PagoVenta')!!}"><i class="fa fa-circle-o"></i>TRASPASO</a></li>
                                  
                             
                               
                            </ul>
                        </li>
<?php } ?>

                  <?php
                        $verficar = DB::select('select  modulo.nombre count from perfil,perfilobjeto,objeto,modulo where perfil.id=perfilobjeto.idPerfil and perfilobjeto.idObjeto=objeto.id and modulo.id=objeto.idModulo and perfil.id=' . Session::get('idPerfil') . ' and modulo.nombre="Lotes"');
                        if (count($verficar) != 0) {
                            ?>       
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-building" aria-hidden="true"></i>
                                <span> LOTES</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul  class="treeview-menu">
                                <li><a href="{!!URL::to('Lote')!!}"><i class="fa fa-tasks"></i>Gestionar Lotes</a></li>

                            </ul>
                        </li>
<?php } ?>

                         <?php
                        $verficar = DB::select('select  modulo.nombre count from perfil,perfilobjeto,objeto,modulo where perfil.id=perfilobjeto.idPerfil and perfilobjeto.idObjeto=objeto.id and modulo.id=objeto.idModulo and perfil.id=' . Session::get('idPerfil') . ' and modulo.nombre="Proyecto"');
                        if (count($verficar) != 0) {
                            ?>
                        <li class="treeview">
                         <a href="#">

                             <i class="fa fa-cogs" aria-hidden="true"></i>
                              <span> ADMINISTRAR PROYECTO</span>
                              <i class="fa fa-angle-left pull-right"></i>
                              </a>
                               <ul  class="treeview-menu">

                                <li><a href="{!!URL::to('Proyecto')!!}"><i class="fa fa-line-chart" aria-hidden="true"></i>PROYECTO</a></li>

                                <li><a href="{!!URL::to('Categoria')!!}"><i class="fa fa-list-ol" aria-hidden="true"></i> CATEGORIA</a></li>

                                <li><a href="{!!URL::to('Precio')!!}"><i class="fa fa-usd" aria-hidden="true"></i> PRECIO</a></li>
                                  <li><a href="{!!URL::to('Meses')!!}"><i class="fa fa-calendar" aria-hidden="true"></i>Meses</a></li>
                              
                                  <li><a href="{!!URL::to('CuotaMinima')!!}"><i  class="fa fa-percent" aria-hidden="true"></i>Cuota Minima</a></li>

                                  <li><a href="{!!URL::to('DescuentoVenta')!!}"><i  class="fa fa-percent" aria-hidden="true"></i>Descuento en Venta</a></li>
                               <li><a href="{!!URL::to('PorcentajeDevolucionReserva')!!}">% Devolucion RESERVA</a></li>

                               <li><a href="{!!URL::to('TipoCambio')!!}"><i class="fa fa-usd" aria-hidden="true"></i>Tipo de Cambio</a></li>
                             
                              </ul>
                               </li> 
<?php } ?>

                        <?php
                        $verficar = DB::select('select  modulo.nombre count from perfil,perfilobjeto,objeto,modulo where perfil.id=perfilobjeto.idPerfil and perfilobjeto.idObjeto=objeto.id and modulo.id=objeto.idModulo and perfil.id=' . Session::get('idPerfil') . ' and modulo.nombre="Empleado"');
                        if (count($verficar) != 0) {
                            ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-user"></i>
                                    <span>Empleado</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul  id="gestiones" class="treeview-menu">
                                    <li><a href="{!!URL::to('Empleado')!!}"><i class="fa fa-circle-o"></i> Gestionar Empleado</a></li>

                                    <li><a href="{!!URL::to('Cargo')!!}"><i class="fa fa-circle-o"></i> Gestionar Cargo</a></li>
                                    <li><a href="{!!URL::to('Turno')!!}"> <i class="fa fa-circle-o"></i>Gestionar Turno</a></li>



                                </ul>
                            </li>
<?php } ?>
                        <?php
                        $verficar = DB::select('select  modulo.nombre count from perfil,perfilobjeto,objeto,modulo where perfil.id=perfilobjeto.idPerfil and perfilobjeto.idObjeto=objeto.id and modulo.id=objeto.idModulo and perfil.id=' . Session::get('idPerfil') . ' and modulo.nombre="Seguridad"');
                        if (count($verficar) != 0) {
                            ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                    <span>Seguridad</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul  id="gestiones" class="treeview-menu">
                                    <li><a href="{!!URL::to('Perfil')!!}"><i class="fa fa-circle-o"></i>Gestionar Perfil</a></li>
                                    <li><a href="{!!URL::to('Objeto')!!}"><i class="fa fa-circle-o"></i> Gestionar Objeto</a></li>
                                    <li><a href="{!!URL::to('Modulo')!!}"><i class="fa fa-circle-o"></i>Gestionar  Modulo</a></li>



                                </ul>
                            </li>
<?php } ?>
 <?php
                        $verficar = DB::select('select  modulo.nombre count from perfil,perfilobjeto,objeto,modulo where perfil.id=perfilobjeto.idPerfil and perfilobjeto.idObjeto=objeto.id and modulo.id=objeto.idModulo and perfil.id=' . Session::get('idPerfil') . ' and modulo.nombre="Empresa"');
                        if (count($verficar) != 0) {
                            ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-building-o" aria-hidden="true"></i>
                                <span>Empresa</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul  id="gestiones" class="treeview-menu">
                                <li><a href="{!!URL::to('Empresa')!!}"><i class="fa fa-circle-o"></i>Gestionar Empresa</a></li>
                                <li><a href="{!!URL::to('Banco')!!}"><i class="fa fa-circle-o"></i>Gestionar Bancos</a></li>
                            </ul>
                        </li>
                            <li class="treeview">
                            <a href="#">
                                <i class="fa fa-building-o" aria-hidden="true"></i>
                                <span>REPORTE</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul  id="gestiones" class="treeview-menu">
                                <li><a href="{!!URL::to('ReporteVenta')!!}"><i class="fa fa-circle-o"></i>REPORTE VENTAS</a></li>
                                <li><a href="{!!URL::to('ReporteReserva')!!}"><i class="fa fa-circle-o"></i>REPORTE RESERVA</a></li>
                            </ul>
                        </li>
<?php } ?>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>





            <!--Contenido-->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                         @yield('contenido')
                    </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->


        <!--Fin-Contenido-->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1
            </div>
                             <!--   <i class="fa fa-sign-out" aria-hidden="true"></i> -->
            <strong>MODESTO SALDAÑA MICHALEC</strong>   TODOS LOS DERECHOS RESERVADOS
            
        </footer>


        <!-- jQuery 2.1.4 -->
        {!!Html::script('js/plugins/moment.min.js')!!}


        {!!Html::script('js/plugins/toastr.min.js')!!}

        <!-- Bootstrap 3.3.5 -->
        {!!Html::script('js/bootstrap/bootstrap.min.js')!!}
        {!!Html::script('js/bootstrap/bootstrap-select.min.js')!!}
        {!!Html::script('js/bootstrap/bootstrap-datepicker.js')!!}
        {!!Html::script('js/bootstrap/daterangepicker.js')!!}
        <!-- DataTables -->
          {!!Html::script('datatables/jquery.dataTables.min.js')!!}
          {!!Html::script('datatables/dataTables.bootstrap.min.js')!!}
<script type="text/javascript">
      $('#datepicker').datepicker({
      autoclose: true
    });
       $('#datepicker1').datepicker({
      autoclose: true
    });
        $('#reservation').daterangepicker();

          $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

        <!-- AdminLTE App -->
        <script src="{{asset('js/plugins/app.js')}}"></script>
        {!!Html::script('js/herramientas.js')!!}




    </body>
</html>
