<?php
include_once "Model.php";

class Caso extends Model
{
    public function __construct()
    {
        $this->TABLA = "casos";
        $this->DATA = [
            'personas_id',
            'fecha',
            'hora',
            'donativo',
            'tipo',
            'observacion',
            'created_at'
        ];
    }
}