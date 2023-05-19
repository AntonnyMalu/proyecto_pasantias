<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Caso.php";
require "../_layout/flash_message.php";

if ($_POST) {

    $casos = new Caso();
    $opcion = $_POST['opcion'];
    $id = $_POST['id'];
    $hoy = date('Y-m-d');

    if (!empty($id)) {

        if ($opcion == "cambiar_status") {
            $status = $_POST['casos_status'];
    
            $cambiar = $casos->update($id, 'status', $status);
            if ($cambiar) {
                $alert = "success";
                $message = "Estatus Actualizado";
            } else {
                $alert = "warning";
                $message = "Error";
            }
        }

        if ($opcion == "eliminar") {
            $editar = $casos->update($id, 'band', 0);
            $editar = $casos->update($id, 'updated_at', $hoy);
            if ($editar) {
                $alert = "success";
                $message = "Caso Eliminado.";
            }else{
                $alert = "warning";
                $message = "Error en el Modelo";
            }
        }

    }else{
        $alert ="danger";
        $message = "Faltan Datos";
    }

} else {
    $alert = "danger";
    $message = "Se deben enviar los datos por el metodo POST";
}

crearFlashMessage($alert, $message, '../casos/');
