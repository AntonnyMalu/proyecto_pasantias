<?php

class Firmante
{
    function getAll()
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `firmantes` WHERE `band`= 1 ";
        $rows = $query->getAll($sql);
        return $rows;
    }

    function existe($cargo, $id=null){
        $row = null;
        $query = new Query();
        if(!$id){
            $sql1 = "SELECT * FROM `firmantes` WHERE `cargo` = '$cargo' AND `band` = '1'";
        }else{
            $sql1 = "SELECT * FROM `firmantes` WHERE `cargo` = '$cargo' AND `band` = '1' AND `id` != '$id'";
        }
        $exite = $query->getFirst($sql1);
        if($exite){
            return true;
        }else{
            return false;
        }
    }

    function save($nombre, $cargo)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $existe = $this->existe($cargo);
        if(!$existe){
            $sql = "INSERT INTO `firmantes` (`nombre`, `cargo`, `created_at`) VALUES ('$nombre', '$cargo', '$hoy');";
            $row = $query->save($sql);
            return $row;
        }else{
            return false;
        }

    }

    function update($id, $nombre, $cargo)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $existe = $this->existe($cargo , $id);
        if(!$existe){
            $sql = "UPDATE `firmantes` SET `nombre`='$nombre', `cargo`='$cargo', `updated_at`='$hoy' WHERE `id`=$id;";
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
        $sql1 = "SELECT * FROM `firmantes` WHERE `id` = $id;";
        $firmante = $query->getFirst($sql1);

        if ($firmante) {


            $hoy = date("Y-m-d");
            $sql = "UPDATE `firmantes` SET `band`='0', `updated_at`='$hoy' WHERE  `id`=$id;";
            $row = $query->save($sql);
            return $row;

        } else {

            return false;

        }


    }
}