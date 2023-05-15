<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">Registrar </h6>
    </div>
    <div class="card-body">

    <form action="guardar.php"  method="POST" id="form_usuarios">

        <div class="form-group">
            <label>Empresa</label>
            <select class="form-control select2bs4" name="empresas_id" id="seleccionar_empresa" required>
                <option value="">Seleccione</option>
                <?php foreach($listarEmpresas as $empresa){ ?>
                    <option value="<?php echo $empresa['id']; ?>"><?php echo strtoupper($empresa['rif']); ?> - <?php echo strtoupper($empresa['nombre']); ?></option>
                <?php } ?>
            </select>  
        </div>

        <div class="form-group">
            <label>Placa Batea</label>
            <input type="text" class="form-control" name="placa" placeholder="Ingrese la Placa Batea" id="input_placa" required />
        </div>

        <div class="form-group">
            <label>Placa Chuto</label>
            <input type="text" class="form-control" name="chuto" placeholder="Ingrese la Placa Chuto" id="input_chuto" />
        </div>

        <div class="form-group">
            <label>Tipo</label>
            <select class="form-control" name="tipo" id="input_tipo" required>
                <option value="">Seleccione</option>
                <?php foreach($listarTipos as $tipo){ ?>
                    <option value="<?php echo $tipo['id']; ?>"> <?php echo $tipo['nombre']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Marca</label>
            <input type="text" class="form-control" name="marca" placeholder="Ingrese la Marca del Vehículo" id="input_marca" required />
        </div>

        <div class="form-group">
            <label>Color</label>
            <input type="text" class="form-control" name="color" placeholder="Ingrese el Color de Vehículo" id="input_color" required />
        </div>

        <div class="form-group">
            <label>Capacidad</label>
            <input type="text" class="form-control" name="capacidad" placeholder="Ingrese el Capacidad del Vehículo" id="input_capacidad" required />
        </div>



        <input type="hidden" name="opcion" value="guardar" id="input_opcion" />
        <input type="hidden" name="vehiculos_id" id="input_vehiculos_id" />

        <button type="reset" class="btn btn-secondary" id="btn_cancelar">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>

    </form>
        
    </div>
</div>