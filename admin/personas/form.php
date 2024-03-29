<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">Registrar Personas</h6>
    </div>
    <div class="card-body">

    <form action="guardar.php"  method="POST" id="form_usuarios">

        <div class="form-group">
            <label>Cédula</label>
            <input type="text" class="form-control" name="cedula" placeholder="Ingrese la Cédula" id="input_cedula" required />
        </div>

        <div class="form-group">
            <label>Nombre y Apellido</label>
            <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre y Apellido" id="input_nombre" required />
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
        <input type="hidden" name="id" id="input_form_id" />

        <button type="reset" class="btn btn-secondary" id="btn_cancelar">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>

    </form>
        
    </div>
</div>