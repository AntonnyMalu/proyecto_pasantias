<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../flash_message.php";
$modulo = "resoluciones";

$alert = null;
$message = null;

function persona($id, $cedula, $nombre, $telefono, $direccion){
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");

    if($id == -1){ 
        //nuevo
         $sql = "INSERT INTO`personas` (`cedula`, `nombre`, `telefono`, `direccion`, `created_at`) VALUES ('$cedula', '$nombre', '$telefono', '$direccion', '$hoy');";
        $row = $query->save($sql);
        $sql2 = "SELECT * FROM `personas` WHERE `cedula` = '$cedula'; ";
        $row = $query->getFirst($sql2);
        return $row['id'];
        
    
    }else{
        //editar
        $sql = "UPDATE `personas` SET `cedula`='$cedula', `nombre`='$nombre', `telefono`='$telefono', `direccion`='$direccion', `updated_at`='$hoy' WHERE `id`=$id;";
        $row = $query->save($sql);
        return $id;
    }
}

function instituciones($id,$rif, $nombre, $telefono, $direccion){
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");

    if($id == -1){ 
        //nuevo
        $sql = "INSERT INTO`instituciones` (`rif`, `nombre`, `telefono`, `direccion`, `created_at`) VALUES ('$rif', '$nombre', '$telefono', '$direccion', '$hoy');";
        $row = $query->save($sql);
        $sql2 = "SELECT * FROM `instituciones` WHERE `rif` = '$rif'; ";
        $row = $query->getFirst($sql2);
        return $row['id'];
        
    
    }else{
        //editar
        $sql = "UPDATE `instituciones` SET `rif`='$rif', `nombre`='$nombre', `telefono`='$telefono', `direccion`='$direccion', `updated_at`='$hoy' WHERE `id`=$id;";
        $row = $query->save($sql);
        return $id;
    }
}

function crearOficio($instituciones_id, $personas_id, $persona_cedula, $persona_nombre,  $persona_telefono, $persona_direccion, 
                        $institucion_rif,$institucion_nombre,$institucion_telefono,$institucion_direccion,$fecha, $requerimientos)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");
    $persona = persona($personas_id, $persona_cedula, $persona_nombre, $persona_telefono, $persona_direccion);
    $institucion = instituciones($instituciones_id,$institucion_rif, $institucion_nombre, $institucion_telefono, $institucion_direccion);

    $sql = "INSERT INTO `oficios` (`instituciones_id`, `personas_id`, `fecha`, `requerimientos`) 
    VALUES ('$institucion', '$persona', '$fecha', '$requerimientos');";
        $row = $query->save($sql);
        return $row;

}

function editarOficio($id, $instituciones_id, $personas_id,$persona_cedula, $persona_nombre,  $persona_telefono, $persona_direccion ,
                    $institucion_rif,$institucion_nombre,$institucion_telefono, $institucion_direccion, $fecha, $requerimientos)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");
    $persona = persona($personas_id, $persona_cedula, $persona_nombre, $persona_telefono, $persona_direccion);
    $institucion = instituciones($instituciones_id,$institucion_rif, $institucion_nombre, $institucion_telefono, $institucion_direccion);
    $sql = "UPDATE `oficios` SET `instituciones_id`='$institucion', `personas_id`='$persona', `fecha`='$fecha', `requerimientos`='$requerimientos' WHERE  `id`=$id;";
        $row = $query->save($sql);
        return $row;

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

            if ($oficio) {

                $alert = "success";
                $message = "Oficio Registrado Exitosamente";
                crearFlashMessage($alert,$message, '../oficios/');


            } else {
                $alert = "warning";
                $message = "Caso ya Reguistrado";
                crearFlashMessage($alert, $message, '../oficios/');
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
                
                if ($oficio) {

                    $alert = "success";
                    $message = "Oficio Editado Exitosamente";
                    crearFlashMessage($alert,$message, '../oficios/');
    
    
                } else {
                    $alert = "warning";
                    $message = "Error";
                    crearFlashMessage($alert, $message, '../oficios/');
                }
    
    
            } else {
                $alert = "danger";
                $message = "faltan datos"; 
                crearFlashMessage($alert,$message, '../oficios/');
            }
    
            
            }
        




?>