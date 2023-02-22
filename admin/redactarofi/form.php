<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">Redactar Oficio</h6>
    </div>
    <div class="card-body">

    <form action="guardar.php"  method="POST">

    <div class="form-group">
            <label>Datos de la Institución</label>
            <select class="form-control select2bs4" name="instituciones_id" required>
                <option value="">Seleccione</option>
                <option value="-1">NUEVO</option>
                <?php foreach ($oficios as $oficio){ ?>
                    <option value="<?php echo $oficio['id']; ?>"><?php echo $oficio['rif']; ?> <?php echo strtoupper($oficio['nombre']); ?></option>
                    <?php
                }
                ?>
                </select>
            <div class="row mt-3">
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="cedula" placeholder="Rif" id="input_cedula" required>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre"  id="input_nombre" required>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="telefono" placeholder="Teléfono" id="input_telefono">
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="direccion" placeholder="Dirección" id="input_direccion">
                </div>
                
        </div>

        <div class="form-group">
            <label>Datos Personales</label>
            <select class="form-control select2bs4" name="sesion_id" required>
                <option value="">Seleccione</option>
                <option value="-1">NUEVO</option>
                <?php foreach ($personas as $persona){ ?>
                    <option value="<?php echo $persona['id']; ?>"><?php echo $persona['cedula']; ?> <?php echo strtoupper($persona['nombre']); ?></option>
                <?php  } ?>
            </select>
            <div class="row mt-3">
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="cedula" placeholder="Cédula" id="input_cedula" required>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre"  id="input_nombre" required>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="telefono" placeholder="Teléfono" id="input_telefono">
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="direccion" placeholder="Dirección" id="input_direccion">
                </div>
                
            </div>
        </div>

        <div class="form-group">
            <label>Fecha</label>
            <input type="date" class="form-control" name="fecha" id="input_fecha" required />

        </div>
        
        <div class="form-group">
            <label>requerimientos</label>
            <input type="text" class="form-control" name="requerimientos" id="input_requerimientos" required />

        </div>

        

        <input type="hidden" name="opcion" value="<?php if ($resol_id){ echo "editar"; }else{ echo "guardar"; } ?>" id="input_opcion" />
        <input type="hidden" name="redactarofi_id" value="<?php if ($resol_id){ echo $get_resol['id']; } ?>" id="input_redactar_id" />

        <a href="../resoluciones/" class="btn btn-secondary" id="btn_cancelar">Cancelar</a>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>

    </form>
        
    </div>
</div>