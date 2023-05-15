<?php

class Vehiculos
{

    function getAll()
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `vehiculos` WHERE `band`= 1 ";
        $rows = $query->getAll($sql);
        return $rows;
    }

    function existe($placa, $id=null, $campo=null){
        $row = null;
        $query = new Query();
        if(!$id){
            $sql1 = "SELECT * FROM `vehiculos` WHERE `$campo` = '$placa' AND `band` = '1'";
        }else{
            $sql1 = "SELECT * FROM `vehiculos` WHERE `$campo` = '$placa' AND `band` = '1' AND `id` != '$id'";
        }
        $exite = $query->getFirst($sql1);
        if($exite){
            return true;
        }else{
            return false;
        }
    }

    function save($id, $empresas_id, $tipo, $marca, $placa, $chuto, $capacidad, $color)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $existePlaca = $this->existe($placa, $id, "placa_batea");
        $existePlacaChuto = $this->existe($placa, $id, "placa_chuto");
        $existeChuto = $this->existe($chuto, $id, "placa_chuto");
        $existeChutoPlaca = $this->existe($chuto, $id, "placa_batea");
        if(!$existePlaca && !$existePlacaChuto){
            $sql = "INSERT INTO `vehiculos` (`empresas_id`, `tipo`, `marca`, `placa_batea`, `placa_chuto`, `color`, `capacidad`, `created_at`) 
            VALUES ('$empresas_id', '$tipo', '$marca', '$placa', '$chuto', '$color', '$capacidad', '$hoy');";
            $row = $query->save($sql);
            return $row;
        }else{
            return false;
        }
    }

    function update($id, $empresas_id, $tipo, $marca, $placa, $chuto, $capacidad, $color)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $existePlaca = $this->existe($placa, $id, "placa_batea");
        $existePlacaChuto = $this->existe($placa, $id, "placa_chuto");
        $existeChuto = $this->existe($chuto, $id, "placa_chuto");
        $existeChutoPlaca = $this->existe($chuto, $id, "placa_batea");
        if(!$existePlaca && !$existePlacaChuto){
            $sql = "UPDATE `vehiculos` SET 
            `empresas_id`='$empresas_id', 
            `tipo`='$tipo', `marca`='$marca', 
            `placa_batea`='$placa',
            `placa_chuto`='$chuto', 
            `color`='$color', 
            `capacidad`='$capacidad', 
            `updated_at`='$hoy' 
            WHERE  `id`='$id';";
            $row = $query->save($sql);
            return $row;
        }else{
            return false;
        }
    }

    function delete($id)
    {
        $row = null;
        $query = new Query();
        $sql1 = "SELECT * FROM `vehiculos` WHERE `id` = $id;";
        $empresa = $query->getFirst($sql1);

        if ($empresa) {
            $hoy = date("Y-m-d");
            $sql = "UPDATE `vehiculos` SET `band`='0', `updated_at`='$hoy' WHERE  `id`=$id;";
            $row = $query->save($sql);
            return $row;
        } else {
            return false;
        }
    }

    public function find($id)
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `vehiculos` WHERE `id` = '$id';";
        $rows = $query->getFirst($sql);
        return $rows;
    }
    
}