<?php
// start a session
session_start();
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/NominaUbicaciones.php";
require "../../_layout/flash_message.php";

$ruta = '../ubicaciones/';


if ($_POST) {

    $ubicaciones = new NominaUbicaciones();
    $opcion = $_POST['opcion'];
    $id = $_POST['id'];

    if (!empty($_POST['tipo']) && !empty($_POST['nombre'])) {

        $tipo = $_POST['tipo'];
        $nombre = $_POST['nombre'];

        $data = [
            $tipo,
            $nombre
        ];

        $existe = $ubicaciones->existe('nombre', '=', $nombre, $id);

        if (!$existe) {
            if ($opcion == "guardar") {
                $guardar = $ubicaciones->save($data);
                if ($guardar) {
                    $alert = "success";
                    $message = "Ubicación Creada Exitosamente.";
                } else {
                    $alert = "danger";
                    $message = "Error en el modelo.";
                }
            }

            if ($opcion == "editar") {
                $editar = $ubicaciones->update($id, 'nombre', $nombre);
                $editar = $ubicaciones->update($id, 'tipo', $tipo);
                if ($editar) {
                    $alert = "success";
                    $message = "Ubicación Actualizada.";
                } else {
                    $alert = "danger";
                    $message = "Error en el modelo.";
                }
            }
        } else {
            $alert = "warning";
            $message = "No se puede registrar porque ya ese existe esa Ubicación";
        }
    } else {

        //eliminar
        if ($opcion == "eliminar") {

            $editar = $ubicaciones->update($id, 'band', 0);
            if ($editar) {
                $alert = "success";
                $message = "Ubicación Eliminada.";
            } else {
                $alert = "danger";
                $message = "Error en el modelo.";
            }
        } else {
            //faltan datos
            $alert = "warning";
            $message = "Faltan datos";
        }
    }
} else {
    $alert = "danger";
    $message = "Deben Enviarse los datos por Method POST";
}


crearFlashMessage($alert, $message, $ruta);
