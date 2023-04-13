<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../_layout/flash_message.php";

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


function crearCaso($personas_id,$persona_cedula, $persona_nombre,  $persona_telefono, $persona_direccion ,$fecha, $hora, $donativo, $tipo, $observacion)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");
    $persona = persona($personas_id, $persona_cedula, $persona_nombre, $persona_telefono, $persona_direccion);

    if($persona[0]){
        $sql = "INSERT INTO `casos` (`personas_id`, `fecha`, `hora`, `donativo`, `tipo`, `observacion`, `created_at`) 
        VALUES ('$persona[1]', '$fecha', '$hora', '$donativo', '$tipo', '$observacion', '$hoy');";
        $row = $query->save($sql);
        $array = array(true, $row);
    }else{
        $array = array(false, $persona[1]);
    }
    return $array;
   

}

function editarCaso($id, $personas_id, $persona_cedula, $persona_nombre,  $persona_telefono, $persona_direccion, $fecha, $hora, $donativo, $tipo, $observacion)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");
    $persona = persona($personas_id, $persona_cedula, $persona_nombre, $persona_telefono, $persona_direccion);

    if($persona[0]){
    $sql = "UPDATE `casos` SET `personas_id`='$persona[1]', `fecha`='$fecha', `hora`='$hora', `donativo`='$donativo', 
    `tipo`='$tipo', `observacion`='$observacion', `updated_at`='$hoy' WHERE  `id`='$id';";
        $row = $query->save($sql);
        $array = array(true, $row);
    }else{
        $array = array(false, $persona[1]);
    }
    return $array;

}





if ($_POST) {
    //GUARDAR NUEVO
    if ($_POST['opcion'] == "guardar") {

        if(!empty($_POST['personas_id']) && !empty($_POST['fecha']) && !empty($_POST['hora']) && !empty($_POST['donativo']) && !empty($_POST['tipo'])){
            $personas_id = $_POST['personas_id'];
            $fecha = $_POST['fecha'];
            $hora =  $_POST['hora'];
            $donativo =  $_POST['donativo'];
            $tipo =  $_POST['tipo'];
            $persona_cedula = $_POST['persona_cedula'];
            $persona_nombre = $_POST['persona_nombre'];
            $persona_telefono = $_POST['persona_telefono'];
            $persona_direccion = $_POST['persona_direccion'];
            
            $observacion =  $_POST['observacion'];
        
            $caso = crearCaso($personas_id, $persona_cedula,  $persona_nombre,  $persona_telefono,  $persona_direccion, $fecha, $hora, $donativo, $tipo, $observacion);

            if ($caso[0]) {
                
                $alert = "success";
                $message = "Caso Social Registrado Exitosamente";
                crearFlashMessage($alert,$message, '../casos/');


            } else {
                $alert = "warning";
                if($caso[1] == 1){
                    $message = "El campo <strong>Cédula</strong> no puedes cargarlo como nuevo, porque ya esta registrada. Busque en <strong>Datos Personales</strong>. ";
                }else{
                    $message = "La Cédula ya esta registrada. Busque en <strong>Datos Personales</strong>. ";
                }
                
                crearFlashMessage($alert, $message, '../registrar/');
            }


        } else {
            $alert = "danger";
            $message = "faltan datos"; 
            crearFlashMessage($alert,$message, '../casos/');
        }

        }
       
        
       
       

    }

    //EDITAR
    if ($_POST['opcion'] == "editar") {

        if(!empty($_POST['casos_id']) && !empty($_POST['personas_id']) && !empty($_POST['fecha']) && !empty($_POST['hora']) && !empty($_POST['donativo']) && !empty($_POST['tipo'])){
            $id = $_POST['casos_id'];
            $personas_id = $_POST['personas_id'];
            $fecha = $_POST['fecha'];
            $hora =  $_POST['hora'];
            $donativo =  $_POST['donativo'];
            $tipo =  $_POST['tipo'];
            $persona_cedula = $_POST['persona_cedula'];
            $persona_nombre = $_POST['persona_nombre'];
            $persona_telefono = $_POST['persona_telefono'];
            $persona_direccion = $_POST['persona_direccion'];
            
            $observacion =  $_POST['observacion'];
        
            $caso = editarCaso($id, $personas_id, $persona_cedula,  $persona_nombre,  $persona_telefono,  $persona_direccion, $fecha, $hora, $donativo, $tipo, $observacion);

            if ($caso[0]) {

                $alert = "success";
                $message = "Registro Editado Exitosamente";
                crearFlashMessage($alert,$message, '../casos/');


            } else {
                $alert = "warning";
                if($caso[1] == 1){
                    $message = "El campo <strong>Cédula</strong> no puedes cargarlo como nuevo, porque ya esta registrada. Busque en <strong>Datos Personales</strong>. ";
                }else{
                    $message = "La Cédula ya esta registrada. Busque en <strong>Datos Personales</strong>. ";
                }
                crearFlashMessage($alert, $message, '../registrar/index.php?id='.$id);
            }


        } else {
            $alert = "danger";
            $message = "faltan datos"; 
            crearFlashMessage($alert,$message, '../casos/');
        }

        }
    
        
?>