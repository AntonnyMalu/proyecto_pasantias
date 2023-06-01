<?php
if (isset($raiz)) {
    include_once "../../../mysql/Query.php";
} else {
    if (isset($raiz_pdf)) {
        include_once "../../../../mysql/Query.php";
    } else {
        include_once "../mysql/Query.php";
    }
}


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

function verFechaGuia($fecha)
{
    $fecha = substr($fecha, 0, 10);
    $numeroDia = date('d', strtotime($fecha));
    $dia = date('l', strtotime($fecha));
    $mes = date('F', strtotime($fecha));
    $anio = date('Y', strtotime($fecha));
    $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
    $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    $numero_ES = array("Uno", "Dos", "Tres", "Cuatro", "Cinco", "Seis", "Siete", "Ocho", "Nueve", "Diez", "Once", "Doce", "Trece", "Catorce", "Quince", "Dieciséis", "Diecisiete", "Dieciocho", "Diecinueve", "Veinte", "Veintiuno", "Veintidos", "Veintitres", "Veinticuatro", "Veinticinco", "Veintiseis", "Veintisiete", "Veintiocho", "Veintinueve", "Treinta", "Treinta y Uno");
    $nombredia = str_replace($dias_EN, $dias_ES, $dia);
    $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
    //return $nombredia . " " . $numeroDia . " de " . $nombreMes . " de " . $anio;
    return "A los " . strtoupper($numero_ES[$numeroDia - 1]) . " (" . $numeroDia . ") DEL MES DE " . strtoupper($nombreMes) . " DEL AÑO " . $anio . ".";
}

function compararFechas($fechaInicial, $fechaFinal)
{
    // Declaramos nuestras fechas inicial y final
    //$fechaInicial = date('2023-05-18');
    //$fechaFinal = date('2023-05-19');

    // Las convertimos a segundos
    $fechaInicialSegundos = strtotime($fechaInicial);
    $fechaFinalSegundos = strtotime($fechaFinal);

    // Hacemos las operaciones para calcular los dias entre las dos fechas y mostramos el resultado
    $dias = ($fechaFinalSegundos - $fechaInicialSegundos) / 86400;
    //echo "La diferencia entre la fecha : " . $fechaInicial . " y " . $fechaFinal . " es de: " . round($dias, 0, PHP_ROUND_HALF_UP)  . " dias.";

    //Resultado de los dias de diferencia entre dos fechas

    /*
*   La diferencia entre la fecha : 2022-01-01 y 2023-01-01 es de: 365 dias.
*/
    return  round($dias, 0, PHP_ROUND_HALF_UP);
}


function ritTemporal()
{
    $rows = null;
    $query = new Query();
    $sql = "SELECT * FROM `instituciones` WHERE `rif` LIKE '%T-%' AND `band` = '1'";
    $rows = $query->getAll($sql);
    $i = 1;
    foreach ($rows as $row) {
        $i++;
    }
    $numero = $query->cerosIzquierda($i, 8);
    $rif_temporal = "T-" . $numero . "-0";
    return $rif_temporal;
}


function formatoMillares($cantidad, $decimales = 0)
{
    return number_format($cantidad, $decimales, ',', '.');
}

function validateJSON(string $json): bool {
	try {
		$test = json_decode($json, null, JSON_THROW_ON_ERROR);
		if(is_object($test)) return true;
		return false;
	} catch  (Exception $e) {
		return false;
	}
}

function url_origin($s, $use_forwarded_host = false)
{

    $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true : false;
    $sp = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');

    $port = $s['SERVER_PORT'];
    $port = ((!$ssl && $port == '80') || ($ssl && $port == '443')) ? '' : ':' . $port;

    $host = ($use_forwarded_host && isset($s['HTTP_X_FORWARDED_HOST'])) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
    $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;

    return $protocol . '://' . $host;
}

function full_url($s, $use_forwarded_host = false)
{
    return url_origin($s, $use_forwarded_host) . $s['REQUEST_URI'];
}
