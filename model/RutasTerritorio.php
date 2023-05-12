<?php

class RutasTerritorio
{

    public function getAll()
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `rutas_territorio`;";
        $rows = $query->getAll($sql);
        return $rows;
    }

    public function find($id)
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `rutas_territorio` WHERE `id`= '$id'; ";
        $rows = $query->getfirst($sql);   
        return $rows;  
    }
}