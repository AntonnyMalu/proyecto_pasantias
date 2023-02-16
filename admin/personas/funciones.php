<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
$modulo = "personas";

$alert = null;
$message = null;


//LISTAR USUARIOS
function getPersonas()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `personas` WHERE `band`= 1 ";
    $rows = $query->getAll($sql);
    return $rows;
}

$personas = getPersonas();

?>
