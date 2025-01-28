<?php
// start a session
session_start();
$raiz = true;
require "../../seguridad.php";
require "../../../model/Oficio.php";
require "../../../model/Institucion.php";
require "../../../model/Persona.php";

$modulo = "oficios";
$alert = null;
$message = null;


$oficios = new Oficio();
$personas = new Persona();
$instituciones = new Institucion();

if ($_GET) {
    $id = $_GET['id'];
    $getOficio = $oficios->find($id);
    if ($getOficio) {
        $label = "Editar Oficio";
        $oficio_id = $getOficio['id'];
        $instituciones_id = $getOficio['instituciones_id'];
        $getInstituciones = $instituciones->existe('id', '=', $instituciones_id, null, 1);
        if ($getInstituciones) {
            $institucion_rif = strtoupper($getInstituciones['rif']);
            $institucion_nombre = strtoupper($getInstituciones['nombre']);
            $institucion_telefono = strtoupper($getInstituciones['telefono']);
            $institucion_direccion = strtoupper($getInstituciones['direccion']);
            $institucion_select = '<option value="' . $instituciones_id . '">' . strtoupper($institucion_rif . ' - ' . $institucion_nombre) . '</option>';
        } else {
            $institucion_rif = null;
            $institucion_nombre = null;
            $institucion_telefono = null;
            $institucion_direccion = null;
            $institucion_select = '<option value="">Buscar...</option>';
        }
        $personas_id = $getOficio['personas_id'];
        $getPersonas = $personas->existe('id', '=', $personas_id, null, 1);
        if ($getPersonas) {
            $persona_cedula = $getPersonas['cedula'];
            $persona_nombre = $getPersonas['nombre'];
            $persona_telefono = $getPersonas['telefono'];
            $persona_direccion = $getPersonas['direccion'];
            $persona_select = '<option value="' . $personas_id . '">' . strtoupper($persona_cedula . ' - ' . $persona_nombre) . '</option>';
        } else {
            $persona_cedula = null;
            $persona_nombre = null;
            $persona_telefono = null;
            $persona_direccion = null;
            $persona_select = '<option value="">Buscar...</option>';
        }
        $fecha = $getOficio['fecha'];
        $requerimientos = $getOficio['requerimientos'];
        $opcion = "editar";
    } else {
        $alert = "warning";
        $message = "ID no encontrado.";
        require "../_layout/flash_message.php";
        crearFlashMessage($alert, $message, '../oficios/');
    }
} else {
    $label = "Nuevo Oficio";
    $oficio_id = null;
    $instituciones_id = null;
    $personas_id = null;
    $fecha = null;
    $requerimientos = null;
    $institucion_rif = null;
    $institucion_nombre = null;
    $institucion_telefono = null;
    $institucion_direccion = null;
    $institucion_select = '<option value="">Buscar...</option>';
    $persona_cedula = null;
    $persona_nombre = null;
    $persona_telefono = null;
    $persona_direccion = null;
    $persona_select = '<option value="">Buscar...</option>';
    $fecha = date('Y-m-d');
    $requerimientos = null;
    $opcion = "guardar";
}
$listarInstituciones = $instituciones->getAll(1);
$listarPersonas = $personas->getAll(1);

