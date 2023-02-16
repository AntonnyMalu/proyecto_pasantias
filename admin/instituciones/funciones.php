<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
$modulo = "instituciones";

$alert = null;
$message = null;


//LISTAR USUARIOS
function getInstituciones()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `instituciones` WHERE `band`= 1 ";
    $rows = $query->getAll($sql);
    return $rows;
}

$instituciones = getInstituciones();

?>
