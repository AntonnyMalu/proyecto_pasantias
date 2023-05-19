<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/User.php";
$modulo = "usuarios";

$alert = null;
$message = null;

$users = new User();
$listarUsers = $users->getAll(1);


?>
