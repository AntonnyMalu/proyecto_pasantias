<?php
include_once "Model.php";

class GuiaTipo extends Model
{
    public function __construct()
    {
        $this->TABLA = "guias_tipos";
        $this->DATA = [
            'nombre',
            'codigo'
        ];
    }
}