<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Persona.php";
require "../../model/Institucion.php";
require "../../model/Oficio.php";
$modulo = "oficios";
$alert = null;
$message = null;
$oficios = new Oficio();
$instituciones = new Institucion();
$personas = new Persona();


$listarOficios = $oficios->getAll(1);

?>