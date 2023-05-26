<?php
// start a session
session_start();
$raiz_pdf = true;
require "../../../../funciones/funciones.php";
require "../../../seguridad.php";
require "../../../_layout/flash_message.php";
include('../../../../phpqrcode/qrlib.php');
include_once "../../../../model/Guia.php";
require "../../../../model/RutasTerritorio.php";
require "../../../../model/GuiaCargamento.php";

function getFormato()
{
    $query = new Query();
    $sql = "SELECT * FROM `guias_formatos_pdf` ORDER BY `id` DESC LIMIT 1;";
    $row = $query->getFirst($sql);
    return $row;
}

function errorFormato($opcion = null)
{
    switch ($opcion) {
        case 1;
            $alert = "warning";
            $message = 'N° de Guía NO definido.';
            break;
        case 2;
            $alert = "warning";
            $message = 'N° de Guía Incorrecto.';
            break;
        default:
            $alert = "danger";
            $message = 'Error: Fomato PDF NO DEFINIDO. Contacte a su administrador.';
            break;
    }

    crearFlashMessage($alert, $message, '../../guias/');
}

$getFormato = getFormato();

if ($getFormato) {

    $formato = $getFormato['nombre'];

    if (file_exists($formato)) {

        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $getGuia = new Guia();
            $guia = $getGuia->find($id);

            if ($guia) {


                $getGuia->update($id, 'pdf_impreso', 1);

                $territorios = new RutasTerritorio();
                $origen = $territorios->find($guia['territorios_origen']);
                $destino = $territorios->find($guia['territorios_destino']);
                $ruta = "";
                if (is_array(json_decode($guia['rutas_ruta']))) {
                    $listarTerritorios = json_decode($guia['rutas_ruta']);
                    foreach ($listarTerritorios as $lugar) {
                        $ruta .= ucfirst($lugar) . ", ";
                    }
                }


                switch ($guia['guias_tipos_id']) {
                    case 2:
                        $r = 255;
                        $g = 95;
                        $b = 53;
                        break;
                    default:
                        $r = 51;
                        $g = 246;
                        $b = 255;
                        break;
                }

                $cargamento = new GuiaCargamento();
                $listarCargamento = $cargamento->getList('guias_id', '=', $guia['id']);

                $qr_texto = "GUÍA DE TRASLADO ALGUARISA \nN°: " . strtoupper($guia['codigo']) . " \nFecha: " . verFecha($guia['fecha']) . "\nVehiculo Tipo: " . strtoupper($guia['vehiculos_tipo']) . " \nVehiculo Placa Batea: " . strtoupper($guia['vehiculos_placa_batea']) . " \nChofer Cedula: " . strtoupper($guia['choferes_cedula']) . " \nChofer Nombre: " . strtoupper($guia['choferes_nombre']) . " \nDestino: " . strtoupper($guia['rutas_destino']) . "";
                QRcode::png($qr_texto, 'QRcode.png', '', 2);

                require $formato;
            } else {
                errorFormato(2);
            }
        } else {
            errorFormato(1);
        }
    } else {
        errorFormato();
    }
} else {
    errorFormato();
}
