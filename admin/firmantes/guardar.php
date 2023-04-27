<?php 
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Firmante.php";
require "../_layout/flash_message.php";
$alert = null;
$message = null;

if ($_POST) {
    $firmante = new Firmante();
    if ($_POST['opcion'] == "guardar") {

        if (!empty($_POST['nombre']) && !empty($_POST['cargo'])) {
            $nombre = $_POST['nombre'];
            $cargo = $_POST['cargo'];

            //$firmantes = crearFirmante($nombre, $cargo);
            $firmantes = $firmante->save($nombre, $cargo);
            if ($firmantes) {
                $alert = "success";
                $message = "Firmante Creado Exitosamente";
                crearFlashMessage($alert,$message, '../firmantes/');
            } else {
                $alert = "warning";
                $message = "No se puede reguistrar porque ya ese cargo esta siendo utilizado";
                crearFlashMessage($alert, $message, '../firmantes/');
            }
        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert,$message, '../firmantes/');
        }

        }
    }

    if ($_POST['opcion'] == "editar") {
        if (!empty($_POST['firmantes_id']) && !empty($_POST['nombre']) && !empty($_POST['cargo'])) {
            $id = $_POST['firmantes_id'];
            $nombre = $_POST['nombre'];
            $cargo = $_POST['cargo'];

            //$firmante = editarFirmante($id, $nombre, $cargo);
            $firmantes = $firmante->update($id, $nombre, $cargo);
            if ($firmantes) {
                $alert = "success";
                $message = "Cambios Guardados";
                crearFlashMessage($alert, $message, '../firmantes/');
            } else {
                $alert = "warning";
                $message = "No se puede agragar ese cargo porque ya está siendo utilizado";
                crearFlashMessage($alert, $message, '../firmantes/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../firmantes/');
        }

    }

    if ($_POST['opcion'] == "eliminar") {
        if (!empty($_POST['firmantes_id'])){
            $id = $_POST['firmantes_id'];

            //$firmante = eliminarFirmante($id);
            $firmantes = $firmante->delete($id);

            if ($firmantes) {
                $alert = "success";
                $message = "Firmante Emilinado";
                crearFlashMessage($alert, $message, '../firmantes/');
            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert, $message, '../firmantes/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../firmantes/');
        }
    }

?>