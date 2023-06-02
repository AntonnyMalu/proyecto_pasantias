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
      <form action="guardar.php"  method="POST" id="form_nomina">

        <div class="form-group">
            <label>Cédula:</label>
            <input type="text" class="form-control" name="cedula" placeholder="Cédula" id="input_cedula" required />
        </div>

        <div class="form-group">
            <label>Nombres:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombres" id="input_nombre" required />
        </div>

        <div class="form-group">
            <label>Apellidos:</label>
            <input type="text" class="form-control" name="apellido" placeholder="Apellidos" id="input_apellido" required />
        </div>

        <div class="form-group">
            <label>Ubicación Geográfica:</label>
            <select class="form-control select2bs4" name="geografica_id" id="select_geografica" required >
              <option value="">Seleccione</option>
              <?php
                foreach($listarGeografica as $geografica){ ?>
                  <option value="<?php echo $geografica['id'] ?>"><?php echo strtoupper($geografica['nombre']) ?></option>
              <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Ubicación Administrativa:</label>
            <select class="form-control select2bs4" name="administrativa_id" id="select_administrativa" required >
              <option value="">Seleccione</option>
              <?php
                foreach($listarAdministrativa as $administrativa){ ?>
                  <option value="<?php echo $administrativa['id'] ?>"><?php echo strtoupper($administrativa['nombre']) ?></option>
              <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Cargo:</label>
            <select class="form-control select2bs4" name="cargos_id" id="select_cargos" required >
              <option value="">Seleccione</option>
              <?php
                foreach($listarCargos as $cargo){ ?>
                  <option value="<?php echo $cargo['id'] ?>"><?php echo strtoupper($cargo['cargo']) ?></option>
              <?php } ?>
            </select>
        </div>
        
        <div class="form-group">
          <label>Estatus:</label>
          <select class="form-control" name="estatus" id="estatus">
            <option value="1">ACTIVO</option>
            <option value="0">INACTIVO</option>
          </select>
        </div>
        

        <input type="hidden" name="opcion" value="guardar" id="input_opcion" />
        <input type="hidden" name="id" id="input_form_id" />

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
