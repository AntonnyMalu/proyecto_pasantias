<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Cargo.php";
require "../_layout/flash_message.php";


if ($_POST) {
    $cargo = new Cargo();
    if ($_POST['opcion'] == "guardar") {

        if (!empty($_POST['cargo'])) {

            $id = $_POST['cargos_id'];
            $carg = $_POST['cargo'];
            
            $cargos = $cargo->save($id, $carg);

            if ($cargos) {

                $alert = "success";
                $message = "Cargo Creado Exitosamente";
                crearFlashMessage($alert,$message, '../cargos/');


            } else {
                $alert = "warning";
                $message = "No se puede registrar porque ya ese cargo esta siendo utilizado";
                crearFlashMessage($alert, $message, '../cargos/');
            }


        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert,$message, '../cargos/');
        }

    }

    if ($_POST['opcion'] == "editar") {

        if (!empty($_POST['cargos_id']) && !empty($_POST['cargo'])) {

            $id = $_POST['cargos_id'];
            $carg = $_POST['cargo'];

            //$persona = editarPersona($id, $cedula, $nombre, $telefono, $direccion);
            $cargos = $cargo->update($id, $carg);


            if ($cargos) {


                $alert = "success";
                $message = "Cambios Guardados";
                crearFlashMessage($alert, $message, '../cargos/');


            } else {
                $alert = "warning";
                $message = "Cargo ya Registrado";
                crearFlashMessage($alert, $message, '../cargos/');
            }


        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../cargos/');
        }



    }

    if ($_POST['opcion'] == "eliminar") {

        if (!empty($_POST['cargos_id'])){

            $id = $_POST['cargos_id'];

            //$cargo = eliminarCargo($id);
            $cargos = $cargo->delete($id);

            if ($cargos) {
                $alert = "success";
                $message = "Cargo Eliminado";
                crearFlashMessage($alert, $message, '../cargos/');
            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert, $message, '../cargos/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../cargos/');
        }

    }


        
}
?>