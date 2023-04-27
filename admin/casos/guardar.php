<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Caso.php";
require "../_layout/flash_message.php";

if ($_POST) {
    $caso = new Caso();
//ELIMINAR USUARIO
    if ($_POST['opcion'] == "eliminar") {

        if (!empty($_POST['casos_id'])){

            $id = $_POST['casos_id'];

            //$usuario = eliminarCaso($id);
            $casos = $caso->delete($id);

            if ($casos) {
                $alert = "success";
                $message = "Caso Eliminado.";
                crearFlashMessage($alert,$message, '../casos/');
            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert,$message, '../casos/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert,$message, '../casos/');
        }

    }
    
    if ($_POST['opcion'] == "cambiar_status") {
        $id = $_POST['casos_id'];
        $status = $_POST['casos_status'];
        
        $cambiar = $caso->setStatus($id, $status);
        if ($cambiar) {
            $alert = "success";
            $message = "Estatus Actualizado";
            crearFlashMessage($alert,$message, '../casos/');
        } else {
            $alert = "warning";
            $message = "Error";
            crearFlashMessage($alert,$message, '../casos/');
        }

    }

}



?>