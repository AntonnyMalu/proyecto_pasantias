<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Institucion.php";
$modulo = "instituciones";
$alert = null;
$message = null;
$institucion = new Institucion();
$instituciones = $institucion->getAll();

?>
