<?php
// start a session
session_start();
require "../../mysql/Query.php";
$condicion = false;
$message = null;
$alert = "warning";

if (isset($_SESSION['email'])) {
    header('location: ../admin/');
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
        }

        if($resultado == "error_email"){
            $condicion = true;
            $alert = "warning";
            $message = "Email no encontrado";
        }

    }else{
        $condicion = true;
        $alert = "info";
        $message =  "Todos los campos son obligatorios";
    }

    

 }



?>

<!DOCTYPE html>
<html lang="es">

<head>

<title>Login</title>
<?php require "../_layout/cargar_css.php"; ?>
</head>

<body style="background: url('../../img/free-background-green-yellow-1639359.jpg')">

    <?php require 'container.php'; ?>

    <?php require "../_layout/cargar_js.php"; ?>
</body>

</html>