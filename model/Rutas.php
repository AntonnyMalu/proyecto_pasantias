<?php
include_once "Model.php";

class Rutas extends Model
{
    public function __construct()
    {
        $this->TABLA = "rutas";
        $this->DATA = [
            'origen',
            'destino',
            'ruta',
            'created_at'
        ];
    }
}
