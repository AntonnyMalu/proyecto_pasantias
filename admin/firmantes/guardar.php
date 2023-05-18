<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Firmante.php";
require "../_layout/flash_message.php";
$alert = null;
$message = null;

$ruta = '../firmantes/';

if ($_POST) {

    $firmantes = new Firmante();
    $opcion = $_POST['opcion'];
    $id = $_POST['id'];
    $hoy = date("Y-m-d");

    if (!empty($_POST['nombre']) && !empty($_POST['cargo'])) {
        $nombre = $_POST['nombre'];
        $cargo = $_POST['cargo'];

        $data = [
            $nombre,
            $cargo,
            $hoy
        ];

        $existe = $firmantes->existe('cargo', '=', $cargo, $id, 1);

        if (!$existe) {
            if ($opcion == "guardar") {
                $guardar = $firmantes->save($data);

                if ($guardar) {
                    $alert = "success";
                    $message = "Firmante Creado Exitosamente.";
                } else {
                    $alert = "danger";
                    $message = "Error en el modelo.";
                }
            }

            if ($opcion == "editar") {
                $editar = $firmantes->update($id, 'nombre', $nombre);
                $editar = $firmantes->update($id, 'cargo', $cargo);
                $editar = $firmantes->update($id, 'updated_at', $hoy);
                if ($editar) {
                    $alert = "success";
                    $message = "Datos Actualizados.";
                } else {
                    $alert = "danger";
                    $message = "Error en el modelo.";
                }
            }
            
        } else {
            $alert = "danger";
            $message = "Cargo ya Registrado.";
        }
    } else {
        //opcion eliminar
        if($opcion == "eliminar"){
            $editar = $firmantes->update($id, 'band', 0);
            $editar = $firmantes->update($id, 'updated_at', $hoy);
            if ($editar) {
                $alert = "success";
                $message = "Firmante Eliminado.";
            }else{
                $alert = "danger";
                $message = "Error en el modelo.";
            }
        }

    }

} else {
    $alert = "danger";
    $message = "Deben Enviarse los datos por Method POST";
}

crearFlashMessage($alert, $message, $ruta);
