<?php 
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Nomina.php";
$modulo = "nomina";
$alert = null;
$message = null;
$nomina = new Nomina();
$listar_nomina = $nomina->getAll();

?>