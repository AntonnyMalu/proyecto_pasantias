<?php 
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
$modulo = "casos";

$alert = null;
$message = null;


function getAllPerson()
{
    $row = null;
    $query = new Query();
    $sql = "SELECT * FROM `personas`;";
    $row = $query->getAll($sql);
    return $row;
}

function getPerson($id)
{
    $row = null;
    $query = new Query();
    $sql = "SELECT * FROM `personas` WHERE `id` = '$id'";
    $row = $query->getFirst($sql);
    if($row){
        return $row['personas'];
    }else{
        return "Cargo no definido";
    }
    
}

$personas = getAllPerson();

?>