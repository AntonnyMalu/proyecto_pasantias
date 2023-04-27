<?php

class Institucion{

    //LISTAR USUARIOS
    function getAll()
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `instituciones` WHERE `band`= 1 ";
        $rows = $query->getAll($sql);
        return $rows;
    }

    function existe($rif, $id=null){
        $row = null;
        $query = new Query();
        
        if(!$id){
            $sql1 = "SELECT * FROM `instituciones` WHERE `rif` = '$rif' AND `band` = '1'";
        }else{
            $sql1 = "SELECT * FROM `instituciones` WHERE `rif` = '$rif' AND `band` = '1' AND `id` != '$id'";
        }
        $exite = $query->getFirst($sql1);
    
        if($exite){
            return true;
        }else{
            return false;
        }
    
    }

    function ritTemporal()
    {
        $rows = null;
        $query = new Query();
        $sql = "SELECT * FROM `instituciones` WHERE `rif` LIKE '%TEMP-%' AND `band` = '1'";
        $rows = $query->getAll($sql);
        $i = 1;
        foreach($rows as $row){
            $i++;
        }
        $numero = $query->cerosIzquierda($i, 3);
        $rif_temporal = "TEMP-" . $numero;
        return $rif_temporal;
    }

    function save( $rif, $nombre, $telefono, $direccion)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $existe = $this->existe($rif);
        if(!$existe){
            $sql = "INSERT INTO`instituciones` (`rif`, `nombre`, `telefono`, `direccion`, `created_at`) VALUES ('$rif', '$nombre', '$telefono', '$direccion', '$hoy');";
            $row = $query->save($sql);
            return $row;
        }else{
            return false;
        }
    }

    function update($id, $rif, $nombre, $telefono, $direccion)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $existe = $this->existe($rif, $id);
        if(!$existe){
            $sql = "UPDATE `instituciones` SET `rif`='$rif', `nombre`='$nombre', `telefono`='$telefono', `direccion`='$direccion', `updated_at`='$hoy' WHERE `id`=$id;";
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
        $sql1 = "SELECT * FROM `instituciones` WHERE `id` = $id;";
        $institucion = $query->getFirst($sql1);

        if ($institucion) {
            $hoy = date("Y-m-d");
            $sql = "UPDATE `instituciones` SET `band`='0', `updated_at`='$hoy' WHERE  `id`=$id;";
            $row = $query->save($sql);
            return $row;
        } else {
            return false;
        }
    }

    function getFirst($id)
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `instituciones` WHERE `id`= '$id'; ";
        $rows = $query->getfirst($sql);
        return $rows;        
    }

}