<?php
// start a session
session_start();
require "../seguridad.php";
require "../../model/Persona.php";
require "../../model/Institucion.php";
require "../../model/Oficio.php";
require "../_layout/flash_message.php";
require "../../funciones/funciones.php";
$modulo = "resoluciones";

$alert = null;
$message = null;
$ruta = "../registraroficio";

$oficios = new Oficio();
$instituciones = new Institucion();
$personas = new Persona();
$error = false;

if ($_POST) {
    $id = $_POST['id'];
    $opcion = $_POST['opcion'];
    $hoy = date('Y-m-d');

    if (
        !empty($_POST['instituciones_id']) &&
        isset($_POST['institucion_rif']) &&
        !empty($_POST['institucion_nombre']) &&
        isset($_POST['institucion_telefono']) &&
        isset($_POST['institucion_direccion']) &&
        !empty($_POST['personas_id']) &&
        !empty($_POST['persona_cedula']) &&
        !empty($_POST['persona_nombre']) &&
        isset($_POST['persona_telefono']) &&
        isset($_POST['persona_direccion']) &&
        !empty($_POST['fecha']) &&
        !empty($_POST['requerimientos'])
    ) {

        $instituciones_id = $_POST['instituciones_id'];
        $institucion_rif = $_POST['institucion_rif'];
        $institucion_nombre = $_POST['institucion_nombre'];
        $institucion_telefono = $_POST['institucion_telefono'];
        $institucion_direccion = $_POST['institucion_direccion'];
        $personas_id = $_POST['personas_id'];
        $persona_cedula = $_POST['persona_cedula'];
        $persona_nombre = $_POST['persona_nombre'];
        $persona_telefono = $_POST['persona_telefono'];
        $persona_direccion = $_POST['persona_direccion'];
        $fecha = $_POST['fecha'];
        $requerimientos = $_POST['requerimientos'];


        if ($personas_id == '-1') {
            //nuevo
            $personas_id = null;
        }

        $existePersona = $personas->existe('cedula', '=', $persona_cedula, $personas_id, 1);
        if (!$existePersona) {

            if (is_null($personas_id)) {
                $dataPersona = [
                    $persona_cedula,
                    $persona_nombre,
                    $persona_telefono,
                    $persona_direccion,
                    $hoy
                ];
                $guardarPersona = $personas->save($dataPersona);
                $getPersona = $personas->first('cedula', '=', $persona_cedula);
                $personas_id = $getPersona['id'];
            } else {
                //editar
                $guardarPersona = $personas->update($personas_id, 'cedula', $persona_cedula);
                $guardarPersona = $personas->update($personas_id, 'nombre', $persona_nombre);
                $guardarPersona = $personas->update($personas_id, 'telefono', $persona_telefono);
                $guardarPersona = $personas->update($personas_id, 'direccion', $persona_direccion);
                $guardarPersona = $personas->update($personas_id, 'updated_at', $hoy);
            }
        }else{
            $error = true;
        }


        if ($instituciones_id == '-1') {
            //nuevo
            $instituciones_id = null;
        }

        $existeInstitucion = $instituciones->existe('rif', '=', $institucion_rif, $instituciones_id, 1);
        if (!$existeInstitucion) {

            if (is_null($instituciones_id)) {
                if (empty($institucion_rif)) {
                    $institucion_rif = ritTemporal();
                }
                $dataInstitucion = [
                    $institucion_rif,
                    $institucion_nombre,
                    $institucion_telefono,
                    $institucion_direccion,
                    $hoy
                ];
                $guardarInstitucion = $instituciones->save($dataInstitucion);
                $getInstitucion = $instituciones->first('rif', '=', $institucion_rif);
                $instituciones_id = $getInstitucion['id'];
            } else {
                //editar
                $guardarInstitucion = $instituciones->update($instituciones_id, 'rif', $institucion_rif);
                $guardarInstitucion = $instituciones->update($institucion_id, 'nombre', $institucion_nombre);
                $guardarInstitucion = $instituciones->update($personas_id, 'telefono', $institucion_telefono);
                $guardarInstitucion = $instituciones->update($personas_id, 'direccion', $institucion_direccion);
                $guardarInstitucion = $instituciones->update($personas_id, 'updated_at', $hoy);
            }
        }else{
            $error = true;
        }

        
        $dataOficio = [
            $instituciones_id,
            $personas_id,
            $fecha,
            $requerimientos
        ];

       if (!$error) {
            if ($opcion == "guardar") {
                $guardarOficio = $oficios->save($dataOficio);
                $alert = "success";
                $message = "Oficio Guardado Correctamente.";
            }


            if ($opcion == "editar") {
                $editar = $oficios->update($id, 'instituciones_id', $instituciones_id);
                $editar = $oficios->update($id, 'personas_id', $personas_id);
                $editar = $oficios->update($id, 'fecha', $fecha);
                $editar = $oficios->update($id, 'requerimientos', $requerimientos);
                $alert = "success";
                $message = "Registro Actualizado.";
            }
        }else{
            $alert = "warning";
            $message = "El Rif o la Cédula que intestas Ingresar Ya existen.";
        }




    } else {
        $alert = "warning";
        $message = "Faltan Datos.";
        $ruta = "../registraroficio/";
    }
} else {
    $alert = "danger";
    $message = "Se deben enviar los datos por el metodo POST.";
    $ruta = "../registraroficio/";
}











crearFlashMessage($alert, $message, $ruta);
