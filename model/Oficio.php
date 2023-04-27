<?php 

class Oficio
{
    function getAll()
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `oficios` WHERE `band`= 1; ";
        $rows = $query->getAll($sql);
        return $rows;
    }

    function delete($id)
    {
        $row = null;
        $query = new Query();
            $hoy = date("Y-m-d");
            $sql = "UPDATE `oficios` SET `band`='0' WHERE  `id`=$id;";
            $row = $query->save($sql);
            return $row;
    }
    
    function setStatus($id,$status)
    {
        $row = null;
        $query = new Query();
        $sql = "UPDATE `oficios` SET `status`='$status' WHERE  `id`='$id';";
            $row = $query->save($sql);
            return $row;
    }

    function getFirst($id)
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `oficios` WHERE `id` = $id;";
        $rows = $query->getFirst($sql);
        return $rows;
    }
    
    function save($institucion_id, $persona_id, $fecha, $requerimientos)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $sql = "INSERT INTO `oficios` (`instituciones_id`, `personas_id`, `fecha`, `requerimientos`) 
        VALUES ('$institucion_id', '$persona_id', '$fecha', '$requerimientos');";
        $row = $query->save($sql);
        return $row;
    }

    function update($id, $institucion_id, $persona_id, $fecha, $requerimientos)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $sql = "UPDATE `oficios` SET `instituciones_id`='$institucion_id', `personas_id`='$persona_id', `fecha`='$fecha', `requerimientos`='$requerimientos' WHERE  `id`=$id;";
        $row = $query->save($sql);
        return $row;
    }

}