<!-- Modal -->
<div class="modal fade" id="modal_form" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="#"  method="POST" id="form_nomina">

        <div class="form-group">
            <label>Cédula</label>
            <input type="text" class="form-control" name="cedula" placeholder="Ingrese la Cédula" id="input_cedula" required />
        </div>

        <div class="form-group">
            <label>Nombre Completo</label>
            <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre Completo" id="input_nombre" required />
        </div>

        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" class="form-control" name="telefono" placeholder="Ingrese el Teléfono" id="input_telefono" />
        </div>

        <div class="form-group">
            <label>Dirección</label>
            <input type="text" class="form-control" name="direccion" placeholder="Ingrese la Dirección" id="input_direccion" required />
        </div>

        <input type="hidden" name="opcion" value="guardar" id="input_opcion" />
        <input type="hidden" name="personas_id" id="input_personas_id" />

        <button type="reset" class="btn btn-secondary" data-dismiss="modal" id="btn_cancelar">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>

    </form>
      </div>
      <div class="modal-footer d-none">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
