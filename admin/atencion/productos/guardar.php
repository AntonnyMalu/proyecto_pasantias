<?php
// start a session
session_start();
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../_layout/flash_message.php";

function existePersona($cedula, $id=null){
    $row = null;
    $query = new Query();
    
    if(!$id){
        $sql1 = "SELECT * FROM `personas` WHERE `cedula` = '$cedula' AND `band` = '1'";
    }else{
        $sql1 = "SELECT * FROM `personas` WHERE `cedula` = '$cedula' AND `band` = '1' AND `id` != '$id'";
    }
    $exite = $query->getFirst($sql1);

    if($exite){
        return true;
    }else{
        return false;
    }

}

function eliminarPersona($id)
{
    $row = null;
    $query = new Query();
    $sql = "DELETE FROM `productos` WHERE  `id`= '$id';";
    $row = $query->save($sql);
    return $row;
}


function crearPersona($caso_id, $producto, $cantidad)
{
    $row = null;
    $query = new Query();
    $sql = "INSERT INTO `productos` (`casos_id`, `producto`, `cantidad`) VALUES ('$caso_id', '$producto', '$cantidad');";
    $row = $query->save($sql);
    return $row;

}

function editarPersona($id, $producto, $cantidad)
{
    $row = null;
    $query = new Query();
    $sql = "UPDATE `productos` SET `producto`='$producto', `cantidad`='$cantidad' WHERE  `id`=$id;";
    $row = $query->save($sql);
    return $row;

}

function editarStatus($id,$status)
{
    $row = null;
    $query = new Query();
    $hoy = date("Y-m-d");


    $sql = "UPDATE `casos` SET `status`='$status', `updated_at`='$hoy' WHERE  `id`='$id';";
        $row = $query->save($sql);
        return $row;

}

if ($_POST) {

    if ($_POST['opcion'] == "guardar") {

        if (!empty($_POST['producto']) && !empty($_POST['cantidad'])) {

            $producto = $_POST['producto'];
            $cantidad = $_POST['cantidad'];
            $caso_id = $_POST['caso_id'];

            $persona = crearPersona($caso_id, $producto, $cantidad);

            if ($persona) {

                $alert = "success";
                $message = "Producto Agregada Exitosamente";
                crearFlashMessage($alert,$message, '../productos/index.php?id='.$caso_id);


            } else {
                $alert = "warning";
                $message = "No se puede reguistrar porque ya ese cargo esta siendo utilizado";
                crearFlashMessage($alert, $message, '../casos/');
            }


        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert,$message, '../casos/');
        }

    }

    if ($_POST['opcion'] == "editar") {

        if (!empty($_POST['producto']) && !empty($_POST['cantidad'])) {

            $id = $_POST['personas_id'];
            $producto = $_POST['producto'];
            $cantidad = $_POST['cantidad'];
            $caso_id = $_POST['caso_id'];

            $persona = editarPersona($id, $producto, $cantidad);


            if ($persona) {


                $alert = "success";
                $message = "Cambios Guardados";
                crearFlashMessage($alert, $message, '../productos/index.php?id='.$caso_id);


            } else {
                $alert = "warning";
                $message = "Persona ya Registrada";
                crearFlashMessage($alert, $message, '../personas/');
            }


        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../personas/');
        }



    }

    if ($_POST['opcion'] == "eliminar") {

        if (!empty($_POST['personas_id'])){

            $id = $_POST['personas_id'];
            $caso_id = $_POST['caso_id'];

            $persona = eliminarPersona($id);

            if ($persona) {
                $alert = "success";
                $message = "Producto Eliminado";
                crearFlashMessage($alert, $message, '../productos/index.php?id='.$caso_id);
            } else {
                $alert = "warning";
                $message = "Error";
                crearFlashMessage($alert, $message, '../personas/');
            }

        } else {
            $alert = "danger";
            $message = "faltan datos";
            crearFlashMessage($alert, $message, '../personas/');
        }

    }

    if ($_POST['opcion'] == "cambiar_status") {
        $id = $_POST['casos_id'];
        $status = $_POST['casos_status'];
        
        $cambiar = editarStatus($id, $status);
        if ($cambiar) {
            $alert = "success";
            $message = 'Estatus Actualizado <a href="pdf_ficha.php?id='.$id.'" target="_blank">Imprimir Ficha</a>';
            crearFlashMessage($alert,$message, '../casos/');
        } else {
            $alert = "warning";
            $message = "Error";
            crearFlashMessage($alert,$message, '../casos/');
        }

    }


        
}
?>