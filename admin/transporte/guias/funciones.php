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
require "../../../model/Parametro.php";
$modulo = "guias";
$alert = null;
$message = null;

$num_init = 1;

$tiposGuias = new GuiaTipo();
$guias = new Guia();
$cargamento = new GuiaCargamento();
$vehiculos = new Vehiculos(); 
$tiposVehiculos = new VehiculoTipo();
$choferes = new Choferes();
$territorios = new RutasTerritorio();
$query = new Query();
$parametros = new Parametro();

$existeParametro = $parametros->existe('nombre', '=', 'guias_num_init');
if ($existeParametro) {
    $num_init = intval($existeParametro['valor']);
}

$listarTiposGuias = $tiposGuias->getAll();
$listarGuias = $guias->getAll(1);
$listarVehiculos = $vehiculos->getAll(1);
$listarChoferes = $choferes->getAll(1);
$listarTerritorios = $territorios->getAll();

$countGuias = $guias->count(1);
$year = date("Y");
$codigo_nuevo = $query->cerosIzquierda($num_init, 5)."-".$year; 

?>
