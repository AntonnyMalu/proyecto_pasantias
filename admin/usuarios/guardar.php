<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/User.php";
require "../_layout/flash_message.php";

$ruta = '../usuarios';
if ($_POST) {
    //PROCESAR
    $users = new User();
    $opcion = $_POST['opcion'];
    $id = $_POST['id'];
    $hoy = date('Y-m-d');
    $password_hash = null;

    if (
        !empty($_POST['name']) &&
        !empty($_POST['email']) &&
        isset($_POST['password']) &&
        !empty($_POST['role'])
    ) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $confirmar = $_POST['confirmar'];
        if (!empty($password)) {
            if ($password == $confirmar) {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
            }else{
                $alert = "warning";
                $message = "Las contraseñas no coinciden.";
                crearFlashMessage($alert,$message, $ruta);
            }
           
        }

        $data = [
            $email,
            $password_hash,
            $name,
            $role,
            $hoy
        ];

        $existe = $users->existe('email', '=', $email, $id, 1);

        if (!$existe) {
            if ($opcion == "guardar") {
                if (!is_null($password_hash)) {
                    $guardar = $users->save($data);
                    if ($guardar) {
                        $alert = "success";
                        $message = "Usuario Registrado Exitosamente";
                    }
                } else {
                    $alert = "warning";
                    $message = "Faltan datos al Crear en usuario";
                }
            }


            if ($opcion == "editar") {
                $editar = $users->update($id, 'email', $email);
                $editar = $users->update($id, 'name', $name);
                $editar = $users->update($id, 'role', $role);
                if(!is_null($password_hash)){
                    $editar = $users->update($id, 'password', $password_hash);
                }
                if($editar){
                    $alert = "success";
                    $message = "Cambios Guardados";
                }
            }
        } else {
            $alert = "warning";
            $message = "No se puede Registrat porque el Email ya esta Registrado.";
        }
    } else {
        if ($opcion == "eliminar" && !empty($id)) {
            $eliminar = $users->delete($id);
            if($eliminar){
                $alert = "success";
                $message = "Eliminado Exitosamente.";
            }
        }else{
            $alert = "warning";
            $message = "Faltan Datos.";
        }
    }
} else {
    $alert = "danger";
    $message = "Debes Enviar los Datos por el Metodo POST.";
}
crearFlashMessage($alert,$message, $ruta);