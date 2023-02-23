<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../flash_message.php";
$modulo = "resoluciones";

$alert = null;
$message = null;


function crearOficio($instituciones_id, $personas_id, $fecha, $requerimientos)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");

    $sql = "INSERT INTO `oficios` (`instituciones_id`, `personas_id`, `fecha`, `requerimientos`) 
    VALUES ('$instituciones_id', '$personas_id', '$fecha', '$requerimientos');";
        $row = $query->save($sql);
        return $row;

}

function editarOficio($id, $instituciones_id, $personas_id, $fecha, $requerimientos)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");

    $sql = "UPDATE `oficios` SET `instituciones_id`='$instituciones_id', `personas_id`='$personas_id', `fecha`='$fecha', `requerimientos`='$requerimientos' WHERE  `id`=$id;";
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

            $oficio = crearOficio($instituciones_id, $personas_id, $fecha, $requerimientos);

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

                $oficio = editarOficio($id, $instituciones_id, $personas_id, $fecha, $requerimientos);
                
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