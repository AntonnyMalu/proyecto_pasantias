<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">Redactar Caso Social</h6>
    </div>
    <div class="card-body">

    <form action="guardar.php"  method="POST">

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
            <label>Hora</label>
            <input type="text" class="form-control" name="hora" id="input_hora" required />

        </div>

        <div class="form-group">
            <label>Donativo</label>
            <input type="text" class="form-control" name="donativo" id="input_donativo" required />

        </div>

        <div class="form-group">
            <label>Tipo</label>
            <input type="text" class="form-control" name="tipo" id="input_tipo" required />

        </div>

        <div class="form-group">
            <label>Estatus</label>
            <input type="text" class="form-control" name="status" id="input_status" required />

        </div>

        <div class="from-group">
            <lavel>Observación</lavel>
            <textarea class="form-control" cols="1" rows="5" required></textarea><br>
        </div>
       


        

        <input type="hidden" name="opcion" value="<?php if ($resol_id){ echo "editar"; }else{ echo "guardar"; } ?>" id="input_opcion" />
        <input type="hidden" name="resoluciones_id" value="<?php if ($resol_id){ echo $get_resol['id']; } ?>" id="input_redactar_id" />

        <a href="../resoluciones/" class="btn btn-secondary" id="btn_cancelar">Cancelar</a>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>

    </form>
        
    </div>
</div>