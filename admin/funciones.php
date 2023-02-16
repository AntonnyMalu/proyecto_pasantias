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
    $sql = "SELECT COUNT(*) total FROM `users` WHERE `band`= 1 ";
    $rows = $query->getFirst($sql);
    return $rows['total'];
}

function getGacetas()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT COUNT(*) total FROM `gacetas` WHERE `band` = 1;";
    $rows = $query->getFirst($sql);
    return $rows['total'];
}

function getSesiones()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT COUNT(*) total FROM `sesiones` WHERE `band`= 1 ";
    $rows = $query->getFirst($sql);
    return $rows['total'];
}

function getResoluciones()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT COUNT(*) total FROM `resoluciones` WHERE `band`= 1; ";
    $rows = $query->getFirst($sql);
    return $rows['total'];
}

$usuarios = getUsuarios();
$gacetas = 1; //getGacetas();
$sesiones = 2; //getSesiones();
$resoluciones = 3;//getResoluciones();

?>