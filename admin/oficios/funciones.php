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
            "nombre" => 'NO DEFINIDO'
        ];
        return $rows;
    }
    
}

function getPersona($id)
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `personas` WHERE `id`= '$id'; ";
    $rows = $query->getfirst($sql);
    
        return $rows;
    
    
}


$oficios = getOficios();

?>