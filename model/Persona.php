<?php

class Persona{
    //LISTAR USUARIOS
    function getAll()
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `personas` WHERE `band`= 1 ";
        $rows = $query->getAll($sql);
        return $rows;
    }

    function existe($cedula, $id=null){
        $row = null;
        $query = new Query();
        
        if(!$id){
            $sql1 = "SELECT * FROM `personas` WHERE `cedula` = '$cedula' AND `band` = '1'";
        }else{
            $sql1 = "SELECT * FROM `personas` WHERE `cedula` = '$cedula' AND `band` = '1' AND `id` != '$id'";
        }
        $exite = $query->getFirst($sql1);
    
        if($exite){
            return true;
        }else{
            return false;
        }
    
    }

    function save($id, $cedula, $nombre, $telefono, $direccion)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $existe = $this->existe($cedula, $id);
        if(!$existe){
            $sql = "INSERT INTO`personas` (`cedula`, `nombre`, `telefono`, `direccion`, `created_at`) VALUES ('$cedula', '$nombre', '$telefono', '$direccion', '$hoy');";
            $row = $query->save($sql);
            return $row;
        }else{
            return false;
        }

    }

    function update($id, $cedula, $nombre, $telefono, $direccion)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $existe = $this->existe($cedula, $id);
        if(!$existe){
            $sql = "UPDATE `personas` SET `cedula`='$cedula', `nombre`='$nombre', `telefono`='$telefono', `direccion`='$direccion', `updated_at`='$hoy' WHERE `id`=$id;";
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
        $sql1 = "SELECT * FROM `personas` WHERE `id` = $id;";
        $persona = $query->getFirst($sql1);

        if ($persona) {
            $hoy = date("Y-m-d");
            $sql = "UPDATE `personas` SET `band`='0', `updated_at`='$hoy' WHERE  `id`=$id;";
            $row = $query->save($sql);
            return $row;

        }else {
            return false;
        }
    }

    function getFirst($id)
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `personas` WHERE `id`= '$id'; ";
        $rows = $query->getfirst($sql);   
        return $rows;  
    }
}