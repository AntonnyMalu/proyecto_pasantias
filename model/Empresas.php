<?php
include_once "Model.php";

class Empresas extends Model
{
    public function __construct()
    {
        $this->TABLA = "empresas";
        $this->DATA = [
            'rif',
            'nombre',
            'responsable',
            'telefono',
            'created_at'
        ];
    }
}