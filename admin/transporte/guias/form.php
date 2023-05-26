<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">Nueva Guía</h6>
    </div>
    <div class="card-body">

        <form action="guardar.php" method="POST" id="form_guias">


            <div class="form-group">
                <label>Tipo Guía:</label>
                <select class="form-control select2bs4" name="guias_tipos_id" data-nuevo="nuevo" id="seleccionar_tipo_guia" required >
                    <option value="">Seleccione </option>
                    <?php foreach ($listarTiposGuias as $tipo) { ?>
                        <option value="<?php echo $tipo['id']; ?>"><?php echo strtoupper($tipo['nombre']); ?></option>
                    <?php } ?>
                </select>
                <input type="hidden" value="" placeholder="tipo_codigo_" id="tipo_codigo_">
                <?php foreach ($listarTiposGuias as $tipo) { ?>
                    <input type="hidden" value="<?php echo $tipo['codigo']; ?>" placeholder="tipo_codigo_<?php echo $tipo['id']; ?>" id="tipo_codigo_<?php echo $tipo['id']; ?>">
                <?php } ?>
            </div>

            <div class="form-group">
                <label>Codigo Guía:</label>
                <input type="text" class="form-control" name="codigo" data-codigo_nuevo="<?php echo $codigo_nuevo; ?>" id="input_codigo" readonly required />
            </div>

            <div class="form-group">
                <label>Vehículo:</label>
                <select class="form-control select2bs4" name="vehiculos_id" id="seleccionar_vehiculo" required >
                    <option value="">Seleccione</option>
                    <?php
                    foreach ($listarVehiculos as $vehiculo) {
                        $getTipo = $tiposVehiculos->find($vehiculo['tipo']);
                    ?>
                        <option value="<?php echo $vehiculo['id']; ?>"><?php echo strtoupper($vehiculo['placa_batea']); ?> - <?php echo strtoupper($getTipo['nombre']); ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Chofer:</label>
                <select class="form-control select2bs4" name="choferes_id" id="seleccionar_chofer" required >
                    <option value="">Seleccione</option>
                    <?php foreach ($listarChoferes as $choferes) { ?>
                        <option value="<?php echo $choferes['id']; ?>"><?php echo strtoupper($choferes['cedula']); ?> - <?php echo strtoupper($choferes['nombre']); ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Lugar de Origen:</label>
                <select class="form-control select2bs4" name="origen" id="seleccionar_origen" required >
                    <option value="">Seleccione</option>
                    <?php foreach ($listarTerritorios as $territorio) { ?>
                        <option value="<?php echo $territorio['id']; ?>"><?php echo strtoupper($territorio['parroquia']); ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Lugar de Destino:</label>
                <select class="form-control select2bs4" name="destino" id="seleccionar_destino" required >
                    <option value="">Seleccione</option>
                    <?php foreach ($listarTerritorios as $territorio) { ?>
                        <option value="<?php echo $territorio['id']; ?>"><?php echo strtoupper($territorio['parroquia']); ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Fecha Guía:</label>
                <input type="date" class="form-control" name="fecha" id="input_fecha" required  />
            </div>

            <hr>

            <div class="form-group">
                <label class="col-12">
                    <i class="fas fa-truck-loading"></i> Carga a trasladar:
                    <button type="button" class="btn btn-success btn-circle btn-sm float-right" id="btn_add">
                        <i class="fa fa-plus"></i>
                    </button>
                    <input type="hidden" value="1" name="contador" id="contador" data-contador="1" placeholder="contador">
                </label>
                <div id="items">
                    <div class="row" id="item_1">
                        <div class="col-3">
                            <input type="text" class="form-control" name="cantidad_1" placeholder="Cant." id="cantidad_1" required  />
                        </div>
                        <div class="col-7">
                            <input type="text" class="form-control" name="descripcion_1" placeholder="Descripción" id="descripcion_1" required  />
                        </div>
                        <div class="col-2 p-1">
                            &nbsp;
                        </div>

                    </div>
                </div>
            </div>

            <hr>

            <input type="hidden" name="opcion" value="guardar" placeholder="input_opcion" id="input_opcion"/>
            <input type="hidden" name="id" id="input_form_id" placeholder="input_form_id" />
            <input type="hidden" name="guias_num_init" value="<?php echo $num_init; ?>" placeholder="Num. Sig.">

            <button type="reset" class="btn btn-secondary" id="btn_cancelar">Cancelar</button>
            <button type="submit" class="btn btn-primary float-right">Guardar</button>

        </form>

    </div>
</div>