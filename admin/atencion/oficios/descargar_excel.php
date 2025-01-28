<?php 
session_start(); 
header("Pragma: public");
header("Expires: 0");
$filename = "Oficios Recibidos.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

require "../../seguridad.php";
require "../../../mysql/Query.php";

function getOficios()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `oficios` WHERE `band`= 1 ";
    $rows = $query->getAll($sql);
    return $rows;
}
function getInstituciones($id)
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `instituciones` WHERE `id`= '$id'; ";
    $rows = $query->getfirst($sql);
    return $rows;
}

$oficios = getOficios();


?>
<meta charset="utf-8">
<table border="1">
<tbody>
    <tr>
        <th>#</th>
        <th>Fecha</th>
        <th>Institución</th>
        <th>Requerimiento</th>
        <th>Aprobación</th>
        <th>Teléfono</th>
        
    </tr>
    <?php 
    $i=0;
    foreach($oficios as $oficio){ 
        $i++;
        $institucion = getInstituciones($oficio['instituciones_id']);
        ?>
    <tr>
        <td>
            <?php echo $i; ?>
        </td>
        <td>
        <?php
                $newDate = date("d-m-Y", strtotime($oficio['fecha']));
                echo $newDate; 
            ?>
        </td>
        <td>
            <?php echo strtoupper($institucion['nombre']); ?>
        </td>
        <td>
            <?php echo strtoupper($oficio['requerimientos']); ?>
        </td>
        <td>
            <?php echo $oficio['status']; ?>
        </td>
        <td><?php echo $institucion['telefono']; ?></td>

        
        
    </tr>
    <?php } ?>
</tbody>
</table>