<?php
include_once "Model.php";

class Vehiculos extends Model
{
    public function __construct()
    {
        $this->TABLA = "vehiculos";
        $this->DATA = [
            'empresas_id',
            'tipo',
            'marca',
            'placa_batea',
            'placa_chuto',
            'color',
            'capacidad',
            'created_at'
        ];
    }
}
