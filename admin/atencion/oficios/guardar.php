<?php
// start a session
session_start();
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Oficio.php";
require "../../_layout/flash_message.php";

if ($_POST) {
    $opcion = $_POST['opcion'];
    $id = $_POST['id'];
    $oficios = new Oficio();

    if (!empty($id)) {

        if ($opcion == "eliminar") {
            $eliminar = $oficios->update($id, 'band', 0);
            $alert = "success";
            $message = "Oficio Eliminado.";
        }

        if ($opcion == "cambiar_status") {
            if (!empty($_POST['status'])) {
                $status = $_POST['status'];
                $editar = $oficios->update($id, 'status', $status);
                $alert = "success";
                $message = "Estatus Actualizado.";
            }else{
                $editar = $oficios->update($id, 'status', null);
                $alert = "success";
                $message = "Estatus Restablecido.";
            }
        }
    } else {
        $alert = "warning";
        $message = "Faltan Datos.";
    }
} else {
    $alert = "danger";
    $message = "Deben enviarse los Datos por el metodo POST.";
}
crearFlashMessage($alert, $message, '../oficios/');
 
