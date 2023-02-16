<?php 
// start a session
session_start();
require "../seguridad.php";
require "../../mysql/Query.php";
require "../flash_message.php";
$alert = null;
$message = null;


function existeFirmante($cargo, $id=null){
    $row = null;
    $query = new Query();
    
    if(!$id){
        $sql1 = "SELECT * FROM `firmantes` WHERE `cargo` = '$cargo' AND `band` = '1'";
    }else{
        $sql1 = "SELECT * FROM `firmantes` WHERE `cargos` = '$cargo' AND `band` = '1' AND `id` != '$id'";
    }
    $exite = $query->getFirst($sql1);

    if($exite){
        return true;
    }else{
        return false;
    }

}


function crearFirmante($nombre, $cargo)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");
    $existe = existeFirmante($cargo);
    if(!$existe){
        $sql = "INSERT INTO `firmantes` (`nombre`, `cargo`, `created_at`) VALUES ('$nombre', '$cargo', '$hoy');";
        $row = $query->save($sql);
        return $row;
    }else{
        return false;
    }

}

function editarFirmante($id, $nombre, $cargo)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");
    $existe = existeFirmante($cargo , $id);
    if(!$existe){
        $sql = "UPDATE `firmantes` SET `nombre`='$nombre', `cargo`='$cargo', `updated_at`='$hoy' WHERE `id`=$id;";
        $row = $query->save($sql);
        return $row;
    }else{
        return false;
    }

}

function eliminarFirmante($id)
{
    $row = null;
    $query = new Query();
    $sql1 = "SELECT * FROM `firmantes` WHERE `id` = $id;";
    $firmante = $query->getFirst($sql1);

    if ($firmante) {


        $hoy = date("Y-m-d");
        $sql = "UPDATE `firmantes` SET `band`='0', `updated_at`='$hoy' WHERE  `id`=$id;";
        $row = $query->save($sql);
        return $row;

    } else {

        return false;

    }


}

if ($_POST) {
    if ($_POST['opcion'] == "guardar") {

        if (!empty($_POST['nombre']) && !empty($_POST['cargo'])) {

            $nombre = $_POST['nombre'];
            $cargo = $_POST['cargo'];

            $firmantes = crearFirmante($nombre, $cargo);

            if ($firmantes) {

                $alert = "success";
                $message = "Firmante Creado Exitosamente";
                crearFlashMessage($alert,$message, '../firmantes/');


            } else {
                $alert = "warning";
                $message = "No se puede reguistrar porque ya ese cargo esta siendo utilizado";
                crearFlashMessage($alert, $message, '../firmantes/');
            }


        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert,$message, '../firmantes/');
        }

        }
    }

    if ($_POST['opcion'] == "editar") {

        if (!empty($_POST['firmantes_id']) && !empty($_POST['nombre']) && !empty($_POST['cargo'])) {

            $id = $_POST['firmantes_id'];
            $nombre = $_POST['nombre'];
            $cargo = $_POST['cargo'];

            $firmante = editarFirmante($id, $nombre, $cargo);


            if ($firmante) {


                $alert = "success";
                $message = "Cambios Guardados";
                crearFlashMessage($alert, $message, '../firmantes/');


            } else {
                $alert = "warning";
                $message = "No se puede agragar ese cargo porque ya está siendo utilizado";
                crearFlashMessage($alert, $message, '../firmantes/');
            }


        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../firmantes/');
        }



    }

    if ($_POST['opcion'] == "eliminar") {

        if (!empty($_POST['firmantes_id'])){

            $id = $_POST['firmantes_id'];

            $firmante = eliminarFirmante($id);

            if ($firmante) {
                $alert = "success";
                $message = "Firmante Emilinado";
                crearFlashMessage($alert, $message, '../firmantes/');
            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert, $message, '../firmantes/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../firmantes/');
        }

    }


    


?>