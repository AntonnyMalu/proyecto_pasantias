<?php
session_start(); 
header("Pragma: public");
header("Expires: 0");
$filename = "Listado de Personas.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

require "../seguridad.php";
require "../../mysql/Query.php";

function getPersonas()
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `personas` WHERE `band`= 1 ";
    $rows = $query->getAll($sql);
    return $rows;
}

$personas = getPersonas();

?>
<meta charset="utf-8">
<table border="1" lang="es">
    <tbody>
        <tr>
            <th>#</th>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Fecha de Creación </th>
        </tr>
        <?php
        $i = 0;
        foreach($personas as $persona){
        $i++;
        ?>
        <tr>
        <td>
            <?php echo $i; ?>
        </td>
        <td>
            <?php echo $persona['cedula']; ?>
        </td>
        <td>
            <?php echo strtoupper($persona['nombre']);?>
        </td>
        <td>
            <?php if($persona['telefono']){echo $persona['telefono'];}else{ echo "Sin telefono Registrado";}  ?>
        </td>
        <td>
            <?php echo strtoupper($persona['direccion']); ?>
        </td>
        <td>
            <?php
                $newDate = date("d-m-Y", strtotime($persona['created_at']));
                echo $newDate; 
            ?>
        </td>

        </tr>
        <?php } ?>
    </tbody>
</table>