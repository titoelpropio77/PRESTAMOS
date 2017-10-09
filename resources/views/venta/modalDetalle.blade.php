 
<?php  $nacionalidad=DB::select('SELECT * FROM `pais` ORDER by paisnombre'); ?>
 <div class="modal fade" id="ModalDetalleVenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 id="titulos" class="modal-title" style="text-align: center; font-weight: bold" >DETALLE VENTA</h2>
      </div>

      <div class="modal-body">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border: solid #153242; border-radius: 20px">
      <h3 style="text-align: center" for="">DATOS DEL CLIENTE</h3>
       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <label for="nombre">CEDULA DE IDENTIDAD:</label>
        <input type="number" value="" class="form-control" name="ci">
      </div>
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <label for="nombre">EXPEDIDO:</label>
                <select name="expedido" class="form-control">
                    <option value="SC">[SC] SANTA CRUZ</option>
                    <option value="LP">[LP] LA PAZ</option>
                    <option value="CB">[CB] COCHABAMBA</option>
                    <option value="BN">[BN] BENI</option>
                    <option value="CH">[CH] CHUQUISACA</option>
                    <option value="PA">[PA] PANDO</option>
                    <option value="TJ">[TJ] TARIJA</option>
                    <option value="PT">[PT] POTOSI</option>

                    <option value="OR">[OR] ORURO</option>
                      <option value="EX">[EX] EXTRANJERO</option>
                </select>
      </div>
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="nombre">NACIONALIDAD:</label>
        <select name="idPais" class="form-control"  id="nacionalidad">
                    <?php foreach ($nacionalidad as $key => $value) {
                        echo "<option value=".$value->id.">".$value->paisnombre;
                    } ?>
                </select>
      </div>
     
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="nombre">NOMBRE:</label>
        <input type="text" value="" class="form-control" name="nombre">
      </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="nombre">APELLIDOS:</label>
        <input type="text" value="" class="form-control" name="apellidos">
      </div>
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="nombre">FECHA DE NACIMIENTO:</label>
        <input type="date" value="" class="form-control" name="fechaNac">
      </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="nombre">CIUDAD DE PROCEDENCIA:</label>
        <input type="text" value="" class="form-control" name="lugarProcedencia">
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="nombre">GENERO:</label><br>
        <label> <input type="radio" name="genero" id="m" value="m" checked=""> Masculino </label>
                 <label> <input type="radio" name="genero" id="f" value="f"> Femenino </label>
      </div>
         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
        <label for="nombre">CELULAR:</label>
        <input type="number" value="" class="form-control" name="celular">
      </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="nombre">OCUPACION:</label>
        <input type="text" value="" class="form-control" name="ocupacion">
      </div>
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
        <label for="nombre">DIRECCION DEL DOMICILIO:</label>
        <input type="text" value="" class="form-control" name="direccion">
      </div>

       </div>
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border: solid black; border-radius: 20px">
      <h3 style="text-align: center" for="">DATOS DEL LOTE</h3>
           <!-- <div class="col-sm-2 ">
          <div class="form-group">
          <label for="proyecto">PROYECTO:</label><br>
          <input type="text" name="proyecto" class="form-control">
            </div>        
       </div>
        <div class="col-sm-2 ">
          <div class="form-group">
          <label for="fase">Fase</label>
           <input   class="form-control" type="number"  class="form-control" name="fase" placeholder="USD$" id="fase"  disabled="">  
          
          </div>        
          </div>
            <div class="col-sm-2 ">
          <div class="form-group">
          <label for="nro_manzano">Nro. U-V</label>
          <input type="text"  class="form-control" name="uv"   disabled="">  
          </div>        
          </div>
              <div class="col-sm-2 ">
          <div class="form-group">
          <label for="nro_manzano">Nro. Manzano</label>
          <input  type="text"  class="form-control" name="manzano"   disabled="">  
          </div>        
          </div>
          <div class="col-sm-2 ">
          <div class="form-group">
          <label for="nro_lote">Nro. Lote</label>
          <input   type="text"  class="form-control" name="nroLote" disabled="">  
          </div>        
          </div>
      
         
            <div class="col-sm-2 ">
          <div class="form-group">
          <label for="superfice">Supercie(mt2)</label>
          <input  type="text"  class="form-control" name="superficie"    id="superficie" disabled="" >  
          </div>        
          </div>
          
            <div class="col-sm-2 ">
          <div class="form-group">
          <label for="categoria">Categoria</label>
           <input  class="form-control"   class="form-control" name="categoria" placeholder="USD$" disabled="" >
               </div>        
          </div>   -->
          <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <th>PROYECTO</th>
              <th>FASE</th>
              <th>UV</th>
              <th>MANZANO</th>
              <th>LOTE</th>
              <th>SUPERFICIE</th>
              <th>CATEGORIA</th>

            </thead>
            <tbody id="tablaLote"></tbody>
          </table>
           <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <th>PRECIO DE VENTA</th>
              <th>FECHA</th>
           
              <th>ESTADO</th>
            

            </thead>
            <tbody id="tablaVenta"></tbody>
          </table>
       </div>
      </div>
      <div class="modal-footer">
           
      </div>
    </div>
  </div>
</div>
 