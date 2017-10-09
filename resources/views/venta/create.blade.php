@extends('layouts.inicio')
@section('contenido')
@include('alerts.cargando')

@include('alerts.success')
@include('alerts.request')
@include('alerts.errors')

{!!Form::open(['route'=>'Venta.store', 'method'=>'POST'])!!}

 <div>

<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">DATOS DEL CLIENTE</h3>
  </div>
  <div class="panel-body">
    
      <div class="row">

       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>
        
           <div class="col-sm-4 ">
          <div class="form-group">
          <label for="ci">NRO. CARNET *</label>
          <input  onchange="BuscarCliente()" type="text"  class="form-control" name="ci" id="ci" placeholder="NUMERO DE CARNET">  
          </div>        
          </div>

          <div class="col-sm-4 ">
            <div class="form-group">
            <label for="genero">Genero *</label>
            <div class="radio">
            <label>
            <input type="radio" name="genero" value="0"   id="M"checked>
            Masculino
            </label>
            &nbsp &nbsp &nbsp
            <label>
            <input type="radio" name="genero" value="1" id="F" >
            Femenino
            </label>
            </div>
            </div>        
          </div>

        </section>
        </div>  

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>

        <div class="col-sm-4 ">
          <div class="form-group">
          <label for="nombre">Nombre *</label>
          <input  type="text"  class="form-control" name="nombre" id="nombre" placeholder="" >  
          </div>
        </div>


        <div class="col-sm-4 ">
          <div class="form-group">
          <label for="celular">Celular *</label>
          <input  type="text"  class="form-control" name="celular" id="celular" placeholder="Celular del Cliente">  
          </div>        
        </div>

        </section>
       </div>

       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>

         <div class="col-sm-4">
          <div class="form-group">
          <label for="apellidos">Apellidos *</label>
          <input type="text"  class="form-control" name="apellidos" id="apellidos">  
          </div>        
          </div>

          <div class="col-sm-4 ">
          <div class="form-group">
          <label for="celular_ref">Celular Ref:</label>
          <input  type='text'  class="form-control" name="celular_ref" id="celular_ref"  placeholder="Telefono de referencia " >  
          </div>        
          </div>

        </section>
       </div>

       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>

         <div class="col-sm-4 ">
          <div class="form-group">
          <label for="fechaNacimiento">Fecha Nac. *</label>
          <input  type="date"  class="form-control" name="fechaNacimiento" id="fechaNacimiento" placeholder="" >  
          </div>        
          </div>

          <div class="col-sm-4">
          <div class="form-group">
          <label for="estadoCilvil">Estado Civil *</label>
         <select name="estadoCilvil" class="form-control" id="estadoCilvil">
          <option value="0">SOLTERO (A)</option>
          <option value="1">CASADO (A)</option>
          <option value="2">VIUDO (A)</option>
          <option value="3">DIVORSIADO (A)</option>
         </select>
          </div>        
          </div>

        </section>
       </div>

       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>

         <div class="col-sm-4">
          <div class="form-group">
          <label for="nacionalidad">Nacionalidad *</label>
          <input  type="text"  class="form-control" name="nacionalidad" id="nacionalidad" placeholder="" >  
          </div>        
          </div>

          <div class="col-sm-4">
          <div class="form-group">
          <label for="domicilio">Domicilio *</label>
          <input   type="text"  class="form-control" name="domicilio" id="domicilio" placeholder="Direccion del Domicilio actual" >  
          </div>        
          </div>

      </section>
      </div>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>

          <div class="col-sm-4 ">
          <div class="form-group">
          <label for="lugarProcedencia"> Lugar de Procedencia*</label>
          <input  type="text"  class="form-control" name="lugarProcedencia" id="lugarProcedencia" placeholder="" >  
          </div>        
          </div>

          <div class="col-sm-4 ">
          <div class="form-group">
          <label for="nit">NIT</label>
          <input  type="text"  class="form-control" name="nit" id="nit" placeholder="Nit " >  
          </div>        
          </div>
           
        </section>
      </div>

    </div>


  </div>
</div>

     
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">DATOS DEL PREVIO</h3>
  </div>
  <div class="panel-body">

    <div class="row">

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>

          <input   type="hidden"  class="form-control" name="id_lote" >

          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="nro_lote">Nro. Lote:</label>
          <input value=""  type="text"  class="form-control" name="nro_lote" disabled="">  
          </div>        
          </div>

          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="nro_manzano">Nro. Manzano:</label>
          <input value="" type="text"  class="form-control" name="nro_manzano"   disabled="">  
          </div>        
          </div>

          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="superfice">Superficie:(m<sup>2</sup>)</label>
          <input value="" type="text"  class="form-control" name="superfice"    id="superficie" disabled="">  
          </div>        
          </div>

          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="precio">Precio $us. (m<sup>2</sup>):</label>
           <input onchange="" type="number"  class="form-control" name="precio" placeholder="USD$" id="precio">  
          </div>        
          </div>
           
        </section>
      </div>


      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>

          <input   type="hidden"  class="form-control" name="id_lote" >

          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="norte">Colinda al Norte con:</label>
          <input value=""  type="text"  class="form-control" name="norte" id="norte" disabled="">  
          </div>        
          </div>

          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="sur">Colinda al Sur con:</label>
          <input value="" type="text"  class="form-control" name="sur"  id="sur" disabled="">  
          </div>        
          </div>

          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="este">Colinda al Este con:</label>
          <input value="" type="text"  class="form-control" name="este"    id="este" disabled="">  
          </div>        
          </div>

          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="oeste">Colinda al Oeste con:</label>
           <input onchange="" type="text"  class="form-control" name="oeste"  id="oeste" disabled="">  
          </div>        
          </div>
           
        </section>
      </div>


      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>

          <input   type="hidden"  class="form-control" name="id_lote" >

          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="categoria">Categoria:</label>
          <input value=""  type="text"  class="form-control" name="categoria" id="categoria" disabled="">  
          </div>        
          </div>

          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="precio_contado">Precio al Contado</label>
          <input value="" type="text"  class="form-control" name="precio_contado"  id="precio_contado" disabled="">  
          </div>        
          </div>

          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="precio_plazo">Precio a Plazo</label>
          <input value="" type="text"  class="form-control" name="precio_plazo"    id="precio_plazo" disabled="">  
          </div>        
          </div>
           
        </section>
      </div>


    
    </div>

  </div>
</div>


<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">DATOS DE LA TRANSANCION COMERCIAL</h3>
  </div>
  <div class="panel-body">
    
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section>

          <input   type="hidden"  class="form-control" name="id_lote" >

          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="tipo_cambio">Tipo de Cambio:</label>
          <input value=""  type="text"  class="form-control" name="tipo_cambio" id="tipo_cambio" disabled="">  
          </div>        
          </div>

          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="pago_sus">Pago en $us.</label>
          <input value="" type="number"  class="form-control" name="pago_sus"  id="pago_sus" >  
          </div>        
          </div>

          <div class="col-sm-3 ">
          <div class="form-group">
          <label for="pago_bs">Pago en Bs.</label>
          <input value="" type="number"  class="form-control" name="pago_bs"    id="pago_bs" >  
          </div>        
          </div>
           
        </section>
      </div>

  </div>
</div>                                   

{!!Form::submit('VENDER',['class'=>'btn btn-primary','id'=>'btn_registrar'])!!}

<a  class="btn btn-danger " href="{!!URL::to('Venta')!!}">CANCELAR</a>
{!!Form::close()!!}

</div>

{!!Html::script('js/venta2.js')!!}

@endsection