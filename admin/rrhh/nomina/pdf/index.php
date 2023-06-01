<?php
include('../../../../phpqrcode/qrlib.php');
require '../../../../fpdf/WriteTag.php';



// Creación del objeto de la clase heredada ******************************************
$pdf = new PDF_WriteTag();
$pdf->AliasNbPages();

//CABECERA ****************************************************************************
$pdf->AddPage('P', 'Letter');
$pdf->SetFont('Times', 'BU', 12);
$pdf->ln(20);
//$pdf->Image('../../../img/carnet.jpg',55,90,110,90);
$pdf->Cell(0, 4, utf8_decode("HOLA AQUI VA LA FOTO"), 0, 1, 'R');
$pdf->Ln(5);









$pdf->Output('I', 'Carnet.pdf', true,);
