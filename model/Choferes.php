<?php
include_once "Model.php";

class Choferes extends Model
{
    public function __construct()
    {
        $this->TABLA = "choferes";
        $this->DATA = [
            'empresas_id',
            'vehiculos_id',
            'cedula',
            'nombre',
            'telefono',
            'created_at'
        ];
    }
}