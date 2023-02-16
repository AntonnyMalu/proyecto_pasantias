<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
$modulo = "firmantes";

$alert = null;
$message = null;


//LISTAR USUARIOS
function getFirmantes()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `firmantes` WHERE `band`= 1 ";
    $rows = $query->getAll($sql);
    return $rows;
}

$firmantes = getFirmantes();

?>
