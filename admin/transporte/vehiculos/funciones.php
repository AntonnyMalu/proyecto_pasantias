<?php
// start a session
session_start();
$raiz = true;
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Empresas.php";
require "../../../model/Vehiculos.php";
require "../../../model/VehiculoTipo.php";
$modulo = "vehiculos";
$alert = null;
$message = null;

$empresas = new Empresas();
$listarEmpresas = $empresas->getAll();

$vehiculos = new Vehiculos();
$listarVehiculos = $vehiculos->getAll();

$tipos = new VehiculoTipo();

$listarTipos = $tipos->getAll();

?>
