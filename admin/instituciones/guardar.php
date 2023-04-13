<?php
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../_layout/flash_message.php";

function existeInstitucion($rif, $id=null){
    $row = null;
    $query = new Query();
    
    if(!$id){
        $sql1 = "SELECT * FROM `instituciones` WHERE `rif` = '$rif' AND `band` = '1'";
    }else{
        $sql1 = "SELECT * FROM `instituciones` WHERE `rif` = '$rif' AND `band` = '1' AND `id` != '$id'";
    }
    $exite = $query->getFirst($sql1);

    if($exite){
        return true;
    }else{
        return false;
    }

}

function eliminarInstitucion($id)
{
    $row = null;
    $query = new Query();
    $sql1 = "SELECT * FROM `instituciones` WHERE `id` = $id;";
    $institucion = $query->getFirst($sql1);

    if ($institucion) {


        $hoy = date("Y-m-d");
        $sql = "UPDATE `instituciones` SET `band`='0', `updated_at`='$hoy' WHERE  `id`=$id;";
        $row = $query->save($sql);
        return $row;

    } else {

        return false;

    }


}


function crearInstitucion( $rif, $nombre, $telefono, $direccion)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");
    $existe = existeInstitucion($rif);
    if(!$existe){
        $sql = "INSERT INTO`instituciones` (`rif`, `nombre`, `telefono`, `direccion`, `created_at`) VALUES ('$rif', '$nombre', '$telefono', '$direccion', '$hoy');";
        $row = $query->save($sql);
        return $row;
    }else{
        return false;
    }

}

function editarInstitucion($id, $rif, $nombre, $telefono, $direccion)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");
    $existe = existeInstitucion($rif, $id);
    if(!$existe){
        $sql = "UPDATE `instituciones` SET `rif`='$rif', `nombre`='$nombre', `telefono`='$telefono', `direccion`='$direccion', `updated_at`='$hoy' WHERE `id`=$id;";
        $row = $query->save($sql);
        return $row;
    }else{
        return false;
    }

}

if ($_POST) {

    if ($_POST['opcion'] == "guardar") {

        if (!empty($_POST['rif']) && !empty($_POST['nombre']) && !empty($_POST['direccion'])) {

            $rif = $_POST['rif'];
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];

            $institucion = crearInstitucion($rif, $nombre, $telefono, $direccion);

            if ($institucion) {

                $alert = "success";
                $message = "Institución Agregada Exitosamente";
                crearFlashMessage($alert,$message, '../instituciones/');


            } else {
                $alert = "warning";
                $message = "No se puede reguistrar porque ya ese cargo esta siendo utilizado";
                crearFlashMessage($alert, $message, '../instituciones/');
            }


        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert,$message, '../instituciones/');
        }

    }

    if ($_POST['opcion'] == "editar") {

        if (!empty($_POST['instituciones_id']) && !empty($_POST['rif']) && !empty($_POST['nombre']) && !empty($_POST['direccion'])) {

            $id = $_POST['instituciones_id'];
            $rif = $_POST['rif'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];

            $institucion = editarInstitucion($id, $rif, $nombre, $telefono, $direccion);


            if ($institucion) {


                $alert = "success";
                $message = "Cambios Guardados";
                crearFlashMessage($alert, $message, '../instituciones/');


            } else {
                $alert = "warning";
                $message = "Institucion ya Registrada";
                crearFlashMessage($alert, $message, '../instituciones/');
            }


        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../instituciones/');
        }



    }

    if ($_POST['opcion'] == "eliminar") {

        if (!empty($_POST['instituciones_id'])){

            $id = $_POST['instituciones_id'];

            $institucion = eliminarInstitucion($id);

            if ($institucion) {
                $alert = "success";
                $message = "Institucion Eliminada";
                crearFlashMessage($alert, $message, '../instituciones/');
            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert, $message, '../instituciones/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../instituciones/');
        }

    }


        
}
?>