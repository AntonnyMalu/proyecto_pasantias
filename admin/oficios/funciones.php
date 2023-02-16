<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
$modulo = "oficios";
$alert = null;
$message = null;

function getOficios()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `oficios` WHERE `band`= 1; ";
    $rows = $query->getAll($sql);
    return $rows;
}


$oficios = getOficios();

?>