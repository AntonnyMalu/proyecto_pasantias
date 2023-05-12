<?php
// start a session
session_start();
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Empresas.php";
$modulo = "empresas";
$raiz = true;
$alert = null;
$message = null;
$empresa = new Empresas();
$empresas = $empresa->getAll();

?>
