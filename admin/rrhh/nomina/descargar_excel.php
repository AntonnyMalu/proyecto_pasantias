<?php
session_start();
header("Pragma: public");
header("Expires: 0");
$filename = "Nómina.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Nomina.php";
require "../../../model/NominaCargo.php";
require "../../../model/NominaUbicaciones.php";


$dataNomina = new Nomina();
$cargos = new NominaCargo();
$ubicaciones = new NominaUbicaciones();

$listarNomina = $dataNomina->getAll(1);



?>
<meta charset="utf-8">
<table border="1" lang="es">
    <tbody>
        <tr>
            <th>#</th>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Cargo Original</th>
            <th>Cargo database</th>
            <th>Ubicación Geográfica</th>
            <th>Database Geográfica </th>
            <th>Ubicación Administrativa</th>
            <th>Database Administrativa</th>
        </tr>
        <?php
        $i = 0;
        foreach ($listarNomina as $nomina) {
            $getCargo = $cargos->find($nomina['cargos_id']);
            if ($nomina['administrativa_id']) {
                $getAdministrativa = $ubicaciones->find($nomina['administrativa_id']);
                $label_admin = strtoupper($getAdministrativa['nombre']);
            } else {
                $label_admin = "";
            }
            if ($nomina['geografica_id']) {
                $getGeografica = $ubicaciones->find($nomina['geografica_id']);
                $label_geo = strtoupper($getGeografica['nombre']);
            } else {
                $label_geo = "";
            }
        ?>
            <tr>
                <td>
                    <?php echo $i++; ?>
                </td>
                <td>
                    <?php echo $nomina['cedula']; ?>
                </td>
                <td>
                    <?php echo strtoupper($nomina['nombre']); ?>
                </td>
                <td>
                    <?php echo strtoupper($nomina['cargo'])  ?>
                </td>
                <td>
                    <?php echo strtoupper($getCargo['cargo'])  ?>
                </td>
                <td>
                <?php echo strtoupper($nomina['ubicacion_geografica'])  ?>
                </td>
                <td>
                <?php echo strtoupper($label_geo)  ?>
                </td>
                <td>
                <?php echo strtoupper($nomina['ubicacion_administrativa'])  ?>
                </td>
                <td>
                <?php echo strtoupper($label_admin)  ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>