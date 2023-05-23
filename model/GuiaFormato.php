<?php
include_once "Model.php";

class GuiaFormato extends Model
{
    public function __construct()
    {
        $this->TABLA = "guias_formatos_pdf";
        $this->DATA = [
            'nombre'
        ];
    }
}