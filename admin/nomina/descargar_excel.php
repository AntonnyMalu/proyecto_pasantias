<?php
session_start(); 
header("Pragma: public");
header("Expires: 0");
$filename = "Nómina.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

require "../seguridad.php";
require "../../mysql/Query.php";


function getNomina()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `nomina` WHERE `band`= 1 ";
    $rows = $query->getAll($sql);
    return $rows;
}

$listar_nomina = getNomina();

?>
<meta charset="utf-8">
<table border="1" lang="es">
    <tbody>
        <tr>
            <th>#</th>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Ubicación Geográfica</th>
            <th>Ubicación Administrativa</th>
        </tr>
        <?php
        $i = 0;
        foreach($listar_nomina as $nomina){
        $i++;
        ?>
        <tr>
        <td>
            <?php echo $i; ?>
        </td>
        <td>
            <?php echo $nomina['cedula']; ?>
        </td>
        <td>
            <?php echo strtoupper($nomina['nombre']);?>
        </td>
        <td>
            <?php echo strtoupper($nomina['cargo'])  ?>
        </td>
        <td>
            <?php echo strtoupper($nomina['ubicacion_geografica']); ?>
        </td>
        <td>
            <?php echo strtoupper($nomina['ubicacion_administrativa']); ?>
        </td>

        </tr>
        <?php } ?>
    </tbody>
</table>