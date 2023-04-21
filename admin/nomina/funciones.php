<?php 
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
$modulo = "nomina";

$alert = null;
$message = null;




function getNomina()
{
    $row = null;
    $query = new Query();
    $sql = "SELECT * FROM `nomina` WHERE `band` = 1;";
    $row = $query->getAll($sql);
    return $row;
}

$listar_nomina = getNomina();




?>