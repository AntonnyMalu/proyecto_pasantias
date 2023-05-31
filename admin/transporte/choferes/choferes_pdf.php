<?php
$raiz = true;
include('../../../phpqrcode/qrlib.php');
require '../../../fpdf/WriteTag.php';
include_once '../../../model/Choferes.php';
include_once '../../../model/Vehiculos.php';
include_once '../../../model/VehiculoTipo.php';
include_once '../../../funciones/funciones.php';

$choferes = new Choferes();
$vehiculos = new Vehiculos();
$vehiculosTipo = new VehiculoTipo();

$listarChoferes = $choferes->getAll(1, 'cedula', 'ASC');





// Creación del objeto de la clase heredada ******************************************
$pdf = new PDF_WriteTag();



$pdf->AddPage('P', 'Letter');
$pdf->SetFont('Times', 'BU', 12);
$pdf->Image('../../../img/hoja_membretada.png', 0, 0, 210, 280);

$pdf->Ln(20);
$pdf->Cell(0, 4, utf8_decode(strtoupper("Lista QR de Choferes")), 0, 1, 'C');
//

$pdf->Ln(2);
/*************************************** */

$i = 0;
foreach ($listarChoferes as $chofer) {
    $i++;
    $getVehiculo = $vehiculos->find($chofer['vehiculos_id']);
    $getTipo = $vehiculosTipo->find($getVehiculo['tipo']);
    $qr_texto = "C.I: ".formatoMillares($chofer['cedula'])."  \nConductor: ".strtoupper($chofer['nombre'])." \nVehiculo: ".strtoupper($getTipo['nombre'])." \nModelo: ".strtoupper($getVehiculo['marca'])."  \nPlaca: ".strtoupper($getVehiculo['placa_batea'])." \nColor: ".strtoupper($getVehiculo['color'])." \nTlf: ".strtolower($chofer['telefono'])." \nModulos: ".strtoupper($getVehiculo['capacidad'])." ";
    QRcode::png(utf8_decode($qr_texto), 'formatos/QRcodeChofer_'.$chofer['id'].'.png', '', 2);

    if (($i % 2) == 0) {
        //Es un número par
        $pdf->SetXY($x2, $y2);

        $pdf->Image('formatos/QRcodeChofer_'.$chofer['id'].'.png');
        $pdf->SetXY($x3, $y2);
        $pdf->Cell(64, 5, 'C.I: ' . formatoMillares($chofer['cedula']), 0, 1, 'L');
        $pdf->SetX($x3);
        $pdf->Cell(64, 5, utf8_decode(strtoupper($chofer['nombre'])), 0, 1, 'L');
        $pdf->SetX($x3);
        $pdf->Cell(64, 5, utf8_decode($getTipo['nombre']), 0, 1, 'L');
        $pdf->SetX($x3);
        $pdf->Cell(64, 5, utf8_decode(strtoupper('modelo: ' . $getVehiculo['marca'])), 0, 1, 'L');
        $pdf->SetX($x3);
        $pdf->Cell(64, 5, utf8_decode(strtoupper('PLACA: ' . $getVehiculo['placa_batea'])), 0, 1, 'L');
        $pdf->SetX($x3);
        $pdf->Cell(64, 5, utf8_decode(strtoupper('color: ' . $getVehiculo['color'])), 0, 1, 'L');
        $pdf->SetX($x3);
        $pdf->Cell(64, 5, utf8_decode(strtoupper('tlf: ' . $chofer['telefono'])), 0, 1, 'L');
        $pdf->SetX($x3);
        $pdf->Cell(64, 5, utf8_decode(strtoupper('modulos: ' . $getVehiculo['capacidad'])), 0, 1, 'L');
    } else {
        //Es un número impar

        if ($i == 11) {
            $i = 1;
            $pdf->AddPage('P', 'Letter');
            $pdf->Image('../../../img/hoja_membretada.png', 0, 0, 210, 280);
            $pdf->Ln(20);
            $pdf->Cell(0, 4, utf8_decode(strtoupper("Lista QR de Choferes")), 0, 1, 'C');
            //

            $pdf->Ln(2);
        }

        $x1 = $pdf->GetX();
        $y1 = $pdf->GetY();



        $pdf->Cell(33, 5, '', 0, 0, 'L');
        $pdf->Cell(64, 5, 'C.I: ' . formatoMillares($chofer['cedula']), 0, 0, 'L');
        $x2 = $pdf->GetX() + 2;
        $pdf->Cell(33, 5, '', 0, 0, 'L');
        $y2 = $pdf->GetY();
        $x3 = $pdf->GetX() + 2;
        $pdf->Cell(64, 5, '', 0, 1, 'L');
        $pdf->Cell(33, 5, '', 0, 0, 'L');
        $pdf->Cell(64, 5, strtoupper($chofer['nombre']), 0, 1, 'L');

        $pdf->Image('formatos/QRcodeChofer_'.$chofer['id'].'.png', $x1, $y1);


        $pdf->Cell(33, 5, '', 0, 0, 'L');
        $pdf->Cell(64, 5, utf8_decode(strtoupper($getTipo['nombre'])), 0, 1, 'L');
        $pdf->Cell(33, 5, '', 0, 0, 'L');
        $pdf->Cell(64, 5, utf8_decode(strtoupper('modelo: ' . $getVehiculo['marca'])), 0, 1, 'L');

        $pdf->Cell(33, 5, '', 0, 0, 'L');
        $pdf->Cell(64, 5, utf8_decode(strtoupper('PLACA: ' . $getVehiculo['placa_batea'])), 0, 1, 'L');
        $pdf->Cell(33, 5, '', 0, 0, 'L');
        $pdf->Cell(64, 5, utf8_decode(strtoupper('color: ' . $getVehiculo['color'])), 0, 1, 'L');

        $pdf->Cell(33, 5, '', 0, 0, 'L');
        $pdf->Cell(64, 5, utf8_decode(strtoupper('tlf: ' . $chofer['telefono'])), 0, 1, 'L');
        $pdf->Cell(33, 5, '', 0, 0, 'L');
        $pdf->Cell(64, 5, utf8_decode(strtoupper('modulos: ' . $getVehiculo['capacidad'])), 0, 1, 'L');
    }
    //____________________________________________________________________________________



    //____________________________________________________________________________________

    $pdf->Ln(5);
}







$pdf->Output('I', 'Choferes.pdf', true,);
