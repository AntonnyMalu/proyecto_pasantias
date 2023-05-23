<?php
include_once "Model.php";

class User extends Model
{
    public function __construct()
    {
        $this->TABLA = "users";
        $this->DATA = [
            'email',
            'password',
            'name',
            'role',
            'created_at'
        ];
    }
}
