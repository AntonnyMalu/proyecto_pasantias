<?php

if (!isset($_SESSION['email'])) {
    if ($modulo == "dashboard") {
        header('location: salir.php');
    } else {
        header('location: ../salir.php');
    }
}