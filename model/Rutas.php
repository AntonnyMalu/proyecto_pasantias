<?php

class Rutas
{

    public function getAll()
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `rutas` WHERE `band`= 1 ;";
        $rows = $query->getAll($sql);

        return $rows;
    }

    public function existe($origen, $destino, $id=null){
        $row = null;
        $query = new Query();
        if(!$id){
            $sql1 = "SELECT * FROM `rutas` WHERE `origen` = '$origen' AND  `destino` = '$destino' AND `band` = '1'";
        }else{
            $sql1 = "SELECT * FROM `rutas` WHERE `origen` = '$origen' AND `destino` = '$destino' AND `band` = '1' AND `id` != '$id'";
        }
        $exite = $query->getFirst($sql1);
        if($exite){
            return $exite;
        }else{
            return false;
        }
    }

    public function save($id, $origen, $destino, $ruta)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $existe = $this->existe($origen, $destino,  $id);
        if(!$existe){
            $sql = "INSERT INTO `rutas` (`origen`, `destino`, `ruta`, `created_at`) VALUES ('$origen', '$destino', '$ruta', '$hoy');";
            $row = $query->save($sql);
            return $row;
        }else{
            return false;
        }
    }

   public function update($id, $origen, $destino, $ruta)
    {
        $row = null;
        $query = new Query();
        $hoy = date("Y-m-d");
        $existe = $this->existe($origen, $destino, $id);
        if(!$existe){
            $sql = "UPDATE `rutas` SET 
            `origen`='$origen', 
            `destino`='$destino', 
            `ruta`='$ruta', 
            `updated_at`='$hoy' WHERE `id`='$id';";
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
        $hoy = date("Y-m-d");
        $sql = "UPDATE `rutas` SET `band`='0', `updated_at`='$hoy' WHERE `id`=$id;";
        $row = $query->save($sql);
        return $row;

    }

    public function find($id)
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `rutas` WHERE `id`= '$id'; ";
        $rows = $query->getfirst($sql);   
        return $rows;  
    }
}