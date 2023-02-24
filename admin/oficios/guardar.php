<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../flash_message.php";

function eliminarOficio($id)
{
    $row = null;
    $query = new Query();

        $hoy = date("Y-m-d");
        $sql = "UPDATE `oficios` SET `band`='0' WHERE  `id`=$id;";
        $row = $query->save($sql);
        return $row;


}



if ($_POST) {

    if ($_POST['opcion'] == "eliminar") {

        if (!empty($_POST['oficios_id'])){

            $id = $_POST['oficios_id'];

            $persona = eliminarOficio($id);

            if ($persona) {
                $alert = "success";
                $message = "Oficio Eliminado";
                crearFlashMessage($alert, $message, '../oficios/');
            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert, $message, '../oficios/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../oficios/');
        }

    }


        
}
?>