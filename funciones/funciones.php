<?php

function verHora($hora)
{
    $newHora = date("g:i a", strtotime($hora));
    return $newHora;
}

function verFecha($fecha)
{
    $newDate = date("d-m-Y", strtotime($fecha));
    return $newDate;
}

?>