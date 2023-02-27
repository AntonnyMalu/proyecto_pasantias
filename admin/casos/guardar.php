<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../flash_message.php";

//USUARIOS NUEVOS
function crearCaso($persona_id, $fecha, $hora, $donativo, $tipo, $status, $observacion)
{
    $row = null;
    $query = new Query();
    
        $hoy = date("Y-m-d");
        $sql = "INSERT INTO `casos` (`personas_id`, `fecha`, `hora`, `donativo`, `tipo`, `status`, `observacion`, `created_at`) VALUES ('$persona_id', '$fecha', '$hora', '$donativo', '$tipo', '$status', '$observacion', '$hoy');";
        $row = $query->save($sql);
        return $row;

}

function editarStatus($id,$status)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");


    $sql = "UPDATE `casos` SET `status`='$status', `updated_at`='$hoy' WHERE  `id`='$id';";
        $row = $query->save($sql);
        return $row;

}



//ELIMINAR USUARIOS
function eliminarCaso($id)
{
    $row = null;
    $query = new Query();


    $hoy = date("Y-m-d");
        $sql = "UPDATE `casos` SET `band`='0', `updated_at`='$hoy' WHERE  `id`=$id;";
        $row = $query->save($sql);
        return $row;


}

if ($_POST) {
    //GUARDAR NUEVO USUARIO
    if ($_POST['opcion'] == "guardar") {

        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && isset($_POST['role'])) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $usuario = crearUsuario($name, $email, $password, $role);

            if ($usuario) {

                $alert = "success";
                $message = "Usuario Creado Exitosamente";
                crearFlashMessage($alert,$message, '../usuarios/');


            } else {
                $alert = "warning";
                $message = "Email ya registrado";
                crearFlashMessage($alert, $message, '../usuarios/');
            }


        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert,$message, '../usuarios/');
        }

    }

    //EDITAR USUARIO
    if ($_POST['opcion'] == "editar") {

        if (!empty($_POST['users_id']) && !empty($_POST['name']) && !empty($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])) {


            $id = $_POST['users_id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $usuario = editarUsuario($id, $name, $email, $password, $role);

            if ($usuario) {
                $alert = "success";
                $message = "Cambios Guardados";
                crearFlashMessage($alert,$message, '../usuarios/');
            } else {

                $alert = "warning";
                $message = "Email ya registrado";
                crearFlashMessage($alert,$message, '../usuarios/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert,$message, '../usuarios/');
        }

    }

//ELIMINAR USUARIO
    if ($_POST['opcion'] == "eliminar") {

        if (!empty($_POST['casos_id'])){

            $id = $_POST['casos_id'];

            $usuario = eliminarCaso($id);

            if ($usuario) {
                $alert = "success";
                $message = "Usuario Emilinado";
                crearFlashMessage($alert,$message, '../casos/');
            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert,$message, '../casos/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert,$message, '../casos/');
        }

    }
    if ($_POST['opcion'] == "cambiar_status") {
        $id = $_POST['casos_id'];
        $status = $_POST['casos_status'];
        
        $cambiar = editarStatus($id, $status);
        if ($cambiar) {
            $alert = "success";
            $message = "Estatus Actualizado";
            crearFlashMessage($alert,$message, '../casos/');
        } else {
            $alert = "warning";
            $message = "Error";
            crearFlashMessage($alert,$message, '../casos/');
        }

    }

}



?>