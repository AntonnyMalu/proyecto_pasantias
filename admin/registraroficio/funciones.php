<?php 
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Oficio.php";
require "../../model/Institucion.php";
require "../../model/Persona.php";
$modulo = "oficios";

$alert = null;
$message = null;

if ($_GET)
{
    $oficio = new Oficio();
    $persona = new Persona();
    $institucion = new Institucion();
    if(!empty($_GET['id'])){
        $oficio_id = $_GET['id'];
        $get_oficio = $oficio->getFirst($oficio_id);
        $get_persona = $persona->getFirst($get_oficio['personas_id']);
        if(!$get_persona || !$get_oficio){
            header('location: ../oficios');
            exit;
        }
        $get_institucion = $institucion->getFirst($get_oficio['instituciones_id']);
        if(!$get_institucion){
            $get_institucion = [
                "rif" => 'NO DEFINIDO',
                "nombre" => 'NO DEFINIDO',
                 "telefono" => 'NO DEFINIDO',
                 "direccion" => 'NO DEFINIDO',
                 "id" => null
            ];
        }
    }else{
        $oficio_id = null;
        $get_person = null;
        $get_institucion = null;
    }
}else{
    $oficio_id = null;
    $get_institucion = null;
}

//$intituciones = getAllInsti();
$institucion = new Institucion();
$intituciones = $institucion->getAll();
//$personas = getAllPerson();
$persona = new Persona();
$personas = $persona->getAll();
?>