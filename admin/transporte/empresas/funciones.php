<?php
// start a session
session_start();
$raiz = true;
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Empresas.php";
$modulo = "empresas";
$alert = null;
$message = null;
$empresa = new Empresas();
$empresas = $empresa->getAll();

?>
