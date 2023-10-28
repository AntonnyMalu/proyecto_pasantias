<?php
session_start();
$raiz = true;
header("Pragma: public");
header("Expires: 0");
$filename = "Vehículos.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Vehiculos.php";
require "../../../model/Empresas.php";
require "../../../model/VehiculoTipo.php";

$vehiculos = new Vehiculos();
$listarVehiculos = $vehiculos->getAll();

$tipos = new VehiculoTipo();
$listarTipos = $tipos->getAll();




?>
<meta charset="utf-8">
<table border="1" lang="es">
    <tbody>
        <tr">
            <th style="background-color: #ccc;">#</th>
            <th style="background-color: #ccc;">Empresa</th>
            <th style="background-color: #ccc;">Placa Batea</th>
            <th style="background-color: #ccc;">Placa Chuto</th>
            <th style="background-color: #ccc;">Tipo</th>
            <th style="background-color: #ccc;">Marca</th>
            <th style="background-color: #ccc;">Color</th>
            <th style="background-color: #ccc;">Capacidad</th>

        </tr>
        <?php
        $i = 0;
        foreach($listarVehiculos as $vehiculos){
            $i++;
            $empresas = new Empresas();
            $getEmpresas = $empresas->find($vehiculos['empresas_id']);

        ?>
        <tr>
        <td>
            <?php echo $i; ?>
        </td>
        <td>
            <?php echo strtoupper($getEmpresas['nombre']); ?>
        </td>
        <td>
            <?php echo strtoupper(strtoupper($vehiculos['placa_batea']));?>
        </td>
        <td>
            <?php echo strtoupper(strtoupper($vehiculos['placa_chuto']));?>
        </td>
        <td>
        <?php 
            $getTipo = $tipos->find($vehiculos['tipo']);
            if($getTipo){
            echo $getTipo['nombre'];
            }else{
            echo "NO DEFINIDO";
            }
            ?>
        </td>
        <td>
            <?php echo strtoupper($vehiculos['marca']); ?>
        </td>
        <td>
            <?php echo strtoupper($vehiculos['color']); ?>
        </td>
        <td>
            <?php echo strtoupper($vehiculos['capacidad']); ?>
        </td>

        </tr>
        <?php } ?>
    </tbody>
</table>