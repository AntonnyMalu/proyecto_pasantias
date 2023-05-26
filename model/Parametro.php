<?php
include_once "Model.php";

class Parametro extends Model 
{
    public function __construct()
    {
        $this->TABLA = "parametros";
        $this->DATA = [
            'nombre',
            'tabla_id',
            'valor'
        ];
    }
}