  <div id="modal1" class="modal">
    <div class="modal-content">
  <div class="col s12 ">

    <div class="row">

      <div class="input-field col s6">
           <input id="last_name" type="text" class="validate" id="nombreC">
	    	<label for="last_name" class="">Nombre</label>
     </div>

                <div class="input-field col s6">
                          <input id="last_name" type="text" class="validate" id="apellidosC">
                          <label for="last_name" class="" >Apellidos</label>
                        </div>     <div class="input-field col s6">
                          <input id="last_name" type="text" class="validate" id="ciC">
                          <label for="last_name" class="" >CEDULA DE IDENTIDAD</label>
                        </div>     <div class="input-field col s6">
                        <select id="expedidoC">
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
                          <label for="last_name" class="" >EXPEDIDO</label>
                        </div>   
                          <div class="input-field col s6">
                          <select name="pais">
                          	
                          </select>
                          <label for="last_name" class="" >PAIS</label>
                        </div>
                          <div class="input-field col s6">
                           <input id="last_name" type="text" class="validate"  id="fechaNac">
                          <label for="last_name" class="" id="paisC">FECHA DE NACIMIENTO</label>
                        </div>
                         <div class="input-field col s6">
                           <input id="last_name" type="text" class="validate" id="celularC">
                          <label for="last_name" class="" >Celular</label>
                        </div>
                           <div class="input-field col s6">
                           <input id="last_name" type="text" class="validate" id="celularRefC">
                          <label for="last_name" class="" >Celular REF</label>
                        </div>
                        <div class="input-field col s6">
                           <input id="last_name" type="text" class="validate" id="genero">
                          <label for="last_name" class="" >GENERO</label>
                        </div>
    </div>
  </div>
     
    </div>
    <div class="modal-footer">
      <button class="btn btn-primary" onclick="addCliente()">Guardar</button>
      <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>