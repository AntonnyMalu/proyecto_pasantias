<?php
// start a session
session_start();
$raiz = true;
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Guia.php";
require "../../../model/GuiaTipo.php";
require "../../../model/GuiaCargamento.php";
require "../../../model/Vehiculos.php";
require "../../../model/VehiculoTipo.php";
require "../../../model/Choferes.php";
require "../../../model/RutasTerritorio.php";
$modulo = "guias";
$alert = null;
$message = null;

$num_init = 272;

$tiposGuias = new GuiaTipo();
$guias = new Guia();
$cargamento = new GuiaCargamento();
$vehiculos = new Vehiculos(); 
$tiposVehiculos = new VehiculoTipo();
$choferes = new Choferes();
$territorios = new RutasTerritorio();
$query = new Query();


$listarTiposGuias = $tiposGuias->getAll();
$listarGuias = $guias->getAll(1);
$listarVehiculos = $vehiculos->getAll();
$listarChoferes = $choferes->getAll();
$listarTerritorios = $territorios->getAll();

$countGuias = $guias->count();
$year = date("Y");
$suma = $num_init + $countGuias + 1;
$codigo_nuevo = $query->cerosIzquierda($suma, 5)."-".$year; 

?>
