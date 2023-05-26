<?php
// start a session
session_start();
$raiz = true;
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Choferes.php";
require "../../../model/Empresas.php";
require "../../../model/Vehiculos.php";
require "../../../model/VehiculoTipo.php";

$modulo = "choferes";
$alert = null;
$message = null;

$choferes = new Choferes();
$listarChoferes = $choferes->getAll(1);

$empresas = new Empresas();
$listarEmpresas = $empresas->getAll(1);

$vehiculos = new Vehiculos();
$listarVehiculos = $vehiculos->getAll(1);

$tipos = new VehiculoTipo();


?>
