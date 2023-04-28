<?php 
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Nomina.php";
require "../../model/Cargo.php";
$modulo = "nomina";
$alert = null;
$message = null;
$nomina = new Nomina();
$listar_nomina = $nomina->getAll();

function getCargo($id)
{
    $cargo = new Cargo();
    $row = $cargo->getFirst($id);
    if($row){
        return $row['cargo'];
    }else{
        return "NO DEFINIDO";
    }
}

?>