<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../_layout/flash_message.php";

function eliminarNomina($id)
{
    $row = null;
    $query = new Query();

        $hoy = date("Y-m-d");
        $sql = "UPDATE `nomina` SET `band`='0' WHERE  `id`=$id;";
        $row = $query->save($sql);
        return $row;


}

if ($_POST) {

    if ($_POST['opcion'] == "eliminar") {

        if (!empty($_POST['nomina_id'])){

            $id = $_POST['nomina_id'];

            $persona = eliminarNomina($id);

            if ($persona) {
                $alert = "success";
                $message = "Trabajador Eliminado";
                crearFlashMessage($alert, $message, '../nomina/');
            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert, $message, '../nomina/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../nomina/');
        }

    }


        
}
?>