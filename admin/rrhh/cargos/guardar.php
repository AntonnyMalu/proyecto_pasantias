<?php
// start a session
session_start();
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/NominaCargo.php";
require "../../_layout/flash_message.php";

$ruta = '../cargos/';


if ($_POST) {

    $cargos = new NominaCargo();
    $opcion = $_POST['opcion'];
    $id = $_POST['cargos_id'];

    if (!empty($_POST['cargo'])) {

        $cargo = $_POST['cargo'];

        $data = [
            $cargo
        ];

        $existe = $cargos->existe('cargo', '=', $cargo, $id);

        if (!$existe) {
            if ($opcion == "guardar") {
                $guardar = $cargos->save($data);
                if ($guardar) {
                    $alert = "success";
                    $message = "Cargo Creado Exitosamente.";
                } else {
                    $alert = "danger";
                    $message = "Error en el modelo.";
                }
            }

            if ($opcion == "editar") {
                $editar = $cargos->update($id, 'cargo', $cargo);
                if ($editar) {
                    $alert = "success";
                    $message = "Cargo Actualizado.";
                } else {
                    $alert = "danger";
                    $message = "Error en el modelo.";
                }
            }
        } else {
            $alert = "warning";
            $message = "No se puede registrar porque ya ese cargo esta siendo utilizado";
        }
    } else {

        //eliminar
        if ($opcion == "eliminar") {

            $editar = $cargos->update($id, 'band', 0);
            if ($editar) {
                $alert = "success";
                $message = "Cargo Actualizado.";
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
