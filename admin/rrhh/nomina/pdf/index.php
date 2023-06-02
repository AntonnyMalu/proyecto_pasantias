<?php
$raiz_pdf = true;
include('../../../../phpqrcode/qrlib.php');
require '../../../../fpdf/WriteTag.php';
include_once '../../../../model/Nomina.php';
include_once '../../../../model/NominaCargo.php';
include_once '../../../../model/NominaUbicaciones.php';
include_once '../../../../funciones/funciones.php';

$nomina = new Nomina();
$nominaCargos = new NominaCargo();
$nominaUbicaciones = new NominaUbicaciones();

$id = $_GET['id'];
$trabajador = $nomina->find($id);
$getCargo = $nominaCargos->find($trabajador['cargos_id']);
if ($trabajador['mini'] == 0) {
    $estatus = "INACTIVO";
}else{
    $estatus = "ACTIVO";
}

$qr_texto = "ALIMENTOS DEL GUARICO S.A (ALGUARISA)  \nTrabajador: ".$trabajador['nombre']."  \nCedula: ".formatoMillares($trabajador['cedula'])." \nCargo: ".$getCargo['cargo']." \nEstatus: ".$estatus." ";

QRcode::png($qr_texto, 'QRcodeCarnet.png', '', 2);

// Creación del objeto de la clase heredada ******************************************
$pdf = new PDF_WriteTag();
$pdf->AliasNbPages();

//CABECERA ****************************************************************************
$pdf->AddPage('P', 'Letter');
$pdf->SetFont('Times', 'BU', 12);
$pdf->SetFillColor(236,255,0);


$pdf->Cell(0,5,'',0,1);
$x = $pdf->GetX();
$y = $pdf->GetY();

$pdf->Cell(0,6,'',0,1);
$pdf->Cell(88,5,'',0,0);
$xFoto = $pdf->GetX();
$yFoto = $pdf->GetY() -2;
$pdf->Cell(108,5,'hola2',0,1);

$pdf->Image('../../../../img/fotos_carnet/nomina_id_1/carnet.png',$xFoto,$yFoto,27,48);

$pdf->Cell(0,22,'',0,1);
$pdf->Cell(0,19,'',0,1);

$xQR = $pdf->GetX() +12;
$yQR = $pdf->GetY()-1;

$pdf->Cell(196,5,'',0,1);
$pdf->Image('../../../../img/fondo_carnet.png',$x,$y,123,90);
$pdf->Image('QRcodeCarnet.png',$xQR,$yQR,19,19);
$pdf->SetFont('Times', '', 12);
$xNombre = $pdf->GetX();
$pdf->Cell(63,5,'',0,0);
$pdf->Cell(52,5,$trabajador['nombre'],0,0,'C');
$yNombre = $pdf->GetY();
$pdf->Cell(81,5,'',0,1);

$pdf->SetFont('Times', 'B', 12);
$xNombre = $pdf->GetX();
$pdf->Cell(63,5,'',0,0);
$pdf->Cell(52,5,$trabajador['apellido'],0,0,'C');
$yNombre = $pdf->GetY();
$pdf->Cell(81,5,'',0,1);


$xNombre = $pdf->GetX();
$pdf->Cell(63,7,'',0,0);
$pdf->Cell(52,7,formatoMillares($trabajador['cedula']),0,0,'C');
$yNombre = $pdf->GetY();
$pdf->Cell(81,7,'',0,1);

$xNombre = $pdf->GetX();
$pdf->Cell(63,2,'',0,0);
$pdf->Cell(52,2,'',0,0,'C');
$yNombre = $pdf->GetY();
$pdf->Cell(81,2,'',0,1);

$pdf->SetTextColor(255,255,255);

$cargo = $getCargo['cargo'];
//$cargo = 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWWW';
$caracteres = strlen($cargo);


if ($caracteres > 18 && $caracteres <= 27) {
    $pdf->SetFont('times','',9);
}

if ($caracteres > 27 && $caracteres <= 31) {
    $pdf->SetFont('times','',8);
}

if ($caracteres > 31 && $caracteres <= 35) {
    $pdf->SetFont('times','',7);
}


if ($caracteres > 35 && $caracteres <= 43) {
    $pdf->SetFont('times','',6);
}

if ($caracteres > 43 && $caracteres <= 56) {
    $pdf->SetFont('times','',5);
}


if ($caracteres > 57) {
    $pdf->SetFont('times','',4);
}

$xNombre = $pdf->GetX();
$pdf->Cell(63,7,'',0,0);
//$pdf->Cell(52,7,$cargo,0,0,'C');
$pdf->Cell(52,7,$cargo,0,0,'C');

$yNombre = $pdf->GetY();
$pdf->Cell(81,7,'',0,1);



$pdf->Output('I', 'Carnet.pdf', true,);
