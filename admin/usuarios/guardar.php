<?php
// start a session
session_start();
require "../seguridad.php";
require "../../model/User.php";
require "../_layout/flash_message.php";

if ($_POST) {
    $user = new User();
    //GUARDAR NUEVO USUARIO
    if ($_POST['opcion'] == "guardar") {

        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && isset($_POST['role'])) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            //$usuario = crearUsuario($name, $email, $password, $role);
            $usuario = $user->save($name, $email, $password, $role);

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

            //$usuario = editarUsuario($id, $name, $email, $password, $role);
             $usuario = $user->update($id,$name, $email, $password, $role);

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

        if (!empty($_POST['users_id'])){

            $id = $_POST['users_id'];

            //$usuario = eliminarUsuario($id);
            $usuario = $user->delete($id);

            if ($usuario) {
                $alert = "success";
                $message = "Usuario Emilinado";
                crearFlashMessage($alert,$message, '../usuarios/');
            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert,$message, '../usuarios/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert,$message, '../usuarios/');
        }
    }
}

?>