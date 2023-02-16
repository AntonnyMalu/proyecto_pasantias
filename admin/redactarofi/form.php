<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">Redactar Oficio</h6>
    </div>
    <div class="card-body">

    <form action="guardar.php"  method="POST">

    <div class="form-group">
            <label>Datos de la Institución</label>
            <select class="form-control select2bs4" name="sesion_id" required>
                <option value="">Seleccione</option>
                <?php foreach ($sesiones as $sesion){ ?>
                    <option <?php if ($resol_id && $get_resol['sesiones_id'] == $sesion['id']){ echo 'selected="selected"'; } ?> value="<?php echo $sesion['id'] ?>"><?php echo "Sesion ".$sesion['tipo']." ".$sesion['codigo'] ?></option>
                <?php  } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Datos Personales</label>
            <select class="form-control select2bs4" name="sesion_id" required>
                <option value="">Seleccione</option>
                <?php foreach ($sesiones as $sesion){ ?>
                    <option <?php if ($resol_id && $get_resol['sesiones_id'] == $sesion['id']){ echo 'selected="selected"'; } ?> value="<?php echo $sesion['id'] ?>"><?php echo "Sesion ".$sesion['tipo']." ".$sesion['codigo'] ?></option>
                <?php  } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Fecha</label>
            <input type="date" class="form-control" name="fecha" id="input_fecha" required />

        </div>
        
        <div class="form-group">
            <label>requerimientos</label>
            <input type="text" class="form-control" name="requerimientos" id="input_requerimientos" required />

        </div>


        <div class="form-group">
            <label>Estatus</label>
            <input type="text" class="form-control" name="status" id="input_status" required /><br>

        

        <input type="hidden" name="opcion" value="<?php if ($resol_id){ echo "editar"; }else{ echo "guardar"; } ?>" id="input_opcion" />
        <input type="hidden" name="resoluciones_id" value="<?php if ($resol_id){ echo $get_resol['id']; } ?>" id="input_redactar_id" />

        <a href="../resoluciones/" class="btn btn-secondary" id="btn_cancelar">Cancelar</a>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>

    </form>
        
    </div>
</div>