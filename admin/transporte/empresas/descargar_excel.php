<?php
session_start();
$raiz = true;
header("Pragma: public");
header("Expires: 0");
$filename = "Empresas de Transporte.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

require "../../seguridad.php";
require "../../../mysql/Query.php";
require "../../../model/Empresas.php";

$empre = new Empresas();
$empresas = $empre->getAll();
?>
<meta charset="utf-8">
<table border="1" lang="es">
    <tbody>
        <tr>
            <th style="background: #eee;">#</th>
            <th style="background: #eee;">Rif</th>
            <th style="background: #eee;">Nombre</th>
            <th style="background: #eee;">Responsable</th>
            <th style="background: #eee;">Teléfono</th>
        </tr>
        <?php
        $i = 0;
        foreach($empresas as $empresa){
        $i++;
        ?>
        <tr>
        <td>
            <?php echo $i; ?>
        </td>
        <td>
            <?php echo strtoupper($empresa['rif']); ?>
        </td>
        <td>
            <?php echo strtoupper($empresa['nombre']);?>
        </td>
        <td>
            <?php if($empresa['responsable']){ echo strtoupper($empresa['responsable']);}else{ echo "NO REGISTRADO";}?>
        </td>
        <td>
            <?php if($empresa['telefono']){echo $empresa['telefono'];}else{ echo "SIN TELEFONO REGISTRADO";}  ?>
        </td>

        </tr>
        <?php } ?>
    </tbody>
</table>