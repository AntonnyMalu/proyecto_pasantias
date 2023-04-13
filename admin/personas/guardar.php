<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../_layout/flash_message.php";

function existePersona($cedula, $id=null){
    $row = null;
    $query = new Query();
    
    if(!$id){
        $sql1 = "SELECT * FROM `personas` WHERE `cedula` = '$cedula' AND `band` = '1'";
    }else{
        $sql1 = "SELECT * FROM `personas` WHERE `cedula` = '$cedula' AND `band` = '1' AND `id` != '$id'";
    }
    $exite = $query->getFirst($sql1);

    if($exite){
        return true;
    }else{
        return false;
    }

}

function eliminarPersona($id)
{
    $row = null;
    $query = new Query();
    $sql1 = "SELECT * FROM `personas` WHERE `id` = $id;";
    $persona = $query->getFirst($sql1);

    if ($persona) {


        $hoy = date("Y-m-d");
        $sql = "UPDATE `personas` SET `band`='0', `updated_at`='$hoy' WHERE  `id`=$id;";
        $row = $query->save($sql);
        return $row;

    } else {

        return false;

    }


}


function crearPersona($id, $cedula, $nombre, $telefono, $direccion)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");
    $existe = existePersona($cedula, $id);
    if(!$existe){
        $sql = "INSERT INTO`personas` (`cedula`, `nombre`, `telefono`, `direccion`, `created_at`) VALUES ('$cedula', '$nombre', '$telefono', '$direccion', '$hoy');";
        $row = $query->save($sql);
        return $row;
    }else{
        return false;
    }

}

function editarPersona($id, $cedula, $nombre, $telefono, $direccion)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");
    $existe = existePersona($cedula, $id);
    if(!$existe){
        $sql = "UPDATE `personas` SET `cedula`='$cedula', `nombre`='$nombre', `telefono`='$telefono', `direccion`='$direccion', `updated_at`='$hoy' WHERE `id`=$id;";
        $row = $query->save($sql);
        return $row;
    }else{
        return false;
    }

}

if ($_POST) {

    if ($_POST['opcion'] == "guardar") {

        if (!empty($_POST['cedula']) && !empty($_POST['nombre']) && !empty($_POST['direccion'])) {

            $id = $_POST['input_personas_id'];
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];

            $persona = crearPersona($id, $cedula, $nombre, $telefono, $direccion);

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

            $persona = editarPersona($id, $cedula, $nombre, $telefono, $direccion);


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

            $persona = eliminarPersona($id);

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