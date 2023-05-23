<?php 
// start a session
session_start();
$raiz = true;
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Nomina.php";
require "../../../model/NominaCargo.php";
require "../../../model/NominaUbicaciones.php";
$modulo = "nomina";

$alert = null;
$message = null;

$nominas = new Nomina();
$cargos = new NominaCargo();
$ubicaciones = new NominaUbicaciones();


$listarNomina = $nominas->getAll(1);
$listarCargos = $cargos->getAll(1);
$listarAdministrativa = $ubicaciones->getList('tipo', '=', "administrativa",1);
$listarGeografica = $ubicaciones->getList('tipo', '=', 'geografica',1);

?>