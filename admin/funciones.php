<?php
// start a session
session_start();
$modulo = "dashboard";
require "seguridad.php";
require "../mysql/Query.php";
//CONTAR USUARIOS
function getUsuarios()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT COUNT(*) total FROM `personas` WHERE `band`= 1 ";
    $rows = $query->getFirst($sql);
    return $rows['total'];
}

function getGacetas()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT COUNT(*) total FROM `casos` WHERE `band` = 1;";
    $rows = $query->getFirst($sql);
    return $rows['total'];
}

function getSesiones()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT COUNT(*) total FROM `oficios` WHERE `band`= 1 ";
    $rows = $query->getFirst($sql);
    return $rows['total'];
}

function getResoluciones()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT COUNT(*) total FROM `personas` WHERE `band`= 1; ";
    $rows = $query->getFirst($sql);
    return $rows['total'];
}

$usuarios = getUsuarios();
$gacetas = getGacetas();
$sesiones = getSesiones();
$resoluciones = getResoluciones();

?>