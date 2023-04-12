<?php 
// start a session
session_start();
require "../flash_message.php";
?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Login</title>
        <?php require "../_layout/cargar_css.php"; ?>
    </head>
    <body style="background: url('../../img/free-background-green-yellow-1639359.jpg')">
        <?php require 'content.php'; ?>
        <?php require "../_layout/cargar_js.php"; ?>
    </body>

</html>