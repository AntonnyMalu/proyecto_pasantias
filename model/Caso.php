<?php

class Caso
{
    function getAll()
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `casos` WHERE `band`= 1; ";
        $rows = $query->getAll($sql);
        return $rows;
    }

    //crear
    function save($persona_id, $fecha, $hora, $donativo, $tipo, $status, $observacion)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $sql = "INSERT INTO `casos` (`personas_id`, `fecha`, `hora`, `donativo`, `tipo`, `status`, `observacion`, `created_at`) VALUES ('$persona_id', '$fecha', '$hora', '$donativo', '$tipo', '$status', '$observacion', '$hoy');";
        $row = $query->save($sql);
        return $row;
    }

    //editar
    function setStatus($id,$status)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $sql = "UPDATE `casos` SET `status`='$status', `updated_at`='$hoy' WHERE  `id`='$id';";
        $row = $query->save($sql);
        return $row;
    }

    function delete($id)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $sql = "UPDATE `casos` SET `band`='0', `updated_at`='$hoy' WHERE  `id`=$id;";
        $row = $query->save($sql);
        return $row;
    }
}