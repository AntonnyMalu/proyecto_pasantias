<?php

class Empresas{

   public function getAll()
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `empresas` WHERE `band`= 1 ;";
        $rows = $query->getAll($sql);

        return $rows;
    }

    public function existe($rif, $id=null){
        $row = null;
        $query = new Query();
        if(!$id){
            $sql1 = "SELECT * FROM `empresas` WHERE `rif` = '$rif' AND `band` = '1'";
        }else{
            $sql1 = "SELECT * FROM `empresas` WHERE `rif` = '$rif' AND `band` = '1' AND `id` != '$id'";
        }
        $exite = $query->getFirst($sql1);
        if($exite){
            return true;
        }else{
            return false;
        }
    }

    public function save($id, $rif, $nombre, $responsable, $telefono)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $existe = $this->existe($rif, $id);
        if(!$existe){
            $sql = "INSERT INTO `empresas` (`rif`, `nombre`, `responsable`, `telefono`, `created_at`) VALUES ('$rif', '$nombre', '$responsable', '$telefono', '$hoy');";
            $row = $query->save($sql);
            return $row;
        }else{
            return false;
        }
    }

   public function update($id, $rif, $nombre, $responsable, $telefono)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $existe = $this->existe($rif, $id);
        if(!$existe){
            $sql = "UPDATE `empresas` SET `rif`='$rif', `nombre`='$nombre', `responsable`='$responsable', `telefono`='$telefono', `updated_at`='$hoy' WHERE  `id`=$id;";
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
        $sql1 = "SELECT * FROM `empresas` WHERE `id` = $id;";
        $empresa = $query->getFirst($sql1);

        if ($empresa) {
            $hoy = date("Y-m-d");
            $sql = "UPDATE `empresas` SET `band`='0', `updated_at`='$hoy' WHERE  `id`=$id;";
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
        $sql = "SELECT * FROM `empresas` WHERE `id`= '$id'; ";
        $rows = $query->getfirst($sql);   
        return $rows;  
    }
}