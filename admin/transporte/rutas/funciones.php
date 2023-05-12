<?php
// start a session
session_start();
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Rutas.php";
require "../../../model/RutasTerritorio.php";
$modulo = "rutas";
$raiz = true;
$alert = null;
$message = null;

$territorios = new RutasTerritorio();
$listarTerritorios = $territorios->getAll();
$rutas = new Rutas();
$listarRutas = $rutas->getAll();

?>
