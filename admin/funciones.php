<?php
// start a session
session_start();
$modulo = "dashboard";
require "seguridad.php";
require "../mysql/Query.php";
//CONTAR USUARIOS
function getCasos()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT COUNT(*) total FROM `casos` WHERE `band`= 1 ";
    $rows = $query->getFirst($sql);
    return $rows['total'];
}

function getOficios()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT COUNT(*) total FROM `oficios` WHERE `band` = 1;";
    $rows = $query->getFirst($sql);
    return $rows['total'];
}

function getPersonas()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT COUNT(*) total FROM `personas` WHERE `band`= 1 ";
    $rows = $query->getFirst($sql);
    return $rows['total'];
}

function getInstituciones()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT COUNT(*) total FROM `instituciones` WHERE `band`= 1; ";
    $rows = $query->getFirst($sql);
    return $rows['total'];
}

$casos = getCasos();
$oficios = getOficios();
$personas = getPersonas();
$instituciones = getInstituciones();

?>