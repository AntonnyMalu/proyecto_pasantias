<?php
// start a session
session_start();
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../_layout/flash_message.php";
require "../../../model/Caso.php";
require "../../../model/Persona.php";
require "../../../funciones/funciones.php";

function existeCaso($personas_id, $fecha)
{
    $query = new Query();
    $sql = "SELECT * FROM `casos` WHERE `personas_id` = '$personas_id' AND  `band` = 1 ORDER BY `fecha` DESC; ";
    $row = $query->getFirst($sql);
    if ($row) {
        $dias = compararFechas($row['fecha'], $fecha);
        if ($dias>=30) {
            return false;
        }else{
            return true;
        }
    }else{
        return false;
    }
    
}

if ($_POST) {
    $id = $_POST['id'];
    $opcion = $_POST['opcion'];
    $hoy = date('Y-m-d');
    $casos = new Caso();
    $personas = new Persona();

    if (
        !empty($_POST['personas_id']) &&
        !empty($_POST['fecha']) &&
        !empty($_POST['hora']) &&
        !empty($_POST['donativo']) &&
        !empty($_POST['tipo'])
    ) {
        $personas_id = $_POST['personas_id'];
        $fecha = $_POST['fecha'];
        $hora =  $_POST['hora'];
        $donativo =  $_POST['donativo'];
        $tipo =  $_POST['tipo'];
        $persona_cedula = $_POST['persona_cedula'];
        $persona_nombre = $_POST['persona_nombre'];
        $persona_telefono = $_POST['persona_telefono'];
        $persona_direccion = $_POST['persona_direccion'];
        $observacion =  $_POST['observacion'];

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




            

                if ($opcion == "guardar") {
                    if (!existeCaso($personas_id, $fecha)) {

                        $dataCaso = [
                            $personas_id,
                            $fecha,
                            $hora,
                            $donativo,
                            $tipo,
                            $observacion,
                            $hoy
                        ];

                        $guardarCaso = $casos->save($dataCaso);
                        if ($guardarCaso) {
                            $alert = "success";
                            $message = "Caso Registrado Correctamente.";
                            crearFlashMessage($alert, $message, '../casos/');
                            exit;
                        }

                    } else {
                        $alert = "warning";
                        $message = "La cedula ingresada tiene un caso social registrado a menos de 30 días de la fecha indicada.";
                    }
                }


                if ($opcion == "editar") {
                    $editarCaso = $casos->update($id, 'personas_id', $personas_id);
                    $editarCaso = $casos->update($id, 'fecha', $fecha);
                    $editarCaso = $casos->update($id, 'hora', $hora);
                    $editarCaso = $casos->update($id, 'donativo', $donativo);
                    $editarCaso = $casos->update($id, 'observacion', $observacion);
                    $editarCaso = $casos->update($id, 'updated_at', $hoy);

                    if ($editarCaso) {
                        $alert = "success";
                        $message = "Cambios Guardados.";
                        crearFlashMessage($alert, $message, '../casos/');
                        exit;
                    }
                }
            
        } else {
            $alert = "warning";
            $message = "La Cédula ya esta registrada. Busque en <strong>Datos Personales</strong>. ";
        }
    } else {
        $alert = "warning";
        $message = "Faltan datos.";
    }
} else {
    $alert = "warning";
    $message = "Se deben Enviar los datos por el metodo POST";
}
if (isset($id)) {
    $ruta = '../registrar/?id=' . $id;
} else {
    $ruta = '../registrar/';
}
crearFlashMessage($alert, $message, $ruta);
