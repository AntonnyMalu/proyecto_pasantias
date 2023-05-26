<?php
// start a session
session_start();
$raiz = true;
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Choferes.php";
require "../../_layout/flash_message.php";

if ($_POST) {

    $choferes = new Choferes();
    $id = $_POST['id'];
    $opcion = $_POST['opcion'];
    $hoy = date('Y-m-d');

    if (
        !empty($_POST['empresas_id']) && 
        !empty($_POST['cedula']) && 
        !empty($_POST['nombre']) && 
        !empty($_POST['telefono'])
        ){
            $empresas_id = $_POST['empresas_id'];
            $vehiculos_id = $_POST['vehiculos_id'];
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];

            $data = [
                $empresas_id,
                $vehiculos_id,
                $cedula,
                $nombre,
                $telefono,
                $hoy
            ];

            $existe = $choferes->existe('cedula', '=', $cedula, $id, 1);

            if (!$existe) {
                
                if ($opcion == "guardar") {
                    $guardar = $choferes->save($data);
                    $alert = "success";
                    $message = "Guardado Exitosamente.";
                }

                if ($opcion == "editar") {
                    $editar = $choferes->update($id, 'empresas_id', $empresas_id);
                    $editar = $choferes->update($id, 'vehiculos_id', $vehiculos_id);
                    $editar = $choferes->update($id, 'cedula', $cedula);
                    $editar = $choferes->update($id, 'nombre', $nombre);
                    $editar = $choferes->update($id, 'telefono', $telefono);
                    $editar = $choferes->update($id, 'updated_at', $hoy);
                    $alert = "success";
                    $message = "Cambios Guardados.";
                }
            }else{
                $alert = "warning";
                $message = "Chofer ya Registrado.";
            }
    }else{
        if ($opcion == "eliminar") {
            $editar = $choferes->update($id, 'band', 0);
            $editar = $choferes->update($id, 'updated_at', $hoy);
            if ($editar) {
                $alert = "success";
                $message = "Eliminado Exitosamente.";
            }else{
                $alert = "warning";
                $message = "Faltan Datos.";
            }
        }
       
    }
        
}else {
    $alert = "danger";
    $message = "Deben enviarse por el metodo POST";
}
crearFlashMessage($alert,$message, '../choferes/');
