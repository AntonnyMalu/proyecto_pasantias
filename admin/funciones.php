<?php
// start a session
session_start();
$raiz_dashboard = true;
$modulo = "dashboard";
require "seguridad.php";
require_once "../model/Caso.php";
require_once "../model/Oficio.php";
require_once "../model/Persona.php";
require_once "../model/Institucion.php";
require_once "../model/Guia.php";
require_once "../model/Choferes.php";
require_once "../model/Vehiculos.php";
require_once "../model/Empresas.php";

$casos = new Caso();
$oficios = new Oficio();
$personas = new Persona();
$instituciones = new Institucion();
$guias = new Guia();
$choferes = new Choferes();
$vehiculos = new Vehiculos();
$empresas = new Empresas();

$countCasos = $casos->count(1);
$countOficios = $oficios->count(1);
$countPersonas = $personas->count(1);
$countInstituciones = $instituciones->count(1);
$countGuias = $guias->count(1);
$countChoferes = $choferes->count(1);
$countVehiculos = $vehiculos->count(1);
$countEmpresas = $empresas->count(1);
?>