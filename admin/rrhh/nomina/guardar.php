<?php
// start a session
session_start();
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Nomina.php";
require "../../_layout/flash_message.php";


if ($_POST) {
    $nomina = new Nomina();
    $opcion = $_POST['opcion'];
    $id = $_POST['id'];
    $hoy = date('Y-m-d');

    if (
        !empty($_POST['cedula']) &&
        !empty($_POST['nombre']) &&
        !empty($_POST['apellido']) &&
        !empty($_POST['geografica_id']) &&
        !empty($_POST['administrativa_id']) &&
        !empty($_POST['cargos_id'])
    ) {
        //procesar
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $geografica_id = $_POST['geografica_id'];
        $administrativa_id = $_POST['administrativa_id'];
        $cargos_id = $_POST['cargos_id'];
        $estatus = $_POST['estatus'];
        
        $data = [
            $cedula,
            $nombre,
            $apellido,
            $cargos_id,
            $administrativa_id,
            $geografica_id,
            $hoy
        ];

        $existe = $nomina->existe('cedula', '=', $cedula, $id, 1);

        if (!$existe) {

            if ($opcion == "guardar") {
                $guardar = $nomina->save($data);
                if ($guardar) {
                    $alert = "success";
                    $message = "Trabajador Registrado Cerrectamente.";
                }else{
                    $alert = "danger";
                    $message = "Error en el Modelo.";
                }
            }

            if($opcion == "editar"){
                $editar = $nomina->update($id, 'cedula', $cedula);
                $editar = $nomina->update($id, 'nombre', $nombre);
                $editar = $nomina->update($id, 'apellido', $apellido);
                $editar = $nomina->update($id, 'cargos_id', $cargos_id);
                $editar = $nomina->update($id, 'administrativa_id', $administrativa_id);
                $editar = $nomina->update($id, 'geografica_id', $geografica_id);
                $editar = $nomina->update($id, 'updated_at', $hoy);
                $editar = $nomina->update($id, 'mini', $estatus);

                if ($editar) {
                    $alert = "success";
                    $message = "Datos Actualizados.";
                }else{
                    $alert = "danger";
                    $message = "Error en el Modelo.";
                }
            }

        } else {
            $alert = "warning";
            $message = "No se puede registrar, porque la Cédula ya está Registrada.";
        }
    } else {
        if($opcion == "eliminar"){
            $editar = $nomina->update($id, 'band', 0);
            $editar = $nomina->update($id, 'updated_at', $hoy);
            if ($editar) {
                $alert = "success";
                $message = "Registro Borrado.";
            }else{
                $alert = "danger";
                $message = "Error en el Modelo.";
            }
        }else{
            $alert = "warning";
            $message = "Faltan datos.";
        }
    }
} else {
    $alert = "danger";
    $message = "Debes enviar por el Metodo Post";
}
crearFlashMessage($alert, $message, '../nomina/');
