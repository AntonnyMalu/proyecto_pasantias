<?php
// start a session
session_start();
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Empresas.php";
require "../../_layout/flash_message.php";

if ($_POST) {
    $empre = new Empresas();
    if ($_POST['opcion'] == "guardar") {

        if (!empty($_POST['rif']) &&!empty($_POST['nombre'])) {

            $rif = $_POST['rif'];
            $nombre = $_POST['nombre'];
            $responsable = $_POST['responsable'];
            $telefono = $_POST['telefono'];

            $empresa = $empre->save($id, $rif, $nombre, $responsable, $telefono);

            if ($empresa) {

                $alert = "success";
                $message = "Empresa Agregada Exitosamente";
                crearFlashMessage($alert,$message, '../empresas/');


            } else {
                $alert = "warning";
                $message = "No se puede registrar porque esa Empresa ya está Registrada";
                crearFlashMessage($alert, $message, '../empresas/');
            }


        } else {
            $alert = "danger";
            $message = "Faltan Datos";
            crearFlashMessage($alert,$message, '../empresas/');
        }

    }

    if ($_POST['opcion'] == "editar") {

        if (!empty($_POST['empresas_id']) && !empty($_POST['rif']) && !empty($_POST['nombre'])) {

            $id = $_POST['empresas_id'];
            $rif = $_POST['rif'];
            $nombre = $_POST['nombre'];
            $responsable = $_POST['responsable'];
            $telefono = $_POST['telefono'];
            
            $empresa = $empre->update($id, $rif, $nombre, $responsable, $telefono);

            if ($empresa) {
                $alert = "success";
                $message = "Cambios Guardados";
                crearFlashMessage($alert, $message, '../empresas/');
            } else {
                $alert = "warning";
                $message = "Empresa ya Registrada";
                crearFlashMessage($alert, $message, '../empresas/');
            }

        } else {
            $alert = "danger";
            $message = "Faltan Datos";
            crearFlashMessage($alert, $message, '../empresas/');
        }
    }

    if ($_POST['opcion'] == "eliminar") {

        if (!empty($_POST['empresas_id'])){

            $id = $_POST['empresas_id'];
            
            $empresa = $empre->delete($id);

            if ($empresa) {
                $alert = "success";
                $message = "Empresa Eliminada";
                crearFlashMessage($alert, $message, '../empresas/');
            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert, $message, '../empresas/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../empresas/');
        }

    }


        
}
?>