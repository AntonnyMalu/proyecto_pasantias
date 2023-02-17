<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../flash_message.php";



function crearCasos($personas_id, $fecha, $hora, $donativo, $tipo, $status, $observacion)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");

    $sql = "INSERT INTO `casos` (`personas_id`, `fecha`, `hora`, `donativo`, `tipo`, `status`, `observacion`, `created_at`) 
        VALUES ('$personas_id', '$fecha', '$hora', '$donativo', '$tipo', '$status', '$observacion', '$hoy');";
        $row = $query->save($sql);
        return $row;

}

function editarCasos($id, $personas_id, $fecha, $hora, $donativo, $tipo, $status, $observacion)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");

    $sql = "UPDATE `casos` (`personas_id`, `fecha`, `hora`, `donativo`, `tipo`, `status`, `observacion`, `updated_at`) 
        VALUES ('$personas_id', '$fecha', '$hora', '$donativo', '$tipo', '$status', '$observacion', '$hoy');";
        $row = $query->save($sql);
        return $row;

}



if ($_POST) {
    //GUARDAR NUEVO
    if ($_POST['opcion'] == "guardar") {

        if(!empty($_POST['personas_id']) && !empty($_POST['fecha']) && !empty($_POST['hora']) && !empty($_POST['donativo']) && !empty($_POST['tipo']) && !empty($_POST['status']) && !empty($_POST['observacion'])){
            $personas_id = $_POST['personas_id'];
            $fecha = $_POST['fecha'];
            $hora =  $_POST['hora'];
            $donativo =  $_POST['donativo'];
            $tipo =  $_POST['tipo'];
            $status =  $_POST['status'];
            $observacion =  $_POST['observacion'];
        
            $caso = crearCasos($personas_id, $fecha, $hora, $donativo, $tipo, $status, $observacion);

            if ($caso) {

                $alert = "success";
                $message = "Usuario Creado Exitosamente";
                crearFlashMessage($alert,$message, '../casos/');


            } else {
                $alert = "warning";
                $message = "Email ya registrado";
                crearFlashMessage($alert, $message, '../casos/');
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

        if(!empty($_POST['casos_id']) && !empty($_POST['personas_id']) && !empty($_POST['fecha']) && !empty($_POST['hora']) && !empty($_POST['donativo']) && !empty($_POST['tipo']) && !empty($_POST['status']) && !empty($_POST['observacion'])){
            $id = $_POST['casos_id'];
            $personas_id = $_POST['personas_id'];
            $fecha = $_POST['fecha'];
            $hora =  $_POST['hora'];
            $donativo =  $_POST['donativo'];
            $tipo =  $_POST['tipo'];
            $status =  $_POST['status'];
            $observacion =  $_POST['observacion'];
        
            $caso = editarCasos($id, $personas_id, $fecha, $hora, $donativo, $tipo, $status, $observacion);

            if ($caso) {

                $alert = "success";
                $message = "Usuario Creado Exitosamente";
                crearFlashMessage($alert,$message, '../redactar/');


            } else {
                $alert = "warning";
                $message = "Email ya registrado";
                crearFlashMessage($alert, $message, '../redactar/');
            }


        } else {
            $alert = "danger";
            $message = "faltan datos"; 
            crearFlashMessage($alert,$message, '../redactar/');
        }

        }
    

?>