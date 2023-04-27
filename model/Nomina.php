<?php

class Nomina
{
    function getAll()
    {
        $row = null;
        $query = new Query();
        $sql = "SELECT * FROM `nomina` WHERE `band` = 1;";
        $row = $query->getAll($sql);
        return $row;
    }

    function existe($cedula, $id=null){
        $row = null;
        $query = new Query();
        
        if(!$id){
            $sql1 = "SELECT * FROM `nomina` WHERE `cedula` = '$cedula' AND `band` = '1'";
        }else{
            $sql1 = "SELECT * FROM `nomina` WHERE `cedula` = '$cedula' AND `band` = '1' AND `id` != '$id'";
        }
        $exite = $query->getFirst($sql1);
    
        if($exite){
            return true;
        }else{
            return false;
        }
    
    }

    function save($id, $nombre, $ubicacion_geografica, $ubicacion_administrativa, $cedula, $cargo)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $existe = $this->existe($cedula, $id);
        if(!$existe){
            $sql = "INSERT INTO `nomina` (`nombre`, `ubicacion_geografica`, `ubicacion_administrativa`, `cedula`, `cargo`, `created_at`)
             VALUES ('$nombre', '$ubicacion_geografica', '$ubicacion_administrativa', '$cedula', '$cargo', '$hoy');";
            $row = $query->save($sql);
            return $row;
        }else{
            return false;
        }

    }

    function update($id, $nombre, $ubicacion_geografica, $ubicacion_administrativa, $cedula, $cargo)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $existe = $this->existe($cedula, $id);
        if(!$existe){
            $sql = "UPDATE `nomina` SET `nombre`='$nombre', `ubicacion_geografica`='$ubicacion_geografica', 
            `ubicacion_administrativa`='$ubicacion_administrativa', `cedula`='$cedula', `cargo`='$cargo', `updated_at`='$hoy' WHERE  `id`='$id';";
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
        $sql1 = "SELECT * FROM `nomina` WHERE `id` = $id;";
        $nomina = $query->getFirst($sql1);

        if ($nomina) {
            $hoy = date("Y-m-d");
            $sql = "UPDATE `nomina` SET `band`='0', `updated_at`='$hoy' WHERE  `id`='$id';";
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
        $sql = "SELECT * FROM `nomina` WHERE `id`= '$id'; ";
        $rows = $query->getfirst($sql);   
        return $rows;  
    }

}