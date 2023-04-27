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
$oficio = new Oficio();
$oficios = $oficio->getAll();

?>