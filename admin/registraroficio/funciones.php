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

function getInstituciones($id)
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `instituciones` WHERE `id`= '$id'; ";
    $rows = $query->getfirst($sql);
    if($rows){
        return $rows;
    }else{
        $rows = [
            "rif" => 'NO DEFINIDO',
            "nombre" => 'NO DEFINIDO',
             "telefono" => 'NO DEFINIDO',
             "direccion" => 'NO DEFINIDO'
        ];
        return $rows;
    }
    
}

function getOficio($id)
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `oficios` WHERE `id` = $id;";
    $rows = $query->getFirst($sql);
    if(!$rows){
        header('location: ../oficios');
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
        header('location: ../oficios');
    }else{
        return $rows;
    }
    
}



if ($_GET)
{
    if(!empty($_GET['id'])){
        $oficio_id = $_GET['id'];
        $get_oficio = getOficio($oficio_id);
        $get_persona = getPerson($get_oficio['personas_id']);
        $get_institucion = getInstituciones($get_oficio['instituciones_id']);
    }else{
        $oficio_id = null;
        $get_person = null;
        $get_institucion = null;
    }
}else{
    $oficio_id = null;
    $get_institucion = null;
}



$intituciones = getAllInsti();
$personas = getAllPerson();



?>