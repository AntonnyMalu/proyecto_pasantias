<?php
include_once "Model.php";

class Persona extends Model
{
    public function __construct()
    {
        $this->TABLA = "personas";
        $this->DATA = [
            'cedula',
            'nombre',
            'telefono',
            'direccion',
            'created_at'
        ];
    }
}
