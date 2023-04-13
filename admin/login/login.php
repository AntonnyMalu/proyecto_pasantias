<?php
// start a session
session_start();
require "../../mysql/Query.php";
require "../_layout/flash_message.php";
$condicion = false;
$message = null;
$alert = "warning";

if (isset($_SESSION['email'])) {
    header('location: ../');
}


 function getLogin($email, $password){
   
    $query = new Query();
    $row = null;
    $sql = "SELECT * FROM `users` WHERE  `email` = '$email' AND `band`= 1 ;";
    $row = $query->getFirst($sql);

    if($row){
    
        
            if (password_verify($password, $row['password'])){
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['band'] = $row['band'];
            return "redireccionar";
        }else{
            return "error_password";
        }

 }else{
    return "error_email";
 }

 }


 if($_POST){

    if($_POST['email'] && $_POST['password']){
        
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $resultado = getLogin($email, $pass);

        if($resultado == "redireccionar"){
            header('location: ../');
        }

        if($resultado == "error_password"){
            $condicion = true;
            $alert = "danger";
            $message = "Contraseña Incorrecta";
            crearFlashMessage($alert, $message, '../login');
        }

        if($resultado == "error_email"){
            $condicion = true;
            $alert = "warning";
            $message = "Email no encontrado";
            crearFlashMessage($alert, $message, '../login');
        }

    }else{
        $condicion = true;
        $alert = "info";
        $message =  "Todos los campos son obligatorios";
        crearFlashMessage($alert, $message, '../login');
    }

    

 }



?>