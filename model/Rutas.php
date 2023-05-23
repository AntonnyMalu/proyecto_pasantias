<?php
include_once "Model.php";

class Rutas extends Model
{
    public function __construct()
    {
        $this->TABLA = "rutas";
        $this->DATA = [
            'cedula',
            'nombre',
            'telefono',
            'direccion',
            'created_at'
        ];
    }
}
