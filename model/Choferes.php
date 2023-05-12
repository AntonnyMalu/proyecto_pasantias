<?php

class Choferes
{

    public function getAll()
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `choferes` WHERE `band`= 1 ;";
        $rows = $query->getAll($sql);

        return $rows;
    }

    public function existe($cedula, $id=null){
        $row = null;
        $query = new Query();
        if(!$id){
            $sql1 = "SELECT * FROM `choferes` WHERE `cedula` = '$cedula' AND `band` = '1'";
        }else{
            $sql1 = "SELECT * FROM `choferes` WHERE `cedula` = '$cedula' AND `band` = '1' AND `id` != '$id'";
        }
        $exite = $query->getFirst($sql1);
        if($exite){
            return true;
        }else{
            return false;
        }
    }

    public function save($id, $empresas_id, $vehiculos_id, $cedula, $nombre, $telefono)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $existe = $this->existe($cedula, $id);
        if(!$existe){
            $sql = "INSERT INTO `choferes` (`empresas_id`, `vehiculos_id`, `cedula`, `nombre`, `telefono`, `created_at`) VALUES ('$empresas_id', '$vehiculos_id', '$cedula', '$nombre', '$telefono', '$hoy');";
            $row = $query->save($sql);
            return $row;
        }else{
            return false;
        }
    }

    public function update($id, $empresas_id, $vehiculos_id, $cedula, $nombre, $telefono)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $existe = $this->existe($cedula, $id);
        if(!$existe){
            $sql = "UPDATE `choferes` SET `empresas_id`='$empresas_id', `vehiculos_id`='$vehiculos_id', `cedula`='$cedula', `nombre`='$nombre', `telefono`='$telefono', `updated_at`='$hoy' WHERE  `id`='$id';";
            $row = $query->save($sql);
            return $row;
        }else{
            return false;
        }

    }

    public function delete($id)
    {
        $row = null;
        $query = new Query();
        $sql1 = "SELECT * FROM `choferes` WHERE `id` = $id;";
        $empresa = $query->getFirst($sql1);

        if ($empresa) {
            $hoy = date("Y-m-d");
            $sql = "UPDATE `choferes` SET `band`='0', `updated_at`='$hoy' WHERE  `id`=$id;";
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
        $sql = "SELECT * FROM `choferes` WHERE `id`= '$id'; ";
        $rows = $query->getfirst($sql);   
        return $rows;  
    }


}