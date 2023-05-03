<?php
$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
//echo $url."web" Prueba;
header("Status: 301 Moved Permanently");
header("Location: admin");
exit;
?>