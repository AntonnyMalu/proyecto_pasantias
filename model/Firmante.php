<?php
include_once "Model.php";

class Firmante extends Model
{
    public function __construct()
    {
        $this->TABLA = "firmantes";
        $this->DATA = [
            'nombre',
            'cargo',
            'created_at'
        ];
    }
}