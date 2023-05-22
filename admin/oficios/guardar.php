<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Oficio.php";
require "../_layout/flash_message.php";

if ($_POST) {
   
    /*if ($_POST['opcion'] == "eliminar") {

        if (!empty($_POST['oficios_id'])){

            $id = $_POST['oficios_id'];

            //$persona = eliminarOficio($id);
            $eliminar = $oficio->delete($id);

            if ($eliminar) {
                $alert = "success";
                $message = "Oficio Eliminado";
                crearFlashMessage($alert, $message, '../oficios/');
            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert, $message, '../oficios/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../oficios/');
        }

    }*/

    
        
}else{
    $alert = "danger";
    $message = "Deben enviarse los Datos por el metodo POST";
}
/*if ($_POST['opcion'] == "cambiar_status") {
        $id = $_POST['casos_id'];
        $status = $_POST['casos_status'];
        
        //$cambiar = editarStatus($id, $status);
        $cambiar = $oficio->setStatus($id, $status);
        if ($cambiar) {
            $alert = "success";
            $message = "Estatus Actualizado";
            crearFlashMessage($alert,$message, '../oficios/');
        } else {
            $alert = "warning";
            $message = "Error";
            crearFlashMessage($alert,$message, '../oficios/');
        }

    }*/
?>

