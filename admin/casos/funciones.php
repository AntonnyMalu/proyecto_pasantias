<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Persona.php";
require "../../model/Caso.php";
$modulo = "casos";
$alert = null;
$message = null;
$caso = new Caso();
$casos = $caso->getAll();
?>