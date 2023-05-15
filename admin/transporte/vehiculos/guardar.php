<?php
// start a session
session_start();
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Vehiculos.php";
require "../../_layout/flash_message.php";

if ($_POST) {
    $vehiculos = new Vehiculos();
    if ($_POST['opcion'] == "guardar") {

        if (!empty($_POST['empresas_id']) && !empty($_POST['tipo']) && !empty($_POST['marca']) && !empty($_POST['placa']) && isset($_POST['chuto']) && !empty($_POST['capacidad']) && !empty($_POST['color'])) {

            $empresas_id = $_POST['empresas_id'];
            $tipo = $_POST['tipo'];
            $marca = $_POST['marca'];
            $placa = $_POST['placa'];
            $chuto = $_POST['chuto'];
            $capacidad = $_POST['capacidad'];
            $color = $_POST['color'];
            $id = $_POST['vehiculos_id'];

            $guardarVehiculos = $vehiculos->save($id, $empresas_id, $tipo, $marca, $placa, $chuto, $capacidad, $color);

            if ($guardarVehiculos) {

                $alert = "success";
                $message = "Vehículo Agregada Exitosamente";
                crearFlashMessage($alert,$message, '../vehiculos/');


            } else {
                $alert = "warning";
                $message = "No se puede reguistrar este Vehículo, porque ya se encuentra Registrado";
                crearFlashMessage($alert, $message, '../vehiculos/');
            }


        } else {
            $alert = "danger";
            $message = "Faltan Datos";
            crearFlashMessage($alert,$message, '../vehiculos/');
        }

    }

    if ($_POST['opcion'] == "editar") {

        if (!empty($_POST['vehiculos_id']) && !empty($_POST['empresas_id']) && !empty($_POST['placa']) && !empty($_POST['tipo']) && !empty($_POST['marca']) && !empty($_POST['color']) && !empty($_POST['capacidad'])  && isset($_POST['chuto'])) {

            $id = $_POST['vehiculos_id'];
            $empresas_id = $_POST['empresas_id'];
            $placa = $_POST['placa'];
            $chuto = $_POST['chuto'];
            $tipo = $_POST['tipo'];
            $marca = $_POST['marca'];
            $color = $_POST['color'];
            $capacidad = $_POST['capacidad'];

            $editarVehiculos = $vehiculos->update($id, $empresas_id, $tipo, $marca, $placa, $chuto, $capacidad, $color);

            if ($editarVehiculos) {
                $alert = "success";
                $message = "Cambios Guardados";
                crearFlashMessage($alert, $message, '../vehiculos/');

            } else {
                $alert = "warning";
                $message = "Vehículo ya Registrado";
                crearFlashMessage($alert, $message, '../vehiculos/');
            }

        } else {
            $alert = "danger";
            $message = "Faltan Datos";
            crearFlashMessage($alert, $message, '../vehiculos/');
        }



    }

    if ($_POST['opcion'] == "eliminar") {

        if (!empty($_POST['vehiculos_id'])){

            $id = $_POST['vehiculos_id'];  

            $eliminarVehiculos = $vehiculos->delete($id);

            if ($eliminarVehiculos) {
                $alert = "success";
                $message = "Vehiculo Eliminado";
                crearFlashMessage($alert, $message, '../vehiculos/');
            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert, $message, '../vehiculos/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../vehiculos/');
        }

    }


        
}
?>