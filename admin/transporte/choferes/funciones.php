<?php
// start a session
session_start();
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Choferes.php";
require "../../../model/Empresas.php";
require "../../../model/Vehiculos.php";
require "../../../model/VehiculoTipo.php";

$modulo = "choferes";
$raiz = true;
$alert = null;
$message = null;

$choferes = new Choferes();
$listarChoferes = $choferes->getAll();

$empresas = new Empresas();
$listarEmpresas = $empresas->getAll();

$vehiculos = new Vehiculos();
$listarVehiculos = $vehiculos->getAll();

$tipos = new VehiculoTipo();


?>
