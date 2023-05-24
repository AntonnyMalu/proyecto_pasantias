<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">Crear Ruta</h6>
    </div>
    <div class="card-body">

    <form action="guardar.php"  method="POST">

    <div class="form-group">
        <label>Origen</label>
        <div id="div_origen">
            <select class="form-control select2bs4" id="seleccionar_origen" required>
                <option value="">Seleccione</option>
                <?php foreach($listarTerritorios as $territorio){ ?>
                    <option value="<?php echo $territorio['id']; ?>"><?php echo strtoupper($territorio['parroquia']); ?></option>
                <?php } ?>
            </select>
        </div>
        <input type="text" class="form-control d-none" id="label_origen" readonly>
        <input type="hidden" name="origen" id="input_origen">
    </div>
    
    <div class="form-group">
        <label class="col-12">
            Ruta
            <button type="button" class="btn btn-success btn-circle btn-sm float-right" id="btn_add">
                <i class="fa fa-plus"></i>
            </button>
            <input type="hidden" value="1" name="contador" id="contador" data-contador="1" placeholder="contador">
        </label>
        <div id="items">
            <div class="row" id="item_1">
                <div class="col-10">
                    <input type="text" class="form-control" name="ruta_1" placeholder="Lugar" id="ruta_1" required />
                </div>
                <div class="col-2 p-1">
                    &nbsp;
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Destino</label>
        <div id="div_destino">
            <select class="form-control select2bs4" id="seleccionar_destino" required>
            <option value="">Seleccione</option>
            <?php foreach($listarTerritorios as $territorio){ ?>
                <option value="<?php echo $territorio['id']; ?>"><?php echo strtoupper($territorio['parroquia']); ?></option>
                <?php } ?>
            </select>
        </div>
        <input type="text" class="form-control d-none" id="label_destino" readonly>
        <input type="hidden" name="destino" id="input_destino">
    </div>

    <input type="hidden" name="opcion" value="guardar" id="input_opcion" />
    <input type="hidden" name="id" id="input_rutas_id" />

    <button type="reset" class="btn btn-secondary" id="btn_cancelar">Cancelar</button>
    <button type="submit" class="btn btn-primary float-right">Guardar</button>

    </form>
        
    </div>
</div>