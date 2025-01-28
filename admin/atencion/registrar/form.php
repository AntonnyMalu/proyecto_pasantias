<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">
            <?php 
            if($getCaso){
                echo "Editar Caso Social";
            }else{
                echo "Registrar Caso Social";
            }
            ?>
        

        </h6>
    </div>
    <div class="card-body">

    <form action="guardar.php"  method="POST">

        <div class="form-group">
            <label>Datos Personales</label>
            <?php 
                if($getCaso){
                    $getPersona = $personas->find($getCaso['personas_id']);
                    $dia = $getCaso['fecha'];
                    $hora = $getCaso['hora'];
                    $tipo = $getCaso['tipo'];
                    $obsevacion = $getCaso['observacion'];
                    $cedula = $getPersona['cedula'];
                    $nombre = $getPersona['nombre'];
                    $telefono = $getPersona['telefono'];
                    $direccion = $getPersona['direccion'];
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
                    if($getCaso){
                        echo '<option value="'.$getPersona['id'].'">'.$getPersona['cedula'].' - '.strtoupper($getPersona['nombre']).'</option>';
                    }else{
                        echo '<option value="">Buscar...</option>';
                    }
                ?>


                
                <option value="-1">NUEVO</option>
                <?php 
                foreach($listarPersona as $persona){
                    if($getPersona['id'] != $persona['id']){

                   

                    ?>
                    <option value="<?php echo $persona['id']; ?>"><?php echo $persona['cedula']; ?> - <?php echo strtoupper($persona['nombre']); ?></option>
                    <?php

}

                }
                ?>
            </select>
            <?php foreach ($listarPersona as $persona){ ?>
                    <input type="hidden" value="<?php echo $persona['cedula']." ".strtoupper($persona['nombre']) ?>" id="data_<?php echo $persona['id'] ?>"
                           data-cedula="<?php echo $persona['cedula'] ?>" data-nombre="<?php echo strtoupper($persona['nombre']) ?>" data-telefono="<?php echo $persona['telefono'] ?>" 
                           data-direccion="<?php echo strtoupper($persona['direccion']) ?>" data-id="<?php echo $persona['id'] ?>">
                <?php  } ?>
            


            <div class="row mt-3">
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="persona_cedula" placeholder="Cédula" value="<?php echo $cedula; ?>" id="input_cedula" required>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="persona_nombre" placeholder="Nombre" value="<?php echo strtoupper($nombre); ?>" id="input_nombre" required>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="persona_telefono" placeholder="Teléfono" value="<?php echo strtoupper($telefono); ?>" id="input_telefono">
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="persona_direccion" placeholder="Dirección" value="<?php echo strtoupper($direccion); ?>" id="input_direccion">
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
                    if($getCaso){
                        if($getCaso['donativo'] == 'Si'){
                            //si
                            echo '<option value="Si">Si</option>
                            <option value="No">No</option>';

                        }else{

                            echo '<option value="Si">Si</option>
                            <option value="No">No</option>';
                            
                        }
                    }else{

                    
                ?>
            
            
                <option>Seleccione</option>
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
       

    
        

        <input type="hidden" name="opcion" value="<?php echo $opcion; ?>" id="input_opcion" />
        <input type="hidden" name="id" id="input_redactar_id" value="<?php echo $id; ?>" />

        <a href="../casos/" class="btn btn-secondary" id="btn_cancelar">Cancelar</a>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>

    </form>
        
    </div>
</div>