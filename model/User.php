<?php

class User{

    //LISTAR USUARIOS
    function getAll()
    {
        $query = new Query();
        $rows = null;
        $sql = "SELECT * FROM `users` WHERE `band`= 1 ORDER BY `role` ASC";
        $rows = $query->getAll($sql);
        return $rows;
    }

        //USUARIOS NUEVOS
    function save($name, $email, $password, $role)
    {
        $row = null;
        $query = new Query();
        $sql1 = "SELECT * FROM `users` WHERE `email` = '$email'";
        $exite = $query->getFirst($sql1);

        if ($exite) {

            return false;

        } else {

            $hoy = date("Y-m-d");
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`email`, `password`, `name`, `role`, `created_at`) VALUES ('$email', '$password_hash', '$name', '$role', '$hoy');";
            $row = $query->save($sql);
            return $row;

        }


    }

        //EDITAR USUARIOS
    function update($id, $name, $email, $password, $role)
    {
        $row = null;
        $query = new Query();
        $sql1 = "SELECT * FROM `users` WHERE `id` = '$id'";
        $usuario = $query->getFirst($sql1);

        if ($usuario) {

            $sql2 = "SELECT * FROM `users` WHERE `email` = '$email' AND `id` != '$id'";
            $exite = $query->getFirst($sql2);

            if ($exite){

                return false;

            }else{

                $hoy = date("Y-m-d");
                if (!empty($password)){
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "UPDATE `users` SET `name`='$name', `email`='$email', `password`='$password_hash', `role`='$role', `updated_at`='$hoy' WHERE  `id`=$id;";
                }else{
                    $sql = "UPDATE `users` SET `name`='$name', `email`='$email', `role`='$role', `updated_at`='$hoy' WHERE  `id`=$id;";
                }
                $row = $query->save($sql);
                return $row;

            }

        } else {

            return false;

        }

    }

        //ELIMINAR USUARIOS
    function delete($id)
    {
        $row = null;
        $query = new Query();
        $sql1 = "SELECT * FROM `users` WHERE `id` = '$id'";
        $usuario = $query->getFirst($sql1);

        if ($usuario) {

            $hoy = date("Y-m-d");
            $sql = "UPDATE `users` SET `band`='0', `updated_at`='$hoy' WHERE  `id`=$id;";
            $row = $query->save($sql);
            return $row;

        } else {

            return false;

        }


    }
}


