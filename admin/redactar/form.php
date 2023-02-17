<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">Redactar Caso Social</h6>
    </div>
    <div class="card-body">

    <form action="guardar.php"  method="POST">

        <div class="form-group">
            <label>Datos Personales</label>
            <select class="form-control" name="personas_id" id="input_personas_id" required>
                <option value="">Seleccione</option>
                <option value="-1">NUEVO</option>
                <?php 
                foreach($personas as $persona){
                    ?>
                    <option value="<?php echo $persona['id']; ?>"><?php echo $persona['cedula']; ?> <?php echo strtoupper($persona['nombre']); ?></option>
                    <?php
                }
                ?>
            </select>

            <div class="row mt-3">
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="cedula" placeholder="Cédula" id="input_cedula" required>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="input_nombre" required>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="telefono" placeholder="Teléfono" id="input_telefono">
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="direccion" placeholder="Dirección" id="input_direccion">
                </div>
                
            </div>
        
        </div>
        
        <div class="row mt-3">
        <div class="form-group col-lg-3">
            <label>Fecha</label>
            <input type="date" class="form-control" name="fecha" id="input_fecha" required />
        </div>
        
        <div class="form-group col-lg-3">
            <label>Hora</label>
            <input type="text" class="form-control" name="hora" id="input_hora" required />

        </div>

        <div class="form-group col-lg-3">
            <label>Donativo</label>
            <input type="text" class="form-control" name="donativo" id="input_donativo" required />

        </div>

        <div class="form-group col-lg-3">
            <label>Tipo</label>
            <input type="text" class="form-control" name="tipo" id="input_tipo" required />

        </div>

        </div>

        <div class="form-group">
            <label>Estatus</label>
            <input type="text" class="form-control" name="status" id="input_status" required />

        </div>

        <div class="from-group">
            <lavel>Observación</lavel>
            <textarea class="form-control" cols="1" rows="5" required name="observacion"></textarea><br>
        </div>
       


        

        <input type="text" name="opcion" value="guardar" id="input_opcion" />
        <input type="text" name="casos_id" id="input_redactar_id" />

        <a href="../casos/" class="btn btn-secondary" id="btn_cancelar">Cancelar</a>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>

    </form>
        
    </div>
</div>