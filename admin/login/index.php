<?php 
// start a session
session_start();
require "../_layout/flash_message.php";
$modulo = "login";
?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Login</title>
        <?php require "../_layout/cargar_css.php"; ?>
    </head>
    <body style="background: url('../../img/free-background-green-yellow-1639359.jpg'); background-repeat: no-repeat;
                 background-attachment: fixed; background-size: cover;">
        <?php require 'content.php'; ?>
        <?php require "../_layout/cargar_js.php"; ?>
    </body>

</html>