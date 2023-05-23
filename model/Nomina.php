<?php
include_once "Model.php";

class Nomina extends Model
{
    public function __construct()
    {
        $this->TABLA = "nomina";
        $this->DATA = [
            'cedula',
            'nombre',
            'cargos_id',
            'administrativa_id',
            'geografica_id',
            'created_at'
        ];
    }
}
