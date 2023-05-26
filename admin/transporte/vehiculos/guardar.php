<?php
// start a session
session_start();
$raiz = true;
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Vehiculos.php";
require "../../_layout/flash_message.php";

if ($_POST) {

    $vehiculos = new Vehiculos();
    $id = $_POST['id'];
    $opcion = $_POST['opcion'];
    $hoy = date('Y-m-d');

    if (
        !empty($_POST['empresas_id']) &&
        !empty($_POST['tipo']) &&
        !empty($_POST['marca']) &&
        !empty($_POST['placa']) &&
        isset($_POST['chuto']) &&
        !empty($_POST['capacidad']) &&
        !empty($_POST['color'])
    ) {
        $empresas_id = $_POST['empresas_id'];
        $tipo = $_POST['tipo'];
        $marca = $_POST['marca'];
        $placa = $_POST['placa'];
        $chuto = $_POST['chuto'];
        $capacidad = $_POST['capacidad'];
        $color = $_POST['color'];

        $data = [
            $empresas_id,
            $tipo,
            $marca,
            $placa,
            $chuto,
            $capacidad,
            $color,
            $hoy
        ];

        $existe = $vehiculos->existe('placa_batea', '=', $placa, $id, 1);
        if (!$existe) {

            if ($opcion == "guardar") {
                $guardar = $vehiculos->save($data);
                $alert = "success";
                $message = "Registrado Exitosamente.";
            }


            if ($opcion == "editar") {
                $editar = $vehiculos->update($id, 'empresas_id', $empresas_id);
                $editar = $vehiculos->update($id, 'tipo', $tipo);
                $editar = $vehiculos->update($id, 'marca', $marca);
                $editar = $vehiculos->update($id, 'placa_batea', $placa);
                $editar = $vehiculos->update($id, 'placa_chuto', $chuto);
                $editar = $vehiculos->update($id, 'color', $color);
                $editar = $vehiculos->update($id, 'updated_at', $hoy);
                $alert = "success";
                $message = "Cambios Guardados";
            }
        }else{
            $alert = "warning";
            $message = "Vehiculo ya registrado";
        }
    } else {
        if ($opcion == "eliminar") {
            $editar = $vehiculos->update($id, 'band', 0);
            $editar = $vehiculos->update($id, 'updated_at', $hoy);
            if ($editar) {
                $alert = "success";
                $message = "Eliminado Exitosamente";
            } else {
                $alert = "warning";
                $message = "Faltan Datos";
            }
        }
    }
} else {
    $alert = "danger";
    $message = "Deben enviarse los datos por el metodo POST.";
}

crearFlashMessage($alert, $message, '../vehiculos/');
