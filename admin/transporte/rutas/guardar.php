<?php
// start a session
session_start();
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Rutas.php";
require "../../_layout/flash_message.php";

if ($_POST) {
    $rutas = new Rutas();
    if ($_POST['opcion'] == "guardar") {

        if (!empty($_POST['origen']) && !empty($_POST['contador'] && !empty($_POST['destino']))) {

            $origen = $_POST['origen'];
            $destino = $_POST['destino'];
            $contador = $_POST['contador'];

            $array = array();
            for ($i=1; $i <= $_POST['contador'] ; $i++) { 
                if(isset($_POST['ruta_'.$i]))
                {
                    $item = $_POST['ruta_'.$i];
                    array_push($array, $item);
                }
            }

            $ruta = json_encode($array);
            $save = $rutas->save(null, $origen, $destino, $ruta);

            if ($save) {
                $alert = "success";
                $message = "Ruta Agregada Exitosamente";
                crearFlashMessage($alert,$message, '../rutas/');
            } else {
                $alert = "warning";
                $message = "No se puede reguistrar porque la Ruta está duplicada";
                crearFlashMessage($alert, $message, '../rutas/');
            }
        } else {
            $alert = "danger";
            $message = "Faltan Datos";
            crearFlashMessage($alert,$message, '../rutas/');
        }
    }

    if ($_POST['opcion'] == "editar") {

        if (!empty($_POST['origen']) && !empty($_POST['contador'] && !empty($_POST['destino'])) && !empty($_POST['rutas_id'])) {

            $origen = $_POST['origen'];
            $destino = $_POST['destino'];
            $contador = $_POST['contador'];
            $id = $_POST['rutas_id'];

            $array = array();
            for ($i=1; $i <= $_POST['contador'] ; $i++) { 
                if(isset($_POST['ruta_'.$i]))
                {
                    $item = $_POST['ruta_'.$i];
                    array_push($array, $item);
                }
            }

            $ruta = json_encode($array);
            $save = $rutas->update($id, $origen, $destino, $ruta);

            if ($save) {
                $alert = "success";
                $message = "Ruta Actualizada.";
                crearFlashMessage($alert,$message, '../rutas/');
            } else {
                $alert = "warning";
                $message = "No se puede registrar porque la Ruta está duplicada";
                crearFlashMessage($alert, $message, '../rutas/');
            }
        } else {
            $alert = "danger";
            $message = "Faltan Datos";
            crearFlashMessage($alert,$message, '../rutas/');
        }
    }

    if ($_POST['opcion'] == "eliminar") {

        if (!empty($_POST['ruta_id'])){

            $id = $_POST['ruta_id'];
            $eliminarRutas = $rutas->delete($id);

            if ($eliminarRutas) {
                $alert = "success";
                $message = "Ruta Eliminada";
                crearFlashMessage($alert, $message, '../rutas/');
            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert, $message, '../rutas/');
            }
        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../rutas/');
        }
    }      
}
?>