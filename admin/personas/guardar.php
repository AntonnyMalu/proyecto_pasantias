<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../../model/Persona.php";
require "../_layout/flash_message.php";

$ruta = '../personas';

if ($_POST) {
    $personas = new Persona();
    $opcion = $_POST['opcion'];
    $id = $_POST['id'];
    $hoy = date("Y-m-d");

    if (!empty($_POST['cedula']) && !empty($_POST['nombre']) && !empty($_POST['direccion'])) {
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];

        $data = [
            $cedula,
            $nombre,
            $direccion,
            $telefono,
            $hoy
        ];

        $existe = $personas->existe('cedula', '=', $cedula, $id, 1);
        if (!$existe) {
            if ($opcion == "guardar") {
                $guardar = $personas->save($data);
                if ($guardar) {
                    $alert = "success";
                    $message = "Persona Agregada Exitosamente";
                } else {
                    $alert = "danger";
                    $message = "Error en el modelo.";
                }
            }

            if ($opcion == "editar") {
                $editar = $personas->update($id, 'cedula', $cedula);
                $editar = $personas->update($id, 'nombre', $nombre);
                $editar = $personas->update($id, 'telefono', $telefono);
                $editar = $personas->update($id, 'direccion', $direccion);
                if ($editar) {
                    $alert = "success";
                    $message = "Datos Actualizados.";
                } else {
                    $alert = "danger";
                    $message = "Error en el modelo.";
                }
            }
        }else{
            $alert = "danger";
            $message = "Persona ya Registrada.";
        }
    } else {
        //opcion de eliminar
        if ($opcion == "eliminar") {
            $editar = $personas->update($id, 'band', 0);
            if($editar){
                $alert = "success";
                $message = "Persona Eliminada.";
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
