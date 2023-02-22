<?php 
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
$modulo = "oficios";

$alert = null;
$message = null;




function getAllInsti()
{
    $row = null;
    $query = new Query();
    $sql = "SELECT * FROM `instituciones`;";
    $row = $query->getAll($sql);
    return $row;
}

function getAllPerson()
{
    $row = null;
    $query = new Query();
    $sql = "SELECT * FROM `personas`;";
    $row = $query->getAll($sql);
    return $row;
}



$oficios = getAllInsti();
$personas = getAllPerson();



?>