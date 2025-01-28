<?php
// start a session
session_start();
$raiz = true;
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Caso.php";
require "../../../model/Persona.php";

$modulo = "casos";
$alert = null;
$message = null;
$casos = new Caso();
$personas = new Persona();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $getCaso = $casos->find($id);
    if (!$getCaso) {
        require "../_layout/flash_message.php";
        $alert = "warning";
        $message = "ID no encontrado.";
        crearFlashMessage($alert, $message, '../casos/');
    }
}else{
    $getCaso = null;
    $id = null;
}

$listarCaso = $casos->getAll(1);
$listarPersona = $personas->getAll(1);
