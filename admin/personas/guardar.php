<?php
// start a session
session_start();
require "../seguridad.php";
require "../../model/Persona.php";
require "../_layout/flash_message.php";


if ($_POST) {
    $persona = new Persona();
    if ($_POST['opcion'] == "guardar") {

        if (!empty($_POST['cedula']) && !empty($_POST['nombre']) && !empty($_POST['direccion'])) {

            $id = $_POST['input_personas_id'];
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];

            //$persona = crearPersona($id, $cedula, $nombre, $telefono, $direccion);
            $persona = $persona->save($id, $cedula, $nombre, $telefono, $direccion);

            if ($persona) {
                $alert = "success";
                $message = "Persona Agregada Exitosamente";
                crearFlashMessage($alert,$message, '../personas/');

            } else {
                $alert = "warning";
                $message = "No se puede reguistrar porque ya ese cargo esta siendo utilizado";
                crearFlashMessage($alert, $message, '../personas/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert,$message, '../personas/');
        }
    }

    if ($_POST['opcion'] == "editar") {

        if (!empty($_POST['personas_id']) && !empty($_POST['cedula']) && !empty($_POST['nombre']) && !empty($_POST['direccion'])) {

            $id = $_POST['personas_id'];
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];

            //$persona = editarPersona($id, $cedula, $nombre, $telefono, $direccion);
            $persona = $persona->update($id, $cedula, $nombre, $telefono, $direccion);

            if ($persona) {
                $alert = "success";
                $message = "Cambios Guardados";
                crearFlashMessage($alert, $message, '../personas/');

            } else {
                $alert = "warning";
                $message = "Persona ya Registrada";
                crearFlashMessage($alert, $message, '../personas/');
            }
        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../personas/');
        }
    }

    if ($_POST['opcion'] == "eliminar") {

        if (!empty($_POST['personas_id'])){

            $id = $_POST['personas_id'];

            //$persona = eliminarPersona($id);
            $persona = $persona->delete($id);

            if ($persona) {
                $alert = "success";
                $message = "Persona Eliminada";
                crearFlashMessage($alert, $message, '../personas/');
            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert, $message, '../personas/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../personas/');
        }

    }


        
}
?>