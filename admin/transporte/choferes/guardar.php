<?php
// start a session
session_start();
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Choferes.php";
require "../../_layout/flash_message.php";

if ($_POST) {
    $choferes = new Choferes();
    if ($_POST['opcion'] == "guardar") {

        if (!empty($_POST['empresas_id']) && !empty($_POST['cedula']) && !empty($_POST['nombre']) && !empty($_POST['telefono'])) {

            $empresas_id = $_POST['empresas_id'];
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $vehiculos_id = $_POST['vehiculos_id'];

            $guardarChoferes = $choferes->save($id, $empresas_id, $vehiculos_id, $cedula, $nombre, $telefono);

            if ($guardarChoferes) {

                $alert = "success";
                $message = "Chofer Agregado Exitosamente";
                crearFlashMessage($alert,$message, '../choferes/');


            } else {
                $alert = "warning";
                $message = "Chofer ya Registrado";
                crearFlashMessage($alert, $message, '../choferes/');
            }


        } else {
            $alert = "danger";
            $message = "Faltan Datos";
            crearFlashMessage($alert,$message, '../choferes/');
        }

    }

    if ($_POST['opcion'] == "editar") {

        if (!empty($_POST['choferes_id']) && !empty($_POST['empresas_id']) && !empty($_POST['cedula']) && !empty($_POST['nombre']) && !empty($_POST['telefono'])) {

            $id = $_POST['choferes_id'];
            $empresas_id = $_POST['empresas_id'];
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $vehiculos_id = $_POST['vehiculos_id'];

            $editarChoferes = $choferes->update($id, $empresas_id, $vehiculos_id, $cedula, $nombre, $telefono);

            if ($editarChoferes) {


                $alert = "success";
                $message = "Cambios Guardados";
                crearFlashMessage($alert, $message, '../choferes/');


            } else {
                $alert = "warning";
                $message = "Chofer ya Registrado";
                crearFlashMessage($alert, $message, '../choferes/');
            }


        } else {
            $alert = "danger";
            $message = "Faltan Datos";
            crearFlashMessage($alert, $message, '../choferes/');
        }



    }

    if ($_POST['opcion'] == "eliminar") {

        if (!empty($_POST['choferes_id'])){

            $id = $_POST['choferes_id'];
            
            $eliminarChoferes = $choferes->delete($id);

            if ($eliminarChoferes) {
                $alert = "success";
                $message = "Chofer Eliminado";
                crearFlashMessage($alert, $message, '../choferes/');
            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert, $message, '../choferes/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../choferes/');
        }

    }


        
}
?>