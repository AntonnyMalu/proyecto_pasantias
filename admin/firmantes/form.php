<div class="card shadow mb-4">
    <div class="card-header border-info py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">Crear Firmantes</h6>
    </div>
    <div class="card-body">

        <form action="guardar.php" method="POST" id="form_usuarios">

            <div class="form-group">
                <i class="fas fa-id-card"></i>
                <label>Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre y Apellido" id="input_nombre" required />
            </div>


            <div class="form-group">
                <i class="fas fa-list-ol"></i>
                <label>Cargo</label>
                <select class="form-control" name="cargo" id="input_cargo" required>
                    <option value="">Seleccione</option>
                    <option value="Jefe de Almacen">Jefe de Almacen</option>
                    <option value="Jefe de Atencion al Ciudadano">Jefe de Atencion al Ciudadano</option>
                </select>
            </div>

            <input type="hidden" name="opcion" value="guardar" id="input_opcion" />
            <input type="hidden" name="id" id="input_firmantes_id" />

            <button type="reset" class="btn btn-secondary" id="btn_cancelar">Cancelar</button>
            <button type="submit" class="btn btn-primary float-right">Guardar</button>

        </form>

    </div>
</div>