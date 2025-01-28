<?php
// start a session
session_start();
$raiz = true;
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Persona.php";
require "../../../model/Caso.php";
$modulo = "casos";
$alert = null;
$message = null;
$casos = new Caso();
$personas = new Persona();

$listarCasos = $casos->getAll(1);
?>