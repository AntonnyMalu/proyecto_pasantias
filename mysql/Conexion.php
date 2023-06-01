<?php
include_once ('env.php');
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('America/Caracas');

class Conexion{

    public $CONEXION;
    
    Public function __construct()
    {

        $db_conexion = DATABASE_CONEXION;
        $db_host = DATABASE_HOST;
        $db_port = DATABASE_PORT;
        $db_database = DATABASE_NAME;
        $db_username = DATABASE_USERNAME;
        $db_password = DATABASE_PASSWORD;
        $this->CONEXION = new PDO("$db_conexion:host=$db_host;dbname=$db_database", $db_username, $db_password);
 
    }


}

