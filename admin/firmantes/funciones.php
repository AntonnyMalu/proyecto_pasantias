<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Firmante.php";
$modulo = "firmantes";
$alert = null;
$message = null;
$firmante = new Firmante();
$firmantes = $firmante->getAll();
?>
