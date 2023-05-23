<?php
include_once "Model.php";

class NominaUbicaciones extends Model
{
    public function __construct()
    {
        $this->TABLA = "nomina_ubicaciones";
        $this->DATA = [
            'tipo',
            'nombre'
        ];
    }
}