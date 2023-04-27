<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Persona.php";
$modulo = "personas";
$alert = null;
$message = null;
$persona = new Persona();
$personas = $persona->getAll();

?>
