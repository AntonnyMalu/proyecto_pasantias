<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Institucion.php";
require "../_layout/flash_message.php";

$ruta = '../instituciones/';

if ($_POST) {

    $instituciones = new Institucion();
    $opcion = $_POST['opcion'];
    $id = $_POST['id'];
    $hoy = date("Y-m-d");

    if (!empty($_POST['nombre']) && !empty($_POST['direccion'])) {
        $rif = $_POST['rif'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        if (empty($rif)) {
            $rif = $instituciones->ritTemporal();
        }
        $data = [
            $rif,
            $nombre,
            $telefono,
            $direccion,
            $hoy
        ];

        $existe = $instituciones->existe('rif', '=', $rif, $id, 1);
        if (!$existe) {
            if ($opcion == "guardar") {
                $guardar = $instituciones->save($data);
                if ($guardar) {
                    $alert = "success";
                    $message = "Institución Agregada Exitosamente";
                } else {
                    $alert = "danger";
                    $message = "Error en el modelo.";
                }
            }

            if ($opcion == "editar") {
                $editar = $instituciones->update($id, 'rif', $rif);
                $editar = $instituciones->update($id, 'nombre', $nombre);
                $editar = $instituciones->update($id, 'telefono', $telefono);
                $editar = $instituciones->update($id, 'direccion', $direccion);
                $editar = $instituciones->update($id, 'updated_at', $hoy);

                if ($editar) {
                    $alert = "success";
                    $message = "Datos Actualizados.";
                }else{
                    $alert = "danger";
                    $message = "Error en el modelo.";
                }
            }
        } else {
            $alert = "danger";
            $message = "Institución ya Registrada.";
        }
    } else {
        //eliminar
        if ($opcion == "eliminar") {
            $editar = $instituciones->update($id, 'band', 0);
            $editar = $instituciones->update($id, 'updated_at', $hoy);
            if($editar){
                $alert = "success";
                $message = "Institución Eliminada.";
            }
        }
    }
}

crearFlashMessage($alert, $message, $ruta);
