<?php 
session_start(); 
header("Pragma: public");
header("Expires: 0");
$filename = "Casos Sociales.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

require "../seguridad.php";
require "../../mysql/Query.php";

function getCasos()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `casos` WHERE `band`= 1 ";
    $rows = $query->getAll($sql);
    return $rows;
}
function getPersonas($id)
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `personas` WHERE `id`= '$id'; ";
    $rows = $query->getfirst($sql);
    return $rows;
}

$casos = getCasos();
?>
<meta charset="utf-8">
<table border="1">
    <tbody>
        <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Nombre y Apellido</th>
            <th>Cédula</th>
            <th>Donativo</th>
            <th>Hora</th>
            <th>Dirección</th>
            <th>Aprobación</th>
        </tr>
        <?php 
        $i=0;
        foreach($casos as $caso){ 
            $i++;
            $persona = getPersonas($caso['personas_id']);
            ?>
        <tr>
            <td>
                <?php echo $i; ?>
            </td>
            <td>
            <?php
                $newDate = date("d-m-Y", strtotime($caso['fecha']));
                echo $newDate; 
            ?>
            </td>
            <td>
                <?php echo strtoupper($persona['nombre']); ?>
            </td>
            <td>
                <?php echo $persona['cedula']; ?>
            </td>
            <td>
                <?php echo $caso['donativo']; ?>
            </td>
            <td>
                <?php echo $caso['hora']; ?>
            </td>
            <td>
                <?php echo $persona['direccion']; ?>
            </td>
            <td>
            <?php echo $caso['status']; ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>