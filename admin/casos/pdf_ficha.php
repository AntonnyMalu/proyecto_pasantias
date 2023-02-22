<?php
require('../../fpdf/fpdf.php');
require "../../mysql/Query.php";

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->SetFont('Times','B',20);
    $this->Image('../../img/alguarisa.png', 10, 0, 190, 15);
    //$this->Image('../../img/logo_gobernacion.png', 20, 3, 30, 15);
    $this->SetX(-53);
    //$this->Image('../../img/logo_alguarisa.png', null, 2, 30, 15);
    $this->SetXY(10,20);
    $this->Cell(0,4,utf8_decode('FICHA DE CARACTERIZACION'),0,1, 'C');
    $this->SetFont('Times','B',10);
    $this->Cell(0,10,utf8_decode('CASO SOCIAL'),0,1, 'C');
    $this->Ln(5);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

function getCaso($id)
{
    $row = null;
    $query = new Query();
    $sql = "SELECT * FROM `casos` WHERE `id` = '$id'";
    $row = $query->getFirst($sql);
    if(!$row){
        header('location: ../casos');
    }else{
        return $row;
    }
    
}
function fechaEs($fecha) {
    $fecha = substr($fecha, 0, 10);
    $numeroDia = date('d', strtotime($fecha));
    $dia = date('l', strtotime($fecha));
    $mes = date('F', strtotime($fecha));
    $anio = date('Y', strtotime($fecha));
    $dias_ES = array("Lunes,", "Martes", "Miércoles,", "Jueves,", "Viernes,", "Sábado,", "Domingo,");
    $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    $nombredia = str_replace($dias_EN, $dias_ES, $dia);
    $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
    return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
    }



// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();


//pagina 1
$pdf->AddPage();
$pdf->SetX(150);
$pdf->Cell(0,0,"FECHA:",0,1,'');
$pdf->SetXY(108,45);
$pdf->Cell(0,0,"ULTIMA FECHA DE DESPACHO:",0,1,'');
$pdf->SetXY(15,58);
$pdf->Cell(0,0,"HORA:",0,1,'');
$pdf->SetXY(15,65);
$pdf->Cell(0,0,"TLF:",0,1,'');
$pdf->SetXY(15,72);
$pdf->Cell(0,0,"DIRECCION:",0,1,'');
$pdf->LN(10);
$pdf->SetFont('Times','B',13);
$pdf->Cell(0,4,utf8_decode('STATUS SOCIAL DE LA PERSONA'),0,1, 'C');
$pdf->SetFont('Times','B',9);
$pdf->SetXY(17, 90);
$pdf->Cell(52, 5, utf8_decode('NOMBRE Y APELLIDO'), 1, 0, 'C');
$pdf->Cell(37, 5, utf8_decode('CÉDULA'), 1, 0, 'C');
$pdf->Cell(47, 5, utf8_decode('TIPO DE ATENCIÓN'), 1, 0, 'C');
$pdf->Cell(37, 5, utf8_decode('OBSERVACIÓN'), 1, 0, 'C');
$pdf->Ln(5);

$pdf->SetXY(17, 95);
$pdf->Cell(52, 5, utf8_decode('Antonny Maluenga'), 1, 0, 'C');
$pdf->Cell(37, 5, utf8_decode('27.613.025'), 1, 0, 'C');
$pdf->Cell(47, 5, utf8_decode('TIPO '), 1, 0, 'C');
$pdf->Cell(37, 5, utf8_decode('OBSERVACIÓN'), 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetFont('Times','B',9);
$pdf->SetXY(17, 105);
$pdf->Cell(20, 5, utf8_decode('N°'), 1, 0, 'C');
$pdf->Cell(69, 5, utf8_decode('PRODUCTO'), 1, 0, 'C');
$pdf->Cell(47, 5, utf8_decode('CANTIDAD'), 1, 0, 'C');
$pdf->SetFont('Times','',9);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Rect($x, $y, 37, 40);
$pdf->MultiCell(37, 3, utf8_decode('Este texto es de prueba A Este texto es de prueba A'), 'LRT',);
$pdf->Ln(5);
$pdf->SetXY(17, 110);
$pdf->Cell(20, 5, utf8_decode('1'), 1, 0, 'C');
$pdf->Cell(69, 5, utf8_decode(''), 1, 0, 'C');
$pdf->Cell(47, 5, utf8_decode(''), 1, 0, 'C');
$pdf->Ln(5);
$pdf->SetXY(17, 115);
$pdf->Cell(20, 5, utf8_decode('2'), 1, 0, 'C');
$pdf->Cell(69, 5, utf8_decode(''), 1, 0, 'C');
$pdf->Cell(47, 5, utf8_decode(''), 1, 0, 'C');
$pdf->Ln(5);
$pdf->SetXY(17, 120);
$pdf->Cell(20, 5, utf8_decode('3'), 1, 0, 'C');
$pdf->Cell(69, 5, utf8_decode(''), 1, 0, 'C');
$pdf->Cell(47, 5, utf8_decode(''), 1, 0, 'C');
$pdf->Ln(5);
$pdf->SetXY(17, 125);
$pdf->Cell(20, 5, utf8_decode('4'), 1, 0, 'C');
$pdf->Cell(69, 5, utf8_decode(''), 1, 0, 'C');
$pdf->Cell(47, 5, utf8_decode(''), 1, 0, 'C');
$pdf->Ln(5);
$pdf->SetXY(17, 130);
$pdf->Cell(20, 5, utf8_decode('5'), 1, 0, 'C');
$pdf->Cell(69, 5, utf8_decode(''), 1, 0, 'C');
$pdf->Cell(47, 5, utf8_decode(''), 1, 0, 'C');
$pdf->Ln(5);
$pdf->SetXY(17, 135);
$pdf->Cell(20, 5, utf8_decode('6'), 1, 0, 'C');
$pdf->Cell(69, 5, utf8_decode(''), 1, 0, 'C');
$pdf->Cell(47, 5, utf8_decode(''), 1, 0, 'C');
$pdf->Ln(5);
$pdf->SetXY(17, 140);
$pdf->Cell(20, 5, utf8_decode('7'), 1, 0, 'C');
$pdf->Cell(69, 5, utf8_decode(''), 1, 0, 'C');
$pdf->Cell(47, 5, utf8_decode(''), 1, 0, 'C');
$pdf->Ln(5);

$pdf->Cell(65,20,'__________________________', 0, 0, 'C');

$pdf->Cell(55,20,'__________________________', 0, 0, 'C');

$pdf->Cell(70,20,'__________________________', 0, 0, 'C');


$pdf->Output('I', "FICHA ", true);
?>
