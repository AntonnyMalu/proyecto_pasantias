<?php
// start a session
session_start();
$raiz = true;
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Rutas.php";
require "../../_layout/flash_message.php";

function existe($origen, $destino, $id = null)
{
    $extra = null;
    if (!is_null($id)) {
        $extra = "AND `id` != $id";
    }
    $query = new Query();
    $sql = "SELECT * FROM `rutas` WHERE `origen` = $origen AND `destino` = $destino; AND `band` = 1 $extra;";
    $row = $query->getAll($sql);
    return $row;
}

if ($_POST) {

    $rutas = new Rutas();
    $id = $_POST['id'];
    $opcion = $_POST['opcion'];
    $hoy = date('Y-m-d');

    if (
        !empty($_POST['origen']) &&
        !empty($_POST['contador'] &&
            !empty($_POST['destino']))
    ) {
        $origen = $_POST['origen'];
        $contador = $_POST['contador'];
        $destino = $_POST['destino'];

        $array = array();
        for ($i = 1; $i <= $_POST['contador']; $i++) {
            if (isset($_POST['ruta_' . $i])) {
                $item = $_POST['ruta_' . $i];
                array_push($array, $item);
            }
        }
        $ruta = json_encode($array);

        $data = [
            $origen,
            $destino,
            $ruta,
            $hoy

        ];

        $existe = existe($origen, $destino, $id = null);

        if (!$existe) {

            if ($opcion == "guardar") {
                $guardar = $rutas->save($data);
                $alert = "success";
                $message = "Ruta Registrada Exitosamente.";
            }

            if ($opcion == "editar") {
                $editar = $rutas->update($id, 'origen', $origen);
                $editar = $rutas->update($id, 'destino', $destino);
                $editar = $rutas->update($id, 'ruta', $ruta);
                $editar = $rutas->update($id, 'updated_at', $hoy);
                $alert = "success";
                $message = "Cambios Guardados.";
            }
        } else {
            $alert = "warning";
            $message = "La  ruta ya está Registrada.";
        }
    } else {
        if ($opcion == "eliminar") {
            $editar = $rutas->update($id, 'band', 0);
            $editar = $rutas->update($id, 'updated_at', $hoy);
            $alert = "success";
            $message = "Ruta Eliminada.";
        }
    }

} else {
    $alert = "danger";
    $message = "Deben enviare los datos por el metodo POST";
}
crearFlashMessage($alert, $message, '../rutas/');
