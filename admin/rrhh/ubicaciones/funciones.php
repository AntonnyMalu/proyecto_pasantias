<?php
// start a session
session_start();
$raiz = true;
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/NominaUbicaciones.php";
$modulo = "ubicaciones";
$alert = null;
$message = null;

$ubicaciones =  new NominaUbicaciones();

$listarUbicaciones = $ubicaciones->getAll(1);

?>
