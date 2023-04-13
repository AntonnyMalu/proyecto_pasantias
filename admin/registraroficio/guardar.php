<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../_layout/flash_message.php";
$modulo = "resoluciones";

$alert = null;
$message = null;

function existeGlobal($cedula, $id_cedula, $rif, $id_rif)
{
    $row = null;
    $query = new Query();
    $array = array(false, 'mensaje', false, 'mensaje');

    if($id_cedula == -1){
        $mensaje_cedula = 1;
        $sql1 = "SELECT * FROM `personas` WHERE `cedula` = '$cedula' AND `band` = '1'";
    }else{
        $mensaje_cedula = 2;
        $sql1 = "SELECT * FROM `personas` WHERE `cedula` = '$cedula' AND `band` = '1' AND `id` != '$id_cedula'";
    }
    $persona = $query->getFirst($sql1);
    if($persona){
        $array[0]  = true;
        $array[1] = $mensaje_cedula;
    }

    if($id_rif == -1){
        $mensaje_rif = 3;
        $sql1 = "SELECT * FROM `instituciones` WHERE `rif` = '$rif' AND `band` = '1'";
    }else{
        $mensaje_rif = 4;
        $sql1 = "SELECT * FROM `instituciones` WHERE `rif` = '$rif' AND `band` = '1' AND `id` != '$id_rif'";
    }
    $institucion = $query->getFirst($sql1);
    if($institucion){
        $array[2]  = true;
        $array[3] = $mensaje_rif;
    }

    return $array;

}

function existePersona($cedula, $id){
    $row = null;
    $query = new Query();
    
    if($id == -1){
        $mensaje = 1;
        $sql1 = "SELECT * FROM `personas` WHERE `cedula` = '$cedula' AND `band` = '1'";
    }else{
        $mensaje = 2;
        $sql1 = "SELECT * FROM `personas` WHERE `cedula` = '$cedula' AND `band` = '1' AND `id` != '$id'";
    }
    $exite = $query->getFirst($sql1);

    if($exite){
        $array = array(true, $mensaje);  
    }else{
        $array = array(false, $mensaje);
    }
    return $array;

}

function existeInstitucion($rif, $id){
    $row = null;
    $query = new Query();
    
    if($id == -1){
        $mensaje = 3;
        $sql1 = "SELECT * FROM `instituciones` WHERE `rif` = '$rif' AND `band` = '1'";
    }else{
        $mensaje = 4;
        $sql1 = "SELECT * FROM `instituciones` WHERE `rif` = '$rif' AND `band` = '1' AND `id` != '$id'";
    }
    $exite = $query->getFirst($sql1);

    if($exite){
        $array = array(true, $mensaje);
    }else{
        $array = array(false, $mensaje);
    }
    return $array;

}

function persona($id, $cedula, $nombre, $telefono, $direccion){
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");

    if($id == -1){ 
        //nuevo
        $existe = existePersona($cedula, $id);
        if(!$existe[0]){
            $sql = "INSERT INTO`personas` (`cedula`, `nombre`, `telefono`, `direccion`, `created_at`) VALUES ('$cedula', '$nombre', '$telefono', '$direccion', '$hoy');";
            $row = $query->save($sql);
            $sql2 = "SELECT * FROM `personas` WHERE `cedula` = '$cedula'; ";
            $row = $query->getFirst($sql2);
            $array = array(true, $row['id']);
        }else{
            $array = array(false, $existe[1]);
        
        }
    return $array;

    }else{
        //editar
        $existe = existePersona($cedula, $id);
        if(!$existe[0]){
            $sql = "UPDATE `personas` SET `cedula`='$cedula', `nombre`='$nombre', `telefono`='$telefono', `direccion`='$direccion', `updated_at`='$hoy' WHERE `id`=$id;";
            $row = $query->save($sql);
            $array = array(true, $id);   
        }else{
            $array = array(false, $existe[1]);
        }
        return $array;
    
    }
}

function instituciones($id,$rif, $nombre, $telefono, $direccion){
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");

    if($id == -1){ 
        //nuevo
        $existe = existeInstitucion($rif, $id);
        if(!$existe[0]){
            $sql = "INSERT INTO`instituciones` (`rif`, `nombre`, `telefono`, `direccion`, `created_at`) VALUES ('$rif', '$nombre', '$telefono', '$direccion', '$hoy');";
            $row = $query->save($sql);
            $sql2 = "SELECT * FROM `instituciones` WHERE `rif` = '$rif'; ";
            $row = $query->getFirst($sql2);
            $array = array(true, $row['id']);
        }else{
            $array = array(false, $existe[1]);
        }
        return $array;
    
    }else{
        //editar
        $existe = existeInstitucion($rif, $id);
        if(!$existe[0]){
        $sql = "UPDATE `instituciones` SET `rif`='$rif', `nombre`='$nombre', `telefono`='$telefono', `direccion`='$direccion', `updated_at`='$hoy' WHERE `id`=$id;";
        $row = $query->save($sql);
        $array = array(true, $id);
        }else{
            $array = array(false, $existe[1]);
        }
        return $array;
    }
}

function crearOficio($instituciones_id, $personas_id, $persona_cedula, $persona_nombre,  $persona_telefono, $persona_direccion, 
                        $institucion_rif,$institucion_nombre,$institucion_telefono,$institucion_direccion,$fecha, $requerimientos)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");
    $existe = existeGlobal($persona_cedula, $personas_id, $institucion_rif, $instituciones_id);

    if(!$existe[0] && !$existe[2]){
    $persona = persona($personas_id, $persona_cedula, $persona_nombre, $persona_telefono, $persona_direccion);
    $institucion = instituciones($instituciones_id,$institucion_rif, $institucion_nombre, $institucion_telefono, $institucion_direccion);

    $sql = "INSERT INTO `oficios` (`instituciones_id`, `personas_id`, `fecha`, `requerimientos`) 
    VALUES ('$institucion[1]', '$persona[1]', '$fecha', '$requerimientos');";
        $row = $query->save($sql);
        $array = array(true, $row, true, $row);
    }else{

        if($existe[0] && !$existe[2]){
            $array = array(false, $existe[1], true, $existe[3]);
        }else{
            $array = array(true, $existe[1], false, $existe[3]);
        }

        if($existe[0] && $existe[2]){
            $array = array(false, $existe[1], false, $existe[3]);
        }
        
    }
    return $array;

}

function editarOficio($id, $instituciones_id, $personas_id,$persona_cedula, $persona_nombre,  $persona_telefono, $persona_direccion ,
                    $institucion_rif,$institucion_nombre,$institucion_telefono, $institucion_direccion, $fecha, $requerimientos)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");
    $existe = existeGlobal($persona_cedula, $personas_id, $institucion_rif, $instituciones_id);

    if(!$existe[0] && !$existe[2]){

        $persona = persona($personas_id, $persona_cedula, $persona_nombre, $persona_telefono, $persona_direccion);
        $institucion = instituciones($instituciones_id,$institucion_rif, $institucion_nombre, $institucion_telefono, $institucion_direccion);
        //echo $institucion[1];
        //exit;
        $sql = "UPDATE `oficios` SET `instituciones_id`='$institucion[1]', `personas_id`='$persona[1]', `fecha`='$fecha', `requerimientos`='$requerimientos' WHERE  `id`=$id;";
        $row = $query->save($sql);
        $array = array(true, $row, true, $row);

    }else{

        if($existe[0] && !$existe[2]){
            $array = array(false, $existe[1], true, $existe[3]);
        }else{
            $array = array(true, $existe[1], false, $existe[3]);
        }

        if($existe[0] && $existe[2]){
            $array = array(false, $existe[1], false, $existe[3]);
        }
        
    }
    return $array;

}





if ($_POST) {
    if ($_POST['opcion'] == "guardar") {

        if(!empty($_POST['instituciones_id']) && !empty($_POST['personas_id']) && !empty($_POST['fecha']) && !empty($_POST['requerimientos'])){

            $instituciones_id = $_POST['instituciones_id'];
            $personas_id = $_POST['personas_id'];
            $fecha = $_POST['fecha'];
            $requerimientos = $_POST['requerimientos'];
            $persona_cedula = $_POST['persona_cedula'];
            $persona_nombre = $_POST['persona_nombre'];
            $persona_telefono = $_POST['persona_telefono'];
            $persona_direccion = $_POST['persona_direccion'];
            $institucion_rif = $_POST['institucion_rif'];
            $institucion_nombre = $_POST['institucion_nombre'];
            $institucion_telefono = $_POST['institucion_telefono'];
            $institucion_direccion = $_POST['institucion_direccion'];

            $oficio = crearOficio($instituciones_id, $personas_id, $persona_cedula,  $persona_nombre,  $persona_telefono,  
            $persona_direccion,$institucion_rif,$institucion_nombre,$institucion_telefono,$institucion_direccion, $fecha, $requerimientos);

            if ($oficio[0] && $oficio[2]) {

                $alert = "success";
                $message = "Oficio Registrado Exitosamente";
                crearFlashMessage($alert,$message, '../oficios/');


            } else {
                $alert = "warning";

                if(!$oficio[0] && $oficio[2] ){
                    if($oficio[1] == 1){
                        $message = "El campo <strong>Cédula</strong> no puedes cargarlo como nuevo, porque ya esta registrada. Busque en <strong>Datos Personales</strong>. ";
                    }else{
                        $message = "La <strong>Cédula</strong> ya esta registrada. Busque en <strong>Datos Personales</strong>. ";
                    }
                }

                if($oficio[0]  && !$oficio[2]){
                    if($oficio[3] == 3){
                        $message = "El campo <strong>Rif</strong> no puedes cargarlo como nuevo, porque ya esta registrada. Busque en <strong>Datos de la Institución</strong>.";
                    }else{
                        $message = "El <strong>Rif</strong> ya esta registrada. Busque en <strong>Datos de la Institución</strong>. ";
                    }
                }

                if(!$oficio[0] && !$oficio[2]){
                    $message = "Tanto el <strong>Rif</strong> como la <strong>Cédula</strong> ya estan registrados. Por favor verifique.";
                }
                
                crearFlashMessage($alert, $message, '../registraroficio/');
            }


        } else {
            $alert = "danger";
            $message = "faltan datos"; 
            crearFlashMessage($alert,$message, '../oficios/');
        }

        }
       
        }
    

        if ($_POST['opcion'] == "editar") {

            if(!empty($_POST['registraroficio_id']) && !empty($_POST['instituciones_id']) && !empty($_POST['personas_id']) && !empty($_POST['fecha']) && !empty($_POST['requerimientos'])){
               
                $id = $_POST['registraroficio_id'];
                $instituciones_id = $_POST['instituciones_id'];
                $personas_id = $_POST['personas_id'];
                $fecha = $_POST['fecha'];
                $requerimientos = $_POST['requerimientos'];
                $persona_cedula = $_POST['persona_cedula'];
                $persona_nombre = $_POST['persona_nombre'];
                $persona_telefono = $_POST['persona_telefono'];
                $persona_direccion = $_POST['persona_direccion'];
                $institucion_rif = $_POST['institucion_rif'];
                $institucion_nombre = $_POST['institucion_nombre'];
                $institucion_telefono = $_POST['institucion_telefono'];
                $institucion_direccion = $_POST['institucion_direccion'];


                $oficio = editarOficio($id, $instituciones_id, $personas_id,$persona_cedula,  $persona_nombre,  $persona_telefono,  
                $persona_direccion,$institucion_rif,$institucion_nombre,$institucion_telefono,$institucion_direccion, $fecha, $requerimientos);
                
                if ($oficio[0] && $oficio[2]) {

                    $alert = "success";
                    $message = "Oficio Editado Exitosamente";
                    crearFlashMessage($alert,$message, '../oficios/');
    
    
                } else {
                    $alert = "warning";
    
                    if(!$oficio[0] && $oficio[2] ){
                        if($oficio[1] == 1){
                            $message = "El campo <strong>Cédula</strong> no puedes cargarlo como nuevo, porque ya esta registrada. Busque en <strong>Datos Personales</strong>. ";
                        }else{
                            $message = "La <strong>Cédula</strong> ya esta registrada. Busque en <strong>Datos Personales</strong>. ";
                        }
                    }
    
                    if($oficio[0]  && !$oficio[2]){
                        if($oficio[3] == 3){
                            $message = "El campo <strong>Rif</strong> no puedes cargarlo como nuevo, porque ya esta registrada. Busque en <strong>Datos de la Institución</strong>.";
                        }else{
                            $message = "El <strong>Rif</strong> ya esta registrada. Busque en <strong>Datos de la Institución</strong>. ";
                        }
                    }
    
                    if(!$oficio[0] && !$oficio[2]){
                        $message = "Tanto el <strong>Rif</strong> como la <strong>Cédula</strong> ya estan registrados. Por favor verifique.";
                    }
                    
                    crearFlashMessage($alert, $message, '../registraroficio/index.php?id='.$id);
                }
    
    
    
            } else {
                $alert = "danger";
                $message = "faltan datos"; 
                crearFlashMessage($alert,$message, '../oficios/');
            }
    
            
            }
        




?>