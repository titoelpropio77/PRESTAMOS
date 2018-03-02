  <div id="modal1" class="modal">
    <div class="modal-content">
  <div class="col s12 ">

    <div class="row">

                <div class="input-field col s6">
                     <input  type="text" class="validate" id="nombreE">
          	    	<label for="last_name" class="">Nombre</label>
                </div>

                <div class="input-field col s6">
                          <input  type="text" class="validate" id="apellidosE">
                          <label for="last_name" class="" >Apellidos</label>
                </div>     
                       
                <div class="input-field col s6">
                <select id="cargo">
                	  <option value="a">ADMINISTRADOR</option>
                    <option value="b">CAJERO</option>
                   
                </select>
                  <label for="last_name" class="" >CARGO</label>
                </div>  

                <div class="input-field col s6">
                   <input  type="text" class="validate"  id="usuario">
                  
                  <label for="last_name" class="" >USUARIO</label>
                </div>
                  <div class="input-field col s6">
                   <input  type="password" class="validate"  id="pass">
                  <label for="last_name" class="" id="paisC">PASSWORD</label>
                </div>
                        
    </div>
  </div>
     
    </div>
    <div class="modal-footer">

      <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat"> CANCELAR</a>

      <button class="btn btn-primary" onclick="addEmpleado()">GUARDAR</button>
      
    </div>
  </div>