  <div id="modalDetalle" class="modal">
    <div class="modal-content">
  <div class="col s12 ">

    <div class="row">
<div class="col s12 m3 l2">
        <label>Importe:</label>
             <input placeholder="Importe" type="text" name="nombre" id="importe">
    </div>
    <div class="col s12 m3 l2">
        <label>Tipo Pago:</label>
             <select id="tipoPago">
               <option>EFECTIVO</option>
               <option>BANCO</option>
             </select>
    </div>
      <div class="col s12 m2 l2">
        <label>Tota Debe:</label>
             <input placeholder="Importe" type="text" name="nombre" id="nombre">
           
    </div>
        <table>
          <thead>
            <th>NRO</th>
            <th>IMPORTE</th>
            <th>FECHA LIMITE</th>
            <th>ESTADO</th>
            <th>OPERACION</th>


          </thead>
          <tbody id="tbodyDetalle">
            
          </tbody>
        </table>
    </div>
  </div>
     
    </div>
    <div class="modal-footer">
      <button class="btn btn-primary" onclick="addCliente()">Guardar</button>
      <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">VOLVER</a>
    </div>
  </div>