<?php

class VehiculoTipo
{
    public function getAll()
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `vehiculos_tipo`;";
        $rows = $query->getAll($sql);
        return $rows;
    }

    public function find($id)
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `vehiculos_tipo` WHERE `id` = '$id';";
        $rows = $query->getFirst($sql);
        return $rows;
    }
}