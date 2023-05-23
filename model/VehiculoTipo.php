<?php
include_once "Model.php";

class VehiculoTipo extends Model
{
    public function __construct()
    {
        $this->TABLA = "vehiculos_tipo";
        $this->DATA = [
            'nombre'
        ];
    }
}