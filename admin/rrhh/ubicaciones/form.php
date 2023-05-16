<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">Registrar Nuevo</h6>
    </div>
    <div class="card-body">

    <form action="guardar.php"  method="POST" id="form_cargos">

    <div class="form-group">
            <label>Tipo</label>
            <select class="form-control" name="tipo" id="seleccionar_tipo">
                <option value="">Seleccione</option>
                <option value="administrativa">Administrativa</option>
                <option value="geografica">Geográfica</option>
            </select>
        </div>

        <div class="form-group">
            <label> Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Ingrese el cargo" id="input_nombre" required />
        </div>
        
        <input type="hidden" name="opcion" value="guardar" id="input_opcion" />
        <input type="hidden" name="id" id="input_form_id" />

        <button type="reset" class="btn btn-secondary" id="btn_cancelar">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>

    </form>
        
    </div>
</div>