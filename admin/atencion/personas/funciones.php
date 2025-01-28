<?php
// start a session
session_start();
$raiz = true;
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Persona.php";
$modulo = "personas";
$alert = null;
$message = null;
$personas = new Persona();
$listarPersonas = $personas->getAll(1);

?>
