<?php
// start a session
session_start();
$raiz = true;
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Institucion.php";
$modulo = "instituciones";
$alert = null;
$message = null;
$instituciones = new Institucion();
$listarInstituciones = $instituciones->getAll(1);

?>
