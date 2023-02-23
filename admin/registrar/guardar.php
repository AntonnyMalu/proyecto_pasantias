<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../flash_message.php";



function crearCaso($personas_id, $fecha, $hora, $donativo, $tipo, $status, $observacion)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");

    $sql = "INSERT INTO `casos` (`personas_id`, `fecha`, `hora`, `donativo`, `tipo`, `status`, `observacion`, `created_at`) 
        VALUES ('$personas_id', '$fecha', '$hora', '$donativo', '$tipo', '$status', '$observacion', '$hoy');";
        $row = $query->save($sql);
        return $row;

}

function editarCaso($id, $personas_id, $fecha, $hora, $donativo, $tipo, $observacion)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");

    $sql = "UPDATE `casos` SET `personas_id`='$personas_id', `fecha`='$fecha', `hora`='$hora', `donativo`='$donativo', 
    `tipo`='$tipo', `observacion`='$observacion', `updated_at`='$hoy' WHERE  `id`='$id';";
        $row = $query->save($sql);
        return $row;

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
            
            $observacion =  $_POST['observacion'];
        
            $caso = crearCaso($personas_id, $fecha, $hora, $donativo, $tipo, $status, $observacion);

            if ($caso) {

                $alert = "success";
                $message = "Caso Social Registrado Exitosamente";
                crearFlashMessage($alert,$message, '../casos/');


            } else {
                $alert = "warning";
                $message = "Caso ya Reguistrado";
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

        if(!empty($_POST['casos_id']) && !empty($_POST['personas_id']) && !empty($_POST['fecha']) && !empty($_POST['hora']) && !empty($_POST['donativo']) && !empty($_POST['tipo'])){
            $id = $_POST['casos_id'];
            $personas_id = $_POST['personas_id'];
            $fecha = $_POST['fecha'];
            $hora =  $_POST['hora'];
            $donativo =  $_POST['donativo'];
            $tipo =  $_POST['tipo'];
            
            $observacion =  $_POST['observacion'];
        
            $caso = editarCaso($id, $personas_id, $fecha, $hora, $donativo, $tipo, $observacion);

            if ($caso) {

                $alert = "success";
                $message = "Registro Editado Exitosamente";
                crearFlashMessage($alert,$message, '../casos/');


            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert, $message, '../casos/');
            }


        } else {
            $alert = "danger";
            $message = "faltan datos"; 
            crearFlashMessage($alert,$message, '../casos/');
        }

        }
    
        
?>