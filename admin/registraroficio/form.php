<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">
        <?php 
                if($oficio_id){
                    echo "Editar Oficio";
                }else{
                    echo  "Nuevo Oficio";
                }

                    ?>
            
        </h6>
    </div>
    <div class="card-body">

    <form action="guardar.php"  method="POST">

    <div class="form-group">
            <label>Datos de la Institución</label>
            <?php 
                    if($get_institucion){
                        $id = $get_institucion['id'];
                        $rif = $get_institucion['rif'];
                        $nombre = $get_institucion['nombre'];
                        $telefono = $get_institucion['telefono'];
                        $direccion = $get_institucion['direccion'];
                        $actual = '<option value="'.$id.'">'.strtoupper($rif.' - '.$nombre).'</option>';
                    }else{
                        $rif = "";
                        $nombre = "";
                        $telefono = "";
                        $direccion ="";
                        $actual = '<option value="">Buscar...</option>';
                    }
                ?>
            
            <select class="form-control select2bs4" name="instituciones_id" id="instituciones_id" required>

                <?php echo $actual; ?>

                <option value="-1">NUEVO</option>

                <?php foreach ($intituciones as $institucion){ 

                    if($get_oficio['instituciones_id'] != $institucion['id']){
                    
                ?>

                    <option value="<?php echo $institucion['id']; ?>"><?php echo strtoupper($institucion['rif']); ?> - <?php echo strtoupper($institucion['nombre']); ?></option>
            
                <?php 
                    }
                }
            ?>
                
            </select>


                <?php foreach ($intituciones as $institucion){  ?>
                    <input type="hidden" value="<?php echo strtoupper($institucion['rif'])." ".strtoupper($institucion['nombre']) ?>" id="instituciones_<?php echo $institucion['id'] ?>"
                           data-rif="<?php echo strtoupper($institucion['rif']) ?>" data-nombre="<?php echo strtoupper($institucion['nombre']) ?>" data-telefono="<?php echo strtoupper($institucion['telefono']); ?>" 
                           data-direccion="<?php echo strtoupper($institucion['direccion']) ?>" data-id="<?php echo $institucion['id'] ?>" >
                <?php  } ?>
                
            <div class="row mt-3">
                
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="institucion_rif" placeholder="Rif" value="<?php echo strtoupper($rif); ?>"  id="input_insti_rif" required>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="institucion_nombre" placeholder="Nombre" value="<?php echo strtoupper($nombre); ?>" id="input_insti_nombre" required>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="institucion_telefono" placeholder="Teléfono" value="<?php echo $telefono; ?>" id="input_insti_telefono">
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="institucion_direccion" placeholder="Dirección" value="<?php echo strtoupper($direccion); ?>" id="input_insti_direccion">
                </div>
                
        </div>

        <div class="form-group mt-3">
            <label>Datos Personales</label>
            <?php 
                if($oficio_id){
                    $dia = $get_oficio['fecha'];
                    $requerimientos = $get_oficio['requerimientos'];
                    $cedula = $get_persona['cedula'];
                    $nombre = $get_persona['nombre'];
                    $telefono = $get_persona['telefono'];
                    $direccion = $get_persona['direccion'];
                    $opcion = "editar";
                    
                }else{
                    $dia = date("Y-m-d");
                    $requerimientos = "";
                    $cedula = "";
                    $nombre = "";
                    $telefono = "";
                    $direccion = "";
                    $opcion = "guardar";
                }
            ?>
            <select class="form-control select2bs4" name="personas_id" id="personas_id" required>
            <?php
                    if($oficio_id){
                        echo '<option value="'.$get_persona['id'].'">'.$get_persona['cedula'].' - '.strtoupper($get_persona['nombre']).'</option>';
                    }else{
                        echo '<option value="">Buscar...</option>';
                    }
                ?>
                <option value="-1">NUEVO</option>
                <?php foreach ($personas as $persona){ ?>
                    <option value="<?php echo $persona['id']; ?>"><?php echo $persona['cedula']; ?> <?php echo strtoupper($persona['nombre']); ?></option>
                <?php  } ?>
            </select>
            <?php foreach ($personas as $persona){ ?>
                    <input type="hidden" value="<?php echo $persona['cedula']." ".strtoupper($persona['nombre']) ?>" id="data_<?php echo $persona['id'] ?>"
                           data-cedula="<?php echo $persona['cedula'] ?>" data-nombre="<?php echo strtoupper($persona['nombre']) ?>" data-telefono="<?php echo $persona['telefono'] ?>" 
                           data-direccion="<?php echo strtoupper($persona['direccion']) ?>" data-id="<?php echo $persona['id'] ?>">
                <?php  } ?>

            <div class="row mt-3">
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="persona_cedula" placeholder="Cédula" value="<?php echo $cedula ?>" id="input_cedula" required>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="persona_nombre" placeholder="Nombre" value="<?php echo strtoupper($nombre); ?>" id="input_nombre" required>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="persona_telefono" placeholder="Teléfono" value="<?php echo $telefono ?>" id="input_telefono">
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="persona_direccion" placeholder="Dirección" value="<?php echo strtoupper($direccion); ?>" id="input_direccion">
                </div>
                
            </div>
        </div>

        <div class="form-group">
            <label>Fecha</label>
            <input type="date" class="form-control" name="fecha" value="<?php echo $dia; ?>" id="input_fecha" required />

        </div>
        
        <div class="form-group">
            <label>Requerimientos</label>
            
            <textarea class="form-control" cols="1" rows="5"   name="requerimientos" id="input_requerimientos"  required ?><?php echo $requerimientos; ?></textarea><br>
      
        </div>

        

        <input type="hidden" name="opcion" value="<?php echo $opcion; ?>" id="input_opcion" />
        <input type="hidden" name="registraroficio_id" value="<?php echo $oficio_id; ?>" id="input_registraroficio_id" />

        <a href="../oficios/" class="btn btn-secondary" id="btn_cancelar">Cancelar</a>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>

    </form>
        
    </div>
</div>