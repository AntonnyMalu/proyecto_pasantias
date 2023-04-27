<?php

class Cargo
{

    function getAll()
    {
        $row = null;
        $query = new Query();
        $sql = "SELECT * FROM `cargos` WHERE `band` = 1;";
        $row = $query->getAll($sql);
        return $row;
    }

    function existe($cargo, $id=null){
        $row = null;
        $query = new Query();
        
        if(!$id){
            $sql1 = "SELECT * FROM `cargos` WHERE `cargo` = '$cargo' AND `band` = '1'";
        }else{
            $sql1 = "SELECT * FROM `cargos` WHERE `cargo` = '$cargo' AND `band` = '1' AND `id` != '$id'";
        }
        $exite = $query->getFirst($sql1);
    
        if($exite){
            return true;
        }else{
            return false;
        }
    
    }

    function save($id, $cargo)
    {
        $row = null;
        $query = new Query();
        $existe = $this->existe($cargo, $id);
        if(!$existe){
            $sql = "INSERT INTO `cargos` (`cargo`) VALUES ('$cargo');";
            $row = $query->save($sql);
            return $row;
        }else{
            return false;
        }

    }

    function update($id, $cargo)
    {
        $row = null;
        $query = new Query();
        $existe = $this->existe($cargo, $id);
        if(!$existe){
            $sql = "UPDATE `cargos` SET `cargo`='$cargo' WHERE  `id`='$id';";
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
        $sql1 = "SELECT * FROM `cargos` WHERE `id` = $id;";
        $cargos = $query->getFirst($sql1);
        if ($cargos) {
            $sql = "UPDATE `cargos` SET `band`='0' WHERE  `id`=''$id;";
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
        $sql = "SELECT * FROM `cargos` WHERE `id`= '$id'; ";
        $rows = $query->getfirst($sql);   
        return $rows;  
    }

}