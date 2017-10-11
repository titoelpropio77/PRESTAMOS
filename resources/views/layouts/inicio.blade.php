<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="icon" href="/images/login-logo.png" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="pragma" content="no-cache" />
        <title>OsB SMB</title>
        <!-- For iPhone -->
        <meta name="msapplication-TileColor" content="#00bcd4">
        <style>
            div.container { max-width: 1200px }

            .picker__date-display {
                background-color:#00b0ff !important;
            }
            .picker__weekday-display {
                background-color: #0091ea !important;
            }
            .picker__day--selected, .picker__day--selected:hover, .picker--focused .picker__day--selected {
                background-color:#00b0ff !important;
            }
            .picker__close, .picker__today{
                color: #00b0ff !important;
            }
            .picker__day.picker__day--today{
                color:#0091ea !important;
            }
        </style>
        <!-- CORE CSS-->    
        {!!Html::style('css/jquery.dataTables.min.css')!!}
        {!!Html::style('css/responsive.dataTables.min.css')!!}
        {!!Html::style('js/plugins/animate-css/animate.css')!!}
        {!!Html::style('css/materialize.css')!!} 

        {!!Html::style('css/style.css')!!} 
        <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
        {!!Html::style('js/plugins/perfect-scrollbar/perfect-scrollbar.css')!!}
        {!!Html::style('js/plugins/jvectormap/jquery-jvectormap.css')!!}
        {!!Html::style('js/plugins/chartist-js/chartist.min.css')!!}
        {!!Html::style('js/plugins/sweetalert/dist/sweetalert.css')!!}
        {!!Html::style('js/plugins/ionRangeSlider/css/ion.rangeSlider.css')!!}
        {!!Html::style('js/plugins/ionRangeSlider/css/ion.rangeSlider.skinFlat.css')!!}
    </head>
    <body>
        <input type="hidden" value="{!! Session::get('idPerfil') !!}" id="iddelperfil">
        <input type="hidden" value="{!! Session::get('idpuntoventa') !!}" id="iddelpuntoventa">
        <input type="hidden" value="{!! Session::get('idempleado') !!}" id="iddelempleado">
        <input type="hidden" value="{!! Session::get('idsucursal') !!}" id="idsucursal">
        <input type="hidden" value="" id="perfilpuedeGuardar">
        <input type="hidden" value="" id="perfilpuedeEliminar">
        <input type="hidden" value="" id="perfilpuedeModificar">
        <input type="hidden" value="" id="perfilpuedeListars">
        <input type="hidden" value="" id="perfilpuedeVerReporte">
        <input type="hidden" value="" id="perfilpuedeImprimir">
        <!-- Start Page Loading -->
        <div id="loader-wrapper">
            <div id="loader"></div>        
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START HEADER -->
        <header id="header" class="page-topbar">
            <!-- start header nav-->
            <div class="navbar-fixed">
                <nav class="naranja">
                    <div class="nav-wrapper">
                        <h1 class="logo-wrapper">
                            <a   class="brand-logo darken-1" href="/index">
                                 {!! HTML::image('images/materialize-logo.png', 'a picture')!!}  
                            </a>
                        </h1>
                        <ul class="right hide-on-med-and-down">
                            <li>
                                <span class="logo-text white-text bold" style="font-weight: bold !important; font-size: 25px;">
                                    EMPRESA: LA PROVISION
                                </span>
                            </li>     
                            <li>
                                <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                            </li>
                            <li>
                                <a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-social-notifications"></i></a>
                            </li>
                            <li>
                                <a href="#" id="cache" class="waves-effect waves-light"><i class="mdi-action-cached"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- end header nav-->
        </header>
        <!-- END HEADER --> 
        <!-- START MAIN -->
        <div id="main">
            <!-- START WRAPPER -->
            <div class="wrapper">
                <!-- START LEFT SIDEBAR NAV-->
                <aside id="left-sidebar-nav">
                    <ul id="slide-out" class="side-nav fixed leftside-navigation">
                        <li class="user-details cyan darken-2">
                            <div class="row">
                                <div class="col col s4 m4 l4">
                                    <img src="{{asset('images/user.png')}}" class="circle responsive-img valign profile-image">
                                </div>
                                <div class="col col s8 m8 l8">
                                    <ul id="profile-dropdown" class="dropdown-content">
                                        <li>
                                            <a href="/cambiarpasswordusuario/{!! Session::get('idempleado') !!}">
                                                <i class="mdi-action-face-unlock"></i>Perfil
                                            </a>
                                        </li>
                                                                                <li>
                                                                                    <a href="/cambiarContraseniaDeUsuario/{!! Session::get('idempleado') !!}"><i class="mdi-action-lock prefix"></i>Pass</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#"><i class="mdi-communication-live-help"></i> Ayuda</a>
                                                                                </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="/logout/">
                                                <i class="mdi-hardware-keyboard-tab"></i> Salir
                                            </a>
                                        </li>
                                    </ul>
                                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">
                                        STHEPANIE
                                        <i class="mdi-navigation-arrow-drop-down right"></i></a>
                                    <p class="user-roal">ADMINISTRADOR</p>               
                                </div>
                                <!--<h5  class="sucursal" id="sucursalnombre" >{!! Session::get('sucursal') !!}</h5>-->
                            </div>
                        </li>
                        <li class="no-padding">
                            <ul class="collapsible collapsible-accordion">         
                                   <!--      <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-device-now-widgets"></i>Ingrediente por Menu</a>
                                              <div class="collapsible-body">
                                                  <ul>
              
                                                        <div id="Ingredientes"  >
                                               CORE         <li class="li-hover"><div class="divider"></div></li>
                                                      <li><a href="/Ingredientes">Ingrediente</a></li>
                                                       </div>  
                                                          <li class="li-hover"><div class="divider"></div></li>
                                                         CSS 
                                                  </ul>
                                              </div>
                                          </li>-->
                                <li class="bold">
                                    <a class="collapsible-header  waves-effect waves-cyan">
                                        <i class="material-icons">business</i>Prestamos
                                    </a>
                                    <div class="collapsible-body">
                                        <ul>                
                                            <div id="Gestionarempresa"  >
                                                <li><a href="Gestionarprestamo">Gestionar Prestamos</a></li>
                                            </div>
                                            <div id="GestionarPais"  >
                                                <li><a href="/GestionarPais">Gestionar Conbranza</a></li>
                                            </div>
                                            <div id="GestionarSucursal"  >
                                                <li><a href="/GestionarSucursal">Gestionar LLamadas</a></li>
                                            </div>
                                           
                                        </ul>
                                    </div>
                                </li>
                                <li class="bold">
                                    <a class="collapsible-header  waves-effect waves-cyan">
                                        <i class="material-icons">store</i>Ingresos y Egresos</a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <div id="GestionarProveedor"  >
                                                <li><a href="/GestionarProveedor">INGRESOS</a></li>
                                            </div> 
                                              <div id="GestionarProveedor"  >
                                                <li><a href="/GestionarProveedor">EGRESOS</a></li>
                                            </div> 
                                           
                                        </ul>
                                    </div>
                                </li>
                       
                               
                                 <li class="bold">
                                    <a class="collapsible-header  waves-effect waves-cyan">
                                        <i class="mdi-action-settings"></i>Reportes
                                    </a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <div id="configuracionGeneral">
                                                <li><a href="/configuracionGeneral">General</a></li>
                                            </div>
                                            <div id="configuracionDashboard">
                                                <li><a href="/configuracion">Dashboard</a></li>
                                            </div>
                                            <div id="configuracionventa">
                                                <li><a href="/ConfiguracionVenta">Modulo Venta</a></li>
                                            </div> 
                                            <div id="configuracionInventario">
                                                <li><a href="/ConfiguracionInventario">Modulo Inventario</a></li>
                                            </div>
                                        </ul>
                                    </div>
                                </li>
                                <li class="bold">
                                    <a class="collapsible-header  waves-effect waves-cyan">
                                        <i class="mdi-action-settings"></i>Configuracion
                                    </a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <div id="configuracionGeneral">
                                                <li><a href="/configuracionGeneral">General</a></li>
                                            </div>
                                            <div id="configuracionDashboard">
                                                <li><a href="/configuracion">Dashboard</a></li>
                                            </div>
                                            <div id="configuracionventa">
                                                <li><a href="/ConfiguracionVenta">Modulo Venta</a></li>
                                            </div> 
                                            <div id="configuracionInventario">
                                                <li><a href="/ConfiguracionInventario">Modulo Inventario</a></li>
                                            </div>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <div class="divider"></div>
                        <li class="bold">
                            <a class=" ">
                                <div id="reloj" style="font-size:45px;"></div>
                            </a>
                        </li>
                    </ul>
                    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only naranja"><i class="mdi-navigation-menu" ></i></a>
                </aside>

                <!-- END LEFT SIDEBAR NAV-->

                <!-- ////////////////////////////// ///////////////////////////////////////////aqui/// --> 
                <!--                <aside id="right-sidebar-nav">
                                    <ul id="chat-out" class="side-nav rightside-navigation">
                                        <li class="li-hover">          
                                            <ul class="chat-collapsible" data-collapsible="expandable">
                                                <a href="#" data-activates="chat-out" class="chat-close-collapse right"><i class="mdi-navigation-close"></i></a>
                                                <li>
                                                    <div class="collapsible-header teal white-text active"><i class="mdi-social-notifications"></i></i>Notificaciones</div>
                                                    <div class="collapsible-body recent-activity">                    
                                                        <div class="recent-activity-list chat-out-list row"> 
                                                            <div class="col s12 recent-activity-list-text" id="contenidonotificacion">
                                                                <a href="/gestionarinventario">Inventario</a>
                                                                <p>Producto  "xxx " en stock restante "xx"</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </aside>-->
                @yield('breadcumbs')
                <!-- START CONTENT -->
                <section id="content">
                    <!--start container-->
                    <div class="container">        
                        @yield('Contenido')
                    </div>
                </section>
            </div>
        </div>
        <!-- START FOOTER -->
        <footer class="page-footer ">
            <div class="footer-copyright blue-grey lighten-2 ">
                <div class="container "> 
                    <span>Copyright © 2017 <a class="grey-text text-lighten-4" href="http://osbolivia.com" target="_blank">LA PROVISION</a></span>
                    <span class="right"> Desarrollado por <a class="grey-text text-lighten-4" href="http://osbolivia.com/" target="_blank">LaProvision</a></span>
                </div>
            </div>
        </footer>
        <!-- END FOOTER -->
        <!-- ================================================
        Scripts
        ================================================  -->    
        <!-- jQuery Library -->

        {!!Html::script('js/plugins/jquery-2.1.4.min.js')!!}
        {!!Html::script('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')!!} 
        {!!Html::script('js/temp/materialize.js')!!} 
        {!!Html::script('js/plugins.js')!!}
        {!!Html::style('css/jquery-ui.css')!!}
        {!!Html::script('js/plugins/jquery-ui.js')!!}
        {!!Html::script('js/plugins/data-tables/js/jquery.dataTables.min.js')!!}
        {!!Html::script('js/plugins/dataTables.responsive.min.js')!!}
        
        {!!Html::script('js/plugins/sweetalert/dist/sweetalert.min.js')!!}
        {!!Html::script('js/plugins/ionRangeSlider/js/ion.rangeSlider.js')!!}}
        @section('scripts')
        @show
          @yield('script')
        <script type="text/javascript">
//             function startTime() {
//                 today = new Date();
//                 h = today.getHours();
//                 m = today.getMinutes();
//                 s = today.getSeconds();
//                 m = checkTime(m);
//                 s = checkTime(s);
//                 var horacompleta = h + ":" + m + ":" + s;
//                 if (horacompleta == "0:21:00") {
// //                    alert('Tu turno acaba de terminar : ' + horacompleta);
//                 }
//                 document.getElementById('reloj').innerHTML = horacompleta;
//                 t = setTimeout('startTime()', 500);
//                 return horacompleta;
//             }
//             function checkTime(i) {
//                 if (i < 10) {
//                     i = "0" + i;
//                 }
//                 return i;
//             }

//             $(window).load(function () {
//                 startTime();
//             });
    
     </script>
    </body>
</html>
