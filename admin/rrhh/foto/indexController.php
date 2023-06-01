<?php
// start a session
session_start();
$raiz = true;
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../_layout/flash_message.php";
require "../../../model/Nomina.php";
require "../../../model/NominaCargo.php";
require "../../../model/NominaUbicaciones.php";
require_once "../../../funciones/funciones.php";
$modulo = "nomina";


$adsoluta_url = full_url($_SERVER);
$explode = explode('://', $adsoluta_url);
if ($explode[0] != "https") {
    # code...
    $url = 'https://'.$explode[1];
    header('location: '.$url);
}



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $nomina = new Nomina;
    $getNomina = $nomina->find($id);
    if (!$getNomina) {
        require "../../_layout/flash_message.php";
        $alert = "warning";
        $message = "ID NO Encontrado.";
        crearFlashMessage($alert, $message, '../nomina/');
    }

    if ($getNomina['path']) {
        $foto = "../../../".$getNomina['path'];
        if (file_exists('../../../'.$getNomina['path'])) {
            $foto = "../../../".$getNomina['path'];
        }else {
            $foto = "../../../img/img_placeolder.png";
        }
    }else{
        $foto = "../../../img/img_placeolder.png";
    }
    $cedula = $getNomina['cedula'];
    $nombre = strtoupper($getNomina['nombre']);

    $cargos = new NominaCargo();
    $getCargo = $cargos->find($getNomina['cargos_id']);
    if ($getCargo) {
        $cargo = $getCargo['cargo'];
    }else{
        $cargo = "NO definido";
    }

    $ubicaciones = new NominaUbicaciones();
    $getUbicaciones = $ubicaciones->find($getNomina['geografica_id']);
    if ($getUbicaciones) {
        $geografica = $getUbicaciones['nombre'];
    }else{
        $geografica = "NO definida.";
    }

    $geografica = $getNomina['ubicacion_geografica'];


} else {
    require "../../_layout/flash_message.php";
    $alert = "warning";
    $message = "ID NO Definido.";
    crearFlashMessage($alert, $message, '../nomina/');
}
