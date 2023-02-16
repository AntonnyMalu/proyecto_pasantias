<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
$modulo = "casos";
$alert = null;
$message = null;

function getCasos()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `casos` WHERE `band`= 1; ";
    $rows = $query->getAll($sql);
    return $rows;
}


$casos = getCasos();

?>