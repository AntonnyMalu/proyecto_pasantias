<?php
// start a session
session_start();
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/NominaUbicaciones.php";
$modulo = "ubicaciones";
$raiz = true;
$alert = null;
$message = null;

$ubicaciones =  new NominaUbicaciones();

$listarUbicaciones = $ubicaciones->getAll(1);

?>
