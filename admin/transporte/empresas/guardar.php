<?php
// start a session
session_start();
$raiz = true;
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Empresas.php";
require "../../_layout/flash_message.php";

if ($_POST) {

    $empresas = new Empresas();
    $id = $_POST['id'];
    $opcion = $_POST['opcion'];
    $hoy = date('Y-m-d');

    if (
        !empty($_POST['rif']) &&
        !empty($_POST['nombre'])
    ) {
        $rif = $_POST['rif'];
        $nombre = $_POST['nombre'];
        $responsable = $_POST['responsable'];
        $telefono = $_POST['telefono'];

        $data = [
            $rif,
            $nombre,
            $responsable,
            $telefono,
            $hoy
        ];

        $existe = $empresas->existe('rif', '=', $rif, $id, 1);

        if (!$existe) {

            if ($opcion == "guardar") {
                $guardar = $empresas->save($data);
                $alert = "success";
                $message = "Empresa Registrada Exitosamente.";
            }

            if ($opcion == "editar") {
                $editar = $empresas->update($id, 'rif', $rif);
                $editar = $empresas->update($id, 'nombre', $nombre);
                $editar = $empresas->update($id, 'responsable', $responsable);
                $editar = $empresas->update($id, 'telefono', $telefono);
                $editar = $empresas->update($id, 'created_at', $hoy);
                $alert = "success";
                $message = "Cambios Guardados.";
            }
        } else {
            $alert = "warning";
            $message = "La empresa ya esta Registrada.";
        }
    } else {
        if ($opcion == "eliminar") {
            $eliminar = $empresas->update($id, 'band', 0);
            $eliminar = $empresas->update($id, 'updated_at', $hoy);
            if ($eliminar) {
                $alert = "success";
                $message = "Eliminado Exitosamente.";
            }else{
                $alert = "warning";
                $message = "Faltan Datos.";
            }
        } 
    }
} else {
    $alert = "danger";
    $message = "Deben enviarse los datos por el metodo POST";
}
crearFlashMessage($alert, $message, '../empresas/');
