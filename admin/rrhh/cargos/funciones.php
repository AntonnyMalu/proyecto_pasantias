<?php
// start a session
session_start();
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/NominaCargo.php";
$modulo = "cargos";
$raiz = true;
$alert = null;
$message = null;

$cargos =  new NominaCargo();

$listarCargos = $cargos->getAll(1);

?>
