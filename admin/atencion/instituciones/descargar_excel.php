<?php
session_start();  
header("Pragma: public");
header("Expires: 0");
$filename = "Instituciones.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

require "../../seguridad.php";
require "../../../mysql/Query.php";

function getInstituciones()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `instituciones` WHERE `band`= 1 ";
    $rows = $query->getAll($sql);
    return $rows;
}

$instituciones = getInstituciones();

?>
<meta charset="utf-8">
<table border="1" lang="es">
    <tbody>
        <tr>
            <th>#</th>
            <th>Rif</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Fecha de Creación </th>
        </tr>
        <?php
        $i = 0;
        foreach($instituciones as $institucion){
        $i++;
        ?>
        <tr>
        <td>
            <?php echo $i; ?>
        </td>
        <td>
            <?php echo $institucion['rif']; ?>
        </td>
        <td>
            <?php echo strtoupper($institucion['nombre']);?>
        </td>
        <td>
            <?php if($institucion['telefono']){echo $institucion['telefono'];}else{ echo "Sin telefono Registrado";}  ?>
        </td>
        <td>
            <?php echo strtoupper($institucion['direccion']); ?>
        </td>
        <td>
            <?php
                $newDate = date("d-m-Y", strtotime($institucion['created_at']));
                echo $newDate; 
            ?>
        </td>

        </tr>
        <?php } ?>
    </tbody>
</table>