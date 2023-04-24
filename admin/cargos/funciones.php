<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
$modulo = "cargos";

$alert = null;
$message = null;


//LISTAR USUARIOS
function getCargos()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `cargos` WHERE `band`= 1 ";
    $rows = $query->getAll($sql);
    return $rows;
}

$cargos = getCargos();

?>
