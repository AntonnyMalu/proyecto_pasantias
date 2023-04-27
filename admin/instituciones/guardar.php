<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Institucion.php";
require "../_layout/flash_message.php";

if ($_POST) {
    $insti = new Institucion();
    if ($_POST['opcion'] == "guardar") {

        if (!empty($_POST['nombre']) && !empty($_POST['direccion'])) {

            $rif = $_POST['rif'];
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];

            if(empty($rif))
            {
                $rif = $insti->ritTemporal();
            }

            //$institucion = crearInstitucion($rif, $nombre, $telefono, $direccion);
            $institucion = $insti->save($rif, $nombre, $telefono, $direccion);

            if ($institucion) {

                $alert = "success";
                $message = "Institución Agregada Exitosamente";
                crearFlashMessage($alert,$message, '../instituciones/');


            } else {
                $alert = "warning";
                $message = "No se puede reguistrar porque ya ese cargo esta siendo utilizado";
                crearFlashMessage($alert, $message, '../instituciones/');
            }


        } else {
            $alert = "danger";
            $message = "Faltan Datos";
            crearFlashMessage($alert,$message, '../instituciones/');
        }

    }

    if ($_POST['opcion'] == "editar") {

        if (!empty($_POST['instituciones_id']) && !empty($_POST['rif']) && !empty($_POST['nombre']) && !empty($_POST['direccion'])) {

            $id = $_POST['instituciones_id'];
            $rif = $_POST['rif'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];

            //$institucion = editarInstitucion($id, $rif, $nombre, $telefono, $direccion);
            $institucion = $insti->update($id, $rif, $nombre, $telefono, $direccion);


            if ($institucion) {


                $alert = "success";
                $message = "Cambios Guardados";
                crearFlashMessage($alert, $message, '../instituciones/');


            } else {
                $alert = "warning";
                $message = "Institucion ya Registrada";
                crearFlashMessage($alert, $message, '../instituciones/');
            }


        } else {
            $alert = "danger";
            $message = "Faltan Datos";
            crearFlashMessage($alert, $message, '../instituciones/');
        }



    }

    if ($_POST['opcion'] == "eliminar") {

        if (!empty($_POST['instituciones_id'])){

            $id = $_POST['instituciones_id'];

            //$institucion = eliminarInstitucion($id);
            $institucion = $insti->delete($id);

            if ($institucion) {
                $alert = "success";
                $message = "Institucion Eliminada";
                crearFlashMessage($alert, $message, '../instituciones/');
            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert, $message, '../instituciones/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../instituciones/');
        }

    }


        
}
?>