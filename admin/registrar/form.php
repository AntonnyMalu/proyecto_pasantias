<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">Registrar Caso Social</h6>
    </div>
    <div class="card-body">

    <form action="guardar.php"  method="POST">

        <div class="form-group">
            <label>Datos Personales</label>
            <?php 
                if($caso_id){
                    $dia = $get_caso['fecha'];
                    $hora = $get_caso['hora'];
                    $tipo = $get_caso['tipo'];
                    $obsevacion = $get_caso['observacion'];
                    $cedula = $get_persona['cedula'];
                    $nombre = $get_persona['nombre'];
                    $telefono = $get_persona['telefono'];
                    $direccion = $get_persona['direccion'];
                    $opcion = "editar";
                }else{
                    $dia = date("Y-m-d");
                    $hora = date("H:i");
                    $tipo = "CASO VULNERABLE";
                    $obsevacion = "";
                    $cedula = "";
                    $nombre = "";
                    $telefono = "";
                    $direccion = "";
                    $opcion = "guardar";
                }
            ?>
            
            <select class="form-control select2bs4" name="personas_id" id="personas_id" required>

                <?php
                    if($caso_id){
                        echo '<option value="'.$get_persona['id'].'">'.$get_persona['cedula'].' - '.strtoupper($get_persona['nombre']).'</option>';
                    }else{
                        echo '<option value="">Buscar...</option>';
                    }
                ?>


                
                <option value="-1">NUEVO</option>
                <?php 
                foreach($personas as $persona){
                    if($get_persona['id'] != $persona['id']){

                   

                    ?>
                    <option value="<?php echo $persona['id']; ?>"><?php echo $persona['cedula']; ?> - <?php echo strtoupper($persona['nombre']); ?></option>
                    <?php

}

                }
                ?>
            </select>
            <?php foreach ($personas as $persona){ ?>
                    <input type="hidden" value="<?php echo $persona['cedula']." ".strtoupper($persona['nombre']) ?>" id="data_<?php echo $persona['id'] ?>"
                           data-cedula="<?php echo $persona['cedula'] ?>" data-nombre="<?php echo strtoupper($persona['nombre']) ?>" data-telefono="<?php echo $persona['telefono'] ?>" 
                           data-direccion="<?php echo strtoupper($persona['direccion']) ?>" data-id="<?php echo $persona['id'] ?>">
                <?php  } ?>
            


            <div class="row mt-3">
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="cedula" placeholder="Cédula" value="<?php echo $cedula; ?>" id="input_cedula" required>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo strtoupper($nombre); ?>" id="input_nombre" required>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="telefono" placeholder="Teléfono" value="<?php echo strtoupper($telefono); ?>" id="input_telefono">
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="direccion" placeholder="Dirección" value="<?php echo strtoupper($direccion); ?>" id="input_direccion">
                </div>
                
            </div>
        
        </div>
        
        <div class="row mt-3">
        <div class="form-group col-lg-3">
            <label>Fecha</label>
           
            <input type="date" class="form-control" value="<?php echo $dia; ?>" name="fecha" id="input_fecha" required />
        </div>
        
        <div class="form-group col-lg-3">
            <label>Hora</label>
            <input type="time" class="form-control" value="<?php echo $hora; ?>" name="hora" id="input_hora" required />

        </div>

        <div class="form-group col-lg-3">
            <label>Donativo</label>
            <select class="form-control" name="donativo" id="donativo" required>
                
                <?php
                    if($caso_id){
                        if($get_caso['donativo'] == 'Si'){
                            //si
                            echo '<option value="Si">Si</option>
                            <option value="No">No</option>';

                        }else{

                            echo '<option value="Si">Si</option>
                            <option value="No">No</option>';
                            
                        }
                    }else{

                    
                ?>
            
            
                <option value="#">Seleccione</option>
                <option value="Si">Si</option>
                <option value="No">No</option>

                <?php } ?>

            </select>
        </div>
        <div class="form-group col-lg-3">
            <label>Tipo</label>
            <input type="text" class="form-control" value="<?php echo strtoupper($tipo); ?>" name="tipo" id="input_tipo" required />

        </div>

        </div>


        <div class="from-group">
            <lavel>Observación</lavel>
            <textarea class="form-control" cols="1" rows="5"   name="observacion"><?php echo strtoupper($obsevacion); ?></textarea><br>
        </div>
       

    
        

        <input type="text" name="opcion" value="<?php echo $opcion; ?>" id="input_opcion" />
        <input type="text" name="casos_id" id="input_redactar_id" value="<?php echo $caso_id; ?>" />

        <a href="../casos/" class="btn btn-secondary" id="btn_cancelar">Cancelar</a>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>

    </form>
        
    </div>
</div>