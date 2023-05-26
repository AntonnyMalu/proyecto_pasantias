<?php
session_start();
$raiz = true;
require "../../seguridad.php";
//require "../../../mysql/Query.php";
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
require "../../../model/Parametro.php";

$ruta = "../guias";

function existeGuia($id, $guias_tipos_id, $codigo, $vehiculos_id, $choferes_id, $territorios_origen, $territorios_destino, $fecha)
{
    $resultado = [
        'resultado' => false,
        'message' => null,
    ];
    $guias = new Guia();

    $numeroGuia = explode('-', $codigo);
    $numeroGuia = '%' . $numeroGuia[1] . '%';


    $existeCodigo = $guias->existe('codigo', 'LIKE', $numeroGuia, $id, 1);
    if ($existeCodigo) {
        $resultado['resultado'] = true;
        $resultado['message'] = "El código de Guía ya esta Registrado";
    }

    /*  $query = new Query();
    $extra = null;
    if (!empty($id)) {
        $extra = "AND `id` != '$id'";
    }
    //validacion completa
    $sql = "SELECT * FROM `guias` WHERE 
    `guias_tipos_id` = '$guias_tipos_id' AND 
    `vehiculos_id` = '$vehiculos_id' AND
    `choferes_id` = '$choferes_id' AND
    `territorios_origen` = '$territorios_origen' AND 
    `territorios_destino` = '$territorios_destino' AND
    `fecha` = '$fecha'
    $extra
    ; ";
    $row = $query->getFirst($sql);
    if ($row) {
        $resultado['resultado'] = true;
        $resultado['message'] = "Todos los datos coinciden con una guía anterior, execto el codigo";
    }

    //validacion excluyendo al chofer
    $sql = "SELECT * FROM `guias` WHERE 
    `guias_tipos_id` = '$guias_tipos_id' AND 
    `vehiculos_id` = '$vehiculos_id' AND
    `territorios_origen` = '$territorios_origen' AND 
    `territorios_destino` = '$territorios_destino' AND
    `fecha` = '$fecha'
    $extra
    ; ";
    $row = $query->getFirst($sql);
    if ($row) {
        $resultado['resultado'] = true;
        $resultado['message'] = "Todos los datos coinciden con una guía anterior, execto el codigo y el chofer.";
    }

    //validacion excluyendo a vehiculo
    $sql = "SELECT * FROM `guias` WHERE 
    `guias_tipos_id` = '$guias_tipos_id' AND 
    `choferes_id` = '$choferes_id' AND
    `territorios_origen` = '$territorios_origen' AND 
    `territorios_destino` = '$territorios_destino' AND
    `fecha` = '$fecha'
    $extra
    ; ";
    $row = $query->getFirst($sql);
    if ($row) {
        $resultado['resultado'] = true;
        $resultado['message'] = "Todos los datos coinciden con una guía anterior, execto el codigo y el vehículo";
    }*/


    return $resultado;
}

function existeRuta($origen, $destino)
{
    $row = null;
    $query = new Query();
    $sql = "SELECT * FROM `rutas` WHERE `origen` = '$origen' AND `destino` = '$destino' AND `band` = 1;";
    $ruta = $query->getFirst($sql);
    if ($ruta) {
        $row = $ruta;
    } else {
        $sql = "SELECT * FROM `rutas` WHERE `origen` = '$destino' AND `destino` = '$origen' AND `band` = 1;";
        $ruta = $query->getFirst($sql);
        if ($ruta) {
            $ruta['ruta'] = array_reverse(json_decode($ruta['ruta']));
            $row = $ruta;
        }
    }

    return $row;
}

function getFormato()
{
    $query = new Query();
    $sql = "SELECT * FROM `guias_formatos_pdf` ORDER BY `id` DESC LIMIT 1;";
    $row = $query->getFirst($sql);
    if ($row) {
        return $row['id'];
    } else {
        return false;
    }
}

if ($_POST) {
    $parametros = new Parametro();
    $guias = new Guia();
    $opcion = $_POST['opcion'];
    $hoy = date('Y-m-d');

    if (
        !empty($_POST['guias_tipos_id']) &&
        !empty($_POST['codigo']) &&
        !empty($_POST['vehiculos_id']) &&
        !empty($_POST['choferes_id']) &&
        !empty($_POST['origen']) &&
        !empty($_POST['destino']) &&
        !empty($_POST['fecha'])
    ) {
        $guias_tipos_id = $_POST['guias_tipos_id'];
        $codigo = $_POST['codigo'];
        $vehiculos_id = $_POST['vehiculos_id'];
        $choferes_id = $_POST['choferes_id'];
        $territorios_origen = $_POST['origen'];
        $territorios_destino = $_POST['destino'];
        $fecha = $_POST['fecha'];
        $users_id = $_SESSION['id'];
        $id = $_POST['id'];
        $contador = $_POST['contador'];

        $guiasTipos = new GuiaTipo();
        $guiasCargas = new GuiaCargamento();
        $vehiculos = new Vehiculos();
        $vehiculosTipo = new VehiculoTipo();
        $choferes = new Choferes();
        $rutas = new Rutas();
        $rutasTerritorio = new RutasTerritorio();
        $guiaFormatos = new GuiaFormato();

        $getTipo = $guiasTipos->find($guias_tipos_id);
        $tipos_nombre = $getTipo['nombre'];

        $getVehiculo = $vehiculos->find($vehiculos_id);
        $vehiculos_tipo_id = $getVehiculo['tipo'];
        $vehiculos_marca = $getVehiculo['marca'];
        $vehiculos_placa_batea = $getVehiculo['placa_batea'];
        $vehiculos_placa_chuto = $getVehiculo['placa_chuto'];
        $vehiculos_color = $getVehiculo['color'];
        $vehiculos_capacidad = $getVehiculo['capacidad'];
        $getTipoVehiculo = $vehiculosTipo->find($vehiculos_tipo_id);
        $vehiculos_tipo = $getTipoVehiculo['nombre'];

        $getChoferes = $choferes->find($choferes_id);
        $choferes_cedula = $getChoferes['cedula'];
        $choferes_nombre = $getChoferes['nombre'];
        $choferes_telefono = $getChoferes['telefono'];

        $getRuta = existeRuta($territorios_origen, $territorios_destino);
        if ($getRuta) {

            $rutas_id = $getRuta['id'];
            $rutas_ruta = $getRuta['ruta']; //posible json_decode

            $getOrigen = $rutasTerritorio->find($territorios_origen);
            $getDestino = $rutasTerritorio->find($territorios_destino);
            $rutas_origen = $getOrigen['parroquia'];
            $rutas_destino = $getDestino['parroquia'];


            $pdf_id = getFormato();
            if ($pdf_id) {

                $data = [
                    $codigo,
                    $guias_tipos_id,
                    $tipos_nombre,
                    $vehiculos_id,
                    $vehiculos_tipo,
                    $vehiculos_marca,
                    $vehiculos_placa_batea,
                    $vehiculos_placa_chuto,
                    $vehiculos_capacidad,
                    $vehiculos_color,
                    $choferes_id,
                    $choferes_cedula,
                    $choferes_nombre,
                    $choferes_telefono,
                    $territorios_origen,
                    $territorios_destino,
                    $rutas_id,
                    $rutas_origen,
                    $rutas_destino,
                    $rutas_ruta,
                    $fecha,
                    $users_id,
                    $hoy,
                    $pdf_id
                ];

                $existeGuia = existeGuia($id, $guias_tipos_id, $codigo, $vehiculos_id, $choferes_id, $territorios_origen, $territorios_destino, $fecha);
                if (!$existeGuia['resultado']) {

                    if ($opcion == "guardar") {

                        $guardar = $guias->save($data);
                        $getGuia = $guias->first('codigo', '=', $codigo);
                        $id = $getGuia['id'];
                        //incrementar numero de guia
                        $guias_num_init = intval($_POST['guias_num_init']) + 1;
                        $existeParametro = $parametros->existe('nombre', '=', 'guias_num_init');
                        if ($existeParametro) {
                            $editar = $parametros->update($existeParametro['id'], 'valor', $guias_num_init);
                        } else {
                            $dataParametro = [
                                "guias_num_init",
                                0,
                                $guias_num_init
                            ];
                            $guardar = $parametros->save($dataParametro);
                        }

                        //guardo la carga
                        for ($i = 1; $i <= $contador; $i++) {
                            if (isset($_POST['cantidad_' . $i])) {
                                $cantidad = $_POST['cantidad_' . $i];
                                $descripcion = $_POST['descripcion_' . $i];
                                $dataCarga = [
                                    $id,
                                    $cantidad,
                                    $descripcion
                                ];

                                $guardarCarga = $guiasCargas->save($dataCarga);
                            }
                        }
                        $alert = "success";
                        $message = 'Guia creada Exitosamente. <button type="button" data-toggle="modal" data-target="#exampleModal"  class="btn text-primary" onclick="btnShow(\'' . $id . '\')"><strong>' . $codigo . '</strong></button>';
                    }



                    if ($opcion == "editar") {

                        $seEdito = false;
                        $editOrigen = false;
                        $editDestino = false;
                        $database = $guias->find($id);


                        //editando guia
                        if ($database['guias_tipos_id'] != $guias_tipos_id) {
                            $editar = $guias->update($id, 'guias_tipos_id', $guias_tipos_id);
                            $editar = $guias->update($id, 'tipos_nombre', $tipos_nombre);
                            $seEdito = true;
                        }

                        if ($database['codigo'] != $codigo) {
                            $editar = $guias->update($id, 'codigo', $codigo);
                            $seEdito = true;
                        }

                        if ($database['vehiculos_id'] != $vehiculos_id) {
                            $editar = $guias->update($id, 'vehiculos_id', $vehiculos_id);
                            $editar = $guias->update($id, 'vehiculos_tipo', $vehiculos_tipo);
                            $editar = $guias->update($id, 'vehiculos_marca', $vehiculos_marca);
                            $editar = $guias->update($id, 'vehiculos_placa_batea', $vehiculos_placa_batea);
                            $editar = $guias->update($id, 'vehiculos_placa_chuto', $vehiculos_placa_chuto);
                            $editar = $guias->update($id, 'vehiculos_color', $vehiculos_color);
                            $editar = $guias->update($id, 'vehiculos_capacidad', $vehiculos_capacidad);
                            $seEdito = true;
                        }

                        if ($database['choferes_id'] != $choferes_id) {
                            $editar = $guias->update($id, 'choferes_id', $choferes_id);
                            $editar = $guias->update($id, 'choferes_cedula', $choferes_cedula);
                            $editar = $guias->update($id, 'choferes_nombre', $choferes_nombre);
                            $editar = $guias->update($id, 'choferes_telefono', $choferes_telefono);
                            $seEdito = true;
                        }

                        if ($database['territorios_origen'] != $territorios_origen) {
                            $editar = $guias->update($id, 'territorios_origen', $territorios_origen);
                            $editar = $guias->update($id, 'rutas_origen', $rutas_origen);
                            $seEdito = true;
                            $editOrigen = true;
                        }

                        if ($database['territorios_destino'] != $territorios_destino) {
                            $editar = $guias->update($id, 'territorios_destino', $territorios_destino);
                            $editar = $guias->update($id, 'rutas_destino', $rutas_destino);
                            $seEdito = true;
                            $editDestino = true;
                        }

                        if ($database['rutas_id'] != $rutas_id) {
                            $editar = $guias->update($id, 'rutas_id', $rutas_id);
                            $editar = $guias->update($id, 'rutas_ruta', $rutas_ruta);
                            $seEdito = true;
                        }

                        if ($editOrigen && $editDestino) {
                            $editar = $guias->update($id, 'rutas_ruta', json_encode($rutas_ruta));
                            $seEdito = true;
                        }

                        if ($database['fecha'] != $fecha) {
                            $editar = $guias->update($id, 'fecha', $fecha);
                            $seEdito = true;
                        }

                        //editando carga
                        $listarCarga = $guiasCargas->getList('guias_id', '=', $id);
                        foreach ($listarCarga as $carga) {
                            $guiasCargas->delete($carga['id']);
                        }
                        for ($i = 1; $i <= $contador; $i++) {
                            if (isset($_POST['cantidad_' . $i])) {
                                $cantidad = $_POST['cantidad_' . $i];
                                $descripcion = $_POST['descripcion_' . $i];

                                //creo cargamento
                                $dataCarga = [
                                    $id,
                                    $cantidad,
                                    $descripcion
                                ];
                                $guardarCarga = $guiasCargas->save($dataCarga);

                                $seEdito = true;
                            }
                        }

                        if ($seEdito) {
                            $eliminar = $guias->update($id, 'users_id', $_SESSION['id']);
                            $alert = "success";
                            $message = "Guía Actualizada";
                        } else {
                            $alert = "warning";
                            $message = "No realizaste ningun Cambio.";
                        }
                    }
                } else {
                    $alert = "warning";
                    $message = "Guía Duplicada, " . $existeGuia['message'];
                }
            } else {
                $alert = "danger";
                $message = "NO SE HA DEFINIDO NIGUN FORMATO DE GUIA EN LA BASE DE DATOS, CONTACTE CON SU ADMINISTRADOR.";
            }
        } else {
            $alert = "warning";
            $message = "Ruta NO encontrada.";
        }
    } else {

        if ($opcion == "incrementar_contador") {

            if (!empty($_POST['guias_num_init'])) {

                $guias_num_init = intval($_POST['guias_num_init']);
                $imprimir = false;


                $existe = $parametros->existe('nombre', '=', 'guias_num_init');
                if ($existe) {

                    if ($existe['valor'] < $guias_num_init || $_SESSION['role'] > 98) {
                        $editar = $parametros->update($existe['id'], 'valor', $guias_num_init);
                        $imprimir = true;
                    } else {
                        $alert = "warning";
                        $message = "Número Siguiente NO puede ser Menor ó Igual al Valor Actual.";
                    }
                } else {
                    $data = [
                        'guias_num_init',
                        0,
                        $guias_num_init
                    ];
                    $guardar = $parametros->save($data);
                    $imprimir = true;
                }


                if ($imprimir) {
                    $alert = "success";
                    $message =  "Número Siguiente Actualizado.";
                }
            } else {
                $alert = "warning";
                $message = "El Número de la siguiente Guía no puede estar Vacío.";
            }
        } else {
            if ($opcion == "eliminar") {
                $id = $_POST['id'];
                $eliminar = $guias->update($id, 'band', 0);
                $eliminar = $guias->update($id, 'deleted_at', $hoy);
                $eliminar = $guias->update($id, 'users_id', $_SESSION['id']);

                $alert = "success";
                $message = "Eliminado Exitosamente";
            } else {
                if ($opcion == "anular") {
                    $id = $_POST['id'];
                    $anular = $guias->update($id, 'estatus', 0);
                    $anular = $guias->update($id, 'users_id', $_SESSION['id']);
                    $alert = 'success';
                    $message = "Guía Anulada.";


                } else {
                    $alert = "warning";
                    $message = "Faltan Datos";
                }
            }
        }
    }
} else {
    $alert = "danger";
    $message = "Se deben enviar los datos por el metodo POST";
}
echo $message;
crearFlashMessage($alert, $message, $ruta);
