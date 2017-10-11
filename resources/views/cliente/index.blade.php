@extends('layouts.inicio')
  @section('Contenido')
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
  <div class="container">
  <div class="col s12 ">
    <div class="row">
      <div class="input-field col s6">
                          <input id="last_name" type="text" class="validate">
                          <label for="last_name" class="">Nombre</label>
                        </div>

                             <div class="input-field col s6">
                          <input id="last_name" type="text" class="validate">
                          <label for="last_name" class="">Apellidos</label>
                        </div>     <div class="input-field col s6">
                          <input id="last_name" type="text" class="validate">
                          <label for="last_name" class="">CEDULA DE IDENTIDAD</label>
                        </div>     <div class="input-field col s6">
                          <input id="last_name" type="text" class="validate">
                          <label for="last_name" class="">EXPEDIDO</label>
                        </div>     <div class="input-field col s6">
                          <input id="last_name" type="text" class="validate">
                          <label for="last_name" class="">PAIS</label>
                        </div>
    </div>
  </div>
    
  </div>
  @endsection

