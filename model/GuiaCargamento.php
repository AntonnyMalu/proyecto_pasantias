<?php
include_once "Model.php";

class GuiaCargamento extends Model
{
    public function __construct()
    {
        $this->TABLA = "guias_carga";
        $this->DATA = [
            'guias_id',
            'cantidad',
            'descripcion'
        ];
    }
}
