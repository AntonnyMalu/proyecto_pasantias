<?php
include_once "Model.php";

class Institucion extends Model
{
    public function __construct()
    {
        $this->TABLA = "instituciones";
        $this->DATA = [
            'rif',
            'nombre',
            'telefono',
            'direccion',
            'created_at'
        ];
    }
}

