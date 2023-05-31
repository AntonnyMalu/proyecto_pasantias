<?php
include('../../../phpqrcode/qrlib.php');
require '../../../fpdf/WriteTag.php';

$qr_texto = "";
QRcode::png($qr_texto, 'QRcodeManual.png', '', 2);


// Creación del objeto de la clase heredada ******************************************
$pdf = new PDF_WriteTag();
$pdf->AliasNbPages();

//CABECERA ****************************************************************************
$pdf->AddPage('P', 'Letter');
$pdf->SetFont('Times', 'BU', 12);
$pdf->ln(20);
$pdf->Image('../../../img/carnet.jpg',55,90,110,90);
$pdf->Cell(0, 4, utf8_decode(""), 0, 1, 'R');
$pdf->Ln(5);


// TEXTO *****************************************************************************

/** 
$pdf->SetStyle("p", "times", "N", 10, "0,0,0", 15);
$pdf->SetStyle("vb", "times", "B", 0, "0,0,0");
$pdf->Ln(14);
$pdf->WriteTag(0, 5, '', 0, "J", 0, 0);
$pdf->Ln(2);
*/


// notas ********************************************************************************************
$pdf->Ln(2);




$pdf->Output('D', 'Carnet.pdf', true,);
