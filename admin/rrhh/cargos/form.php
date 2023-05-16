<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">Registrar Cargo</h6>
    </div>
    <div class="card-body">

    <form action="guardar.php"  method="POST" id="form_cargos">

        <div class="form-group">
            <label>Cargo</label>
            <input type="text" class="form-control" name="cargo" placeholder="Ingrese el cargo" id="input_cargo" required />
        </div>

        
        <input type="hidden" name="opcion" value="guardar" id="input_opcion" />
        <input type="hidden" name="cargos_id" id="input_cargos_id" />

        <button type="reset" class="btn btn-secondary" id="btn_cancelar">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>

    </form>
        
    </div>
</div>