<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">Registrar Nueva</h6>
    </div>
    <div class="card-body">

    <form action="guardar.php"  method="POST" id="form_usuarios">

        <div class="form-group">
            <label>Rif</label>
            <input type="text" class="form-control" name="rif" placeholder="Ingrese el Rif" id="input_rif" required />
        </div>

        <div class="form-group">
            <label>Nombre de la Empresa</label>
            <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre de la Empresa" id="input_nombre" required />
        </div>

        <div class="form-group">
            <label>Responsable</label>
            <input type="text" class="form-control" name="responsable" placeholder="Ingrese el Nombre del Responsable" id="input_responsable" />
        </div>

        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" class="form-control" name="telefono" placeholder="Ingrese el Teléfono del Responsable" id="input_telefono" />
        </div>

        <input type="hidden" name="opcion" value="guardar" id="input_opcion" />
        <input type="hidden" name="empresas_id" id="input_empresas_id" />

        <button type="reset" class="btn btn-secondary" id="btn_cancelar">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>

    </form>
        
    </div>
</div>