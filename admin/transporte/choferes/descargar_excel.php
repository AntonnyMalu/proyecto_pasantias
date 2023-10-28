<?php
session_start();
$raiz = true;
header("Pragma: public");
header("Expires: 0");
$filename = "Choferes.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Choferes.php";
require "../../../model/Empresas.php";
require "../../../model/Vehiculos.php";
require "../../../model/VehiculoTipo.php";

$choferes = new Choferes();
$listarChoferes = $choferes->getAll();

$empresas = new Empresas();
$listarEmpresas = $empresas->getAll();

$vehiculos = new Vehiculos();
$listarVehiculos = $vehiculos->getAll();

$tipos = new VehiculoTipo();



?>
<meta charset="utf-8">
<table border="1" lang="es">
    <tbody>
        <tr>
            <th>Nro</th>
            <th>Nombre y Apellido</th>
            <th>Cédula</th>
            <th>Teléfono</th>
            <th>Tipo</th>
            <th>Marca</th>
            <th>Placa Batea</th>
            <th>color</th>
            <th>Capacidad</th>
            <th>Empresa</th>
        </tr>
        <?php
        $i = 0;
        foreach($listarChoferes as $choferes){
            $getEmpresas = $empresas->find($choferes['empresas_id']);
            $getVehiculo = $vehiculos->find($choferes['vehiculos_id']);
            $getTipo = $tipos->find($getVehiculo['tipo']);
        $i++;
        ?>
        <tr>
        <td>
            <?php echo $i; ?>
        </td>
        <td>
            <?php echo strtoupper($choferes['nombre']); ?>
        </td>
        <td>
            <?php echo strtoupper($choferes['cedula']);?>
        </td>
        <td>
            <?php echo strtoupper($choferes['telefono'])  ?>
        </td>
        <td>
            <?php echo strtoupper($getTipo['nombre']); ?>
        </td>
        <td>
            <?php echo strtoupper($getVehiculo['marca']); ?>
        </td>

        <td>
            <?php echo strtoupper($getVehiculo['placa_batea']); ?>
        </td>

        <td>
            <?php echo strtoupper($getVehiculo['color']); ?>
        </td>

        <td>
            <?php echo strtoupper($getVehiculo['capacidad']); ?>
        </td>

        <td>
            <?php echo strtoupper($getEmpresas['nombre']); ?>
        </td>

        </tr>
        <?php } ?>
    </tbody>
</table>