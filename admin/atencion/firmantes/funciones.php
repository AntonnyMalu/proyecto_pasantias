<?php
// start a session
session_start();
$raiz = 'true';
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Firmante.php";
$modulo = "firmantes";
$alert = null;
$message = null;
$firmantes = new Firmante();
$listarFirmantes = $firmantes->getAll(1);
?>
