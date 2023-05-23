<?php
// start a session
session_start();
$raiz = true;
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/NominaCargo.php";
$modulo = "cargos";
$alert = null;
$message = null;

$cargos =  new NominaCargo();

$listarCargos = $cargos->getAll(1);

?>
