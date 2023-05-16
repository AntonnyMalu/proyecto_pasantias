<?php
session_start();
require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../_layout/flash_message.php";
require "../../../model/Guia.php";
require "../../../model/GuiaTipo.php";
require "../../../model/GuiaCargamento.php";
require "../../../model/Vehiculos.php";
require "../../../model/VehiculoTipo.php";
require "../../../model/Choferes.php";
require "../../../model/Rutas.php";
require "../../../model/RutasTerritorio.php";
require "../../../model/GuiaFormato.php";

function getRuta($origen, $destino)
{
    $row = null;
    $rutas = new Rutas();

    $existe = $rutas->existe($origen, $destino);
    if ($existe) {
        $row = $existe;
        $row['ruta'] = json_decode(($row['ruta']));
        $row = $row;
    }

    $existe = $rutas->existe($destino, $origen);
    if ($existe) {
        $row = $existe;
        $ruta_inversa = array_reverse(json_decode($row['ruta']));
        $row['ruta'] = $ruta_inversa;
        $row = $row;
    }

    if (!is_null($row)) {
        //echo json_encode($row);
        return $row;
    } else {
        $alert = "warning";
        $message = "RUTA NO REGISTRADA.";
        crearFlashMessage($alert, $message, '../guias/');
    }
}

function existeGuia($tipos_id, $vehiculos_id, $choferes_id, $origen, $destino, $fecha, $id)
{
    $extra = null;
    $query = new Query();
    if ($id) {
        $extra = "AND `id` != '$id'";
    }
    $sql = "SELECT * FROM `guias` WHERE 
    `guias_tipos_id` = '$tipos_id' AND 
    `vehiculos_id` = '$vehiculos_id' AND 
    `choferes_id` = '$choferes_id' AND 
    `territorios_origen` = '$origen' AND 
    `territorios_destino` = '$destino' AND 
    `fecha` = '$fecha' AND 
    `band` = '1' 
    $extra ;";
    $row = $query->getFirst($sql);
    return $row;
}

function editCampo($id, $campo, $valor)
{
    $guias = new Guia();
    $database = $guias->find($id);
    $afectados = [];

    $array = [
        'campo' => $campo,
        'anterior' => $database[$campo],
        'nuevo' => $valor,
    ];

    array_push($afectados, $array);
    $guias->update($id, $campo, $valor);
    return $afectados;
}

function getFormato(){
    $query = new Query();
    $sql = "SELECT * FROM `guias_formatos_pdf` ORDER BY `id` DESC LIMIT 1;";
    $row = $query->getFirst($sql);
    if($row){
        return $row['id'];
    }else{
        echo "NO SE HA DEFINIDO NINGUN FORMATO DE GUIA EN LA BASE DE DATOS. CONTACTE CON SU ADMINISTRADOR"; 
        exit;
    }
    
}
$ruta = '../guias/';
$formato_pdf_id = getFormato();



if ($_POST) {

    if (
        !empty($_POST['guias_tipos_id']) &&
        !empty($_POST['codigo']) &&
        !empty($_POST['vehiculos_id']) &&
        !empty($_POST['choferes_id']) &&
        !empty($_POST['origen']) &&
        !empty($_POST['destino']) &&
        !empty($_POST['fecha'])
    ) {

        //objetos
        $guias = new Guia();
        $tiposGuia = new GuiaTipo();
        $cargamentos = new GuiaCargamento();
        $vehiculos = new Vehiculos();
        $tiposVehiculos = new VehiculoTipo();
        $choferes = new Choferes();
        $territorios = new RutasTerritorio();

        //inputs
        $guias_tipos_id = $_POST['guias_tipos_id'];
        $codigo = $_POST['codigo'];
        $vehiculos_id = $_POST['vehiculos_id'];
        $choferes_id = $_POST['choferes_id'];
        $origen = $_POST['origen'];
        $destino = $_POST['destino'];
        $fecha = $_POST['fecha'];
        $opcion = $_POST['opcion'];
        $id = $_POST['id'];
        $contador = $_POST['contador'];

        //database
        $getTipoGuia = $tiposGuia->find($guias_tipos_id);
        $getVehiculo = $vehiculos->find($vehiculos_id);
        $getTipoVehiculo = $tiposVehiculos->find($getVehiculo['tipo']);
        $getChofer = $choferes->find($choferes_id);
        $getRuta = getRuta($origen, $destino);
        $getOrigen = $territorios->find($origen);
        $getDestino = $territorios->find($destino);

        //dinamicos
        $guias_tipos_nombre = $getTipoGuia['nombre'];
        $vehiculos_tipo = $getTipoVehiculo['nombre'];
        $vehiculos_marca = $getVehiculo['marca'];;
        $vehiculos_placa_batea = $getVehiculo['placa_batea'];;
        $vehiculos_placa_chuto = $getVehiculo['placa_chuto'];;
        $vehiculos_color = $getVehiculo['color'];;
        $vehiculos_capacidad = $getVehiculo['capacidad'];
        $choferes_cedula = $getChofer['cedula'];
        $choferes_nombre = $getChofer['nombre'];
        $choferes_telefono = $getChofer['telefono'];
        $rutas_id = $getRuta['id'];
        $rutas_origen = $getOrigen['parroquia'];
        $rutas_destino = $getDestino['parroquia'];
        $rutas_ruta = json_encode($getRuta['ruta']);
        $users_id = $_SESSION['id'];
        $hoy = date("Y-m-d");


        $existeGuia = existeGuia($guias_tipos_id, $vehiculos_id, $choferes_id, $origen, $destino, $fecha, $id);

        if (!$existeGuia) {


            //guardar
            if ($opcion == "guardar") {

                $data = [
                    $codigo,
                    $guias_tipos_id,
                    $guias_tipos_nombre,
                    $vehiculos_id,
                    $vehiculos_tipo,
                    $vehiculos_marca,
                    $vehiculos_placa_batea,
                    $vehiculos_placa_chuto,
                    $vehiculos_color,
                    $vehiculos_capacidad,
                    $choferes_id,
                    $choferes_cedula,
                    $choferes_nombre,
                    $choferes_telefono,
                    $origen,
                    $destino,
                    $rutas_id,
                    $rutas_origen,
                    $rutas_destino,
                    $rutas_ruta,
                    $fecha,
                    $users_id,
                    $hoy,
                    $formato_pdf_id
                ];

                //guarda en tabla guias
                $guardar = $guias->save($data);
                if ($guardar) {
                    //sigo con cargamento
                    $getGuia = $guias->first('codigo', '=', $codigo);
                    $id = $getGuia['id'];
                    for ($i = 1; $i <= $contador; $i++) {

                        if (isset($_POST['cantidad_' . $i]) && isset($_POST['descripcion_' . $i])) {
                            $cantidad = $_POST['cantidad_' . $i];
                            $descripcion = $_POST['descripcion_' . $i];
                            $datos = [
                                $id,
                                $cantidad,
                                $descripcion
                            ];
                            $guardarCarga = $cargamentos->save($datos);
                        }
                    }

                    $alert = "success";
                    $message = 'Guia Creada correctamente. N°: 
                    <button type="button" class="btn btn-sm btn-link" data-toggle="modal" data-target="#exampleModal"
                    onclick="btnShow(\''.$id.'\')" >
                        <strong>' . $codigo . '</strong>
                    </button>
                    ';
                } else {
                    $alert = "danger";
                    $message = 'Error en el Model. Contacte a su administrador.';
                }
            }


            //EDITAR
            if ($opcion == "editar") {
                //edito
                $time = date("Y-m-d H:i:s"); //"2023-05-11 13:53:38";
                $database = $guias->find($id);

                if (is_null($database['auditoria'])) {
                    $anterior = [];
                } else {
                    $anterior = json_decode($database['auditoria']);
                }

                $auditoria = [
                    'fecha' => $time,
                    'afectados' => [],
                    'user' => $_SESSION['id']
                ];
                $cambios = false;


                /*$editar = editCampo($id, 'tipos_nombre', 'anthony');
                array_push($auditoria['afectados'], $editar);*/
                if ($guias_tipos_id != $database['guias_tipos_id']) {
                    $editar = editCampo($id, 'guias_tipos_id', $guias_tipos_id);
                    array_push($auditoria['afectados'], $editar);
                    $editar = editCampo($id, 'tipos_nombre', $guias_tipos_nombre);
                    array_push($auditoria['afectados'], $editar);
                    $cambios = true;
                }

                if ($codigo != $database['codigo']) {
                    $editar = editCampo($id, 'codigo', $codigo);
                    array_push($auditoria['afectados'], $editar);
                    $cambios = true;
                }

                if ($vehiculos_id != $database['vehiculos_id']) {
                    $editar = editCampo($id, 'vehiculos_id', $vehiculos_id);
                    array_push($auditoria['afectados'], $editar);
                    $editar = editCampo($id, 'vehiculos_tipo', $vehiculos_tipo);
                    array_push($auditoria['afectados'], $editar);
                    $editar = editCampo($id, 'vehiculos_marca', $vehiculos_marca);
                    array_push($auditoria['afectados'], $editar);
                    $editar = editCampo($id, 'vehiculos_placa_batea', $vehiculos_placa_batea);
                    array_push($auditoria['afectados'], $editar);
                    $editar = editCampo($id, 'vehiculos_placa_chuto', $vehiculos_placa_chuto);
                    array_push($auditoria['afectados'], $editar);
                    $editar = editCampo($id, 'vehiculos_color', $vehiculos_color);
                    array_push($auditoria['afectados'], $editar);
                    $editar = editCampo($id, 'vehiculos_capacidad', $vehiculos_capacidad);
                    array_push($auditoria['afectados'], $editar);
                    $cambios = true;
                }

                if ($choferes_id != $database['choferes_id']) {
                    $editar = editCampo($id, 'choferes_id', $choferes_id);
                    array_push($auditoria['afectados'], $editar);
                    $editar = editCampo($id, 'choferes_cedula', $choferes_cedula);
                    array_push($auditoria['afectados'], $editar);
                    $editar = editCampo($id, 'choferes_nombre', $choferes_nombre);
                    array_push($auditoria['afectados'], $editar);
                    $editar = editCampo($id, 'choferes_telefono', $choferes_telefono);
                    array_push($auditoria['afectados'], $editar);
                    $cambios = true;
                }

                if ($origen != $database['territorios_origen']) {
                    $editar = editCampo($id, 'territorios_origen', $origen);
                    array_push($auditoria['afectados'], $editar);
                    $cambios = true;
                }

                if ($destino != $database['territorios_destino']) {
                    $editar = editCampo($id, 'territorios_destino', $destino);
                    array_push($auditoria['afectados'], $editar);
                    $cambios = true;
                }


                if ($rutas_id != $database['rutas_id']) {
                    $editar = editCampo($id, 'rutas_id', $rutas_id);
                    array_push($auditoria['afectados'], $editar);
                    $cambios = true;
                }

                if ($rutas_origen != $database['rutas_origen']) {
                    $editar = editCampo($id, 'rutas_origen', $rutas_origen);
                    array_push($auditoria['afectados'], $editar);
                    $cambios = true;
                }

                if ($rutas_destino != $database['rutas_destino']) {
                    $editar = editCampo($id, 'rutas_destino', $rutas_destino);
                    array_push($auditoria['afectados'], $editar);
                    $cambios = true;
                }

                if ($rutas_ruta != $database['rutas_ruta']) {
                    $editar = editCampo($id, 'rutas_ruta', json_encode($rutas_ruta));
                    array_push($auditoria['afectados'], $editar);
                    $cambios = true;
                }

                if ($fecha != $database['fecha']) {
                    $editar = editCampo($id, 'fecha', $fecha);
                    array_push($auditoria['afectados'], $editar);
                    $cambios = true;
                }

                if ($cambios) {
                    if ($users_id != $database['users_id']) {
                        $editar = editCampo($id, 'users_id', $users_id);
                    }
                    array_push($anterior, $auditoria);
                    $guias->update($id, 'auditoria', json_encode($anterior));
                    $alert = "success";
                    $message = 'Guía Actualizada. N°: 
                    <button type="button" class="btn btn-sm btn-link" data-toggle="modal" data-target="#exampleModal"
                    onclick="btnShow(\''.$id.'\')" >
                        <strong>' . $codigo . '</strong>
                    </button>
                    ';
                }



                /// Validamos la carga
                $cambiosCarga = false;
                $listarCarga = [];
                for ($i = 1; $i <= $contador; $i++) {
                    $cambiosCarga = false;
                    if (isset($_POST['cantidad_' . $i]) && isset($_POST['descripcion_' . $i])) {
                        $cantidad = $_POST['cantidad_' . $i];
                        $descripcion = $_POST['descripcion_' . $i];

                        if (isset($_POST['carga_id_' . $i])) {
                            //edito
                            $carga_id = $_POST['carga_id_' . $i];

                            $database = $cargamentos->find($carga_id);
                            if ($cantidad != $database['cantidad']) {
                                $cargamentos->update($carga_id, 'cantidad', $cantidad);
                                $cambiosCarga =  true;
                            }

                            if ($descripcion != $database['descripcion']) {
                                $cargamentos->update($carga_id, 'descripcion', $descripcion);
                                $cambiosCarga =  true;
                            }
                        } else {
                            //creo nuevo
                            $datos = [
                                $id,
                                $cantidad,
                                $descripcion
                            ];
                            $cargamentos->save($datos);
                            $cambiosCarga = true;
                        }
                    } else {

                        if (isset($_POST['carga_id_' . $i])) {
                            $carga_id = $_POST['carga_id_' . $i];
                            $cargamentos->delete($carga_id);
                            $cambiosCarga = true;
                        }
                    }
                }


                if ($cambiosCarga) {
                    $array = [
                        'campo' => 'carga',
                        'anterior' => 'no',
                        'nuevo' => 'no',
                    ];
                    array_push($auditoria['afectados'], $array);
                    array_push($anterior, $auditoria);
                    $guias->update($id, 'auditoria', json_encode($anterior));
                    $alert = "success";
                    $message = 'Guía Actualizada. N°: 
                    <button type="button" class="btn btn-sm btn-link" data-toggle="modal" data-target="#exampleModal"
                    onclick="btnShow(\''.$id.'\')" >
                        <strong>' . $codigo . '</strong>
                    </button>
                    ';
                }

                if (!$cambios && !$cambiosCarga) {
                    $alert = "info";
                    $message = "No se Realizó ningún Cambio.";
                }
            }
        } else {
            $alert = "warning";
            $message = "No se guardo, porque Estas intentando crear una guia Duplicada.";
        }
    } else {
        if ($_POST['opcion'] == 'eliminar' && !empty($_POST['id'])) {
            $id = $_POST['id'];
            $user = $_SESSION['id'];
            $hoy = date('Y-m-d');
            $guias = new Guia();

            $editar = $guias->update($id, 'band', 0);
            $editar = $guias->update($id, 'users_id', $user);
            $editar = $guias->update($id, 'deleted_at', $hoy);

            $alert = "info";
            $message = "Guía Eliminada.";
        } 
        if ($_POST['opcion'] == 'anular' && !empty($_POST['id'])) {
            $id = $_POST['id'];
            $user = $_SESSION['id'];
            $hoy = date('Y-m-d');
            $guias = new Guia();

            $editar = $guias->update($id, 'estatus', 0);
            $editar = $guias->update($id, 'users_id', $user);

            $alert = "info";
            $message = "Guía anulada.";
        } 
        
    }
} else {
    $alert = "danger";
    $message = "Deben Enviarse los datos por Method POST";
}

//echo $message;
crearFlashMessage($alert, $message, $ruta);
