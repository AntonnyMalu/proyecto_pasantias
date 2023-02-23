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


function getcaso($id)
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `casos` WHERE `id` = $id;";
    $rows = $query->getFirst($sql);
    if(!$rows){
        header('location: ../casos');
    }else{
        return $rows;
    }
    
}
function getPerson($id)
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `personas` WHERE `id` = $id;";
    $rows = $query->getFirst($sql);
    if(!$rows){
        header('location: ../casos');
    }else{
        return $rows;
    }
    
}

if ($_GET)
{
    if(!empty($_GET['id'])){
        $caso_id = $_GET['id'];
        $get_caso = getCaso($caso_id);
        $get_persona = getPerson($get_caso['personas_id']);
        
    }else{
        $caso_id = null;
        $get_person = null;
    }
}else{
    $caso_id = null;
}

$personas = getAllPerson();

?>