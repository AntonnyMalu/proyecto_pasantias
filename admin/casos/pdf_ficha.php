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
    $this->SetXY(10,15);
    $this->Cell(0,4,utf8_decode('FICHA DE CARACTERIZACION'),0,1, 'C');
    $this->SetFont('Times','B',10);
    $this->Cell(0,10,utf8_decode('CASO SOCIAL'),0,1, 'C');
    //$this->Ln(5);
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

function getcaso($id)
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `casos` WHERE `id` = $id;";
    $rows = $query->getFirst($sql);
    if(!$rows){
        header('location: ../casos');
    }else{
        return $rows;
    }
    
}

function ultimodespacho($persona_id, $fecha)
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `casos` WHERE `personas_id`='$persona_id' AND `fecha` < '$fecha' AND `status`='Aprobado'  ;";
    $rows = $query->getFirst($sql);
    if($rows){
        return $rows['fecha'];
    }else{
        return "";
    }
    
}
function getPerson($id)
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `personas` WHERE `id` = $id;";
    $rows = $query->getFirst($sql);
    if(!$rows){
        header('location: ../casos');
    }else{
        return $rows;
    }
    
}

function getFirmantes($cargo)
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `firmantes` WHERE `cargo`= '$cargo' ";
    $rows = $query->getFirst($sql);
    return $rows;
}

if ($_GET)
{
    if(!empty($_GET['id'])){
        $caso_id = $_GET['id'];
        $get_caso = getCaso($caso_id);
        $get_persona = getPerson($get_caso['personas_id']);
        
    }else{
        $caso_id = null;
        $get_person = null;
    }
}else{
    $caso_id = null;
}

function getPersonas($caso_id)
{
    $query = new Query();
    $rows = null;
    $sql = "SELECT * FROM `productos` WHERE `casos_id`= '$caso_id'";
    $rows = $query->getAll($sql);
    return $rows;
}

$personas = getPersonas($caso_id);
$almacen = getFirmantes("Jefe de Almacen");
$atencion = getFirmantes("Jefe de Atencion al Ciudadano");


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();


//pagina 1
$pdf->AddPage();
$pdf->SetX(150);
$newDate = date("d-m-Y", strtotime($get_caso['fecha']));
$newHora = date("g:i a", strtotime($get_caso['hora']));
$newDespacho = date("d-m-Y", strtotime(ultimodespacho($get_persona['id'], $get_caso['fecha'])));
$pdf->Cell(0,5,"FECHA: ".$newDate,0,1,'');
$pdf->SetXY(108,35);
$pdf->Cell(0,2,"ULTIMA FECHA DE DESPACHO: ".$newDespacho,0,1,'');

$pdf->SetXY(15,40);
$pdf->Cell(0,0,"HORA: ".$newHora,0,1,'');
$pdf->SetXY(15,45);
$pdf->Cell(0,0,"TLF: ".$get_persona['telefono'],0,1,'');
$pdf->SetXY(15,50);
$pdf->Cell(0,0,"DIRECCION: ".utf8_decode(strtoupper($get_persona['direccion'])),0,1,'');
$pdf->LN(5);

$pdf->SetFont('Times','B',13);
$pdf->Cell(0,4,utf8_decode('STATUS SOCIAL DE LA PERSONA'),0,1, 'C');
$pdf->SetFont('Times','B',9);
$pdf->SetXY(17, 63);
$pdf->Cell(52, 5, utf8_decode('NOMBRE Y APELLIDO'), 1, 0, 'C');
$pdf->Cell(37, 5, utf8_decode('CÉDULA'), 1, 0, 'C');
$pdf->Cell(47, 5, utf8_decode('TIPO DE ATENCIÓN'), 1, 0, 'C');
$pdf->Cell(37, 5, utf8_decode('DONATIVO'), 1, 0, 'C');
$pdf->Ln(5);

$pdf->SetXY(17, 68);
$pdf->Cell(52, 5, utf8_decode(strtoupper($get_persona['nombre'])), 1, 0, 'C');
$pdf->Cell(37, 5, utf8_decode(strtoupper($get_persona['cedula'])), 1, 0, 'C');
$pdf->Cell(47, 5, utf8_decode(strtoupper($get_caso['tipo'])), 1, 0, 'C');
$pdf->Cell(37, 5, utf8_decode(strtoupper($get_caso['donativo'])), 1, 0, 'C');
$pdf->Ln(10);

$pdf->SetFont('Times','B',9);
$pdf->SetXY(17, 78);
$pdf->Cell(20, 5, utf8_decode('N°'), 1, 0, 'C');
$pdf->Cell(69, 5, utf8_decode('PRODUCTO'), 1, 0, 'C');
$pdf->Cell(47, 5, utf8_decode('CANTIDAD'), 1, 0, 'C');
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Cell(37, 5, utf8_decode('OBERVACIONES'), 1, 1, 'C');
$pdf->Rect($x, $y + 5, 37, 35);
$pdf->SetFont('Times','',9);
$pdf->SetX(17, $y+5);
$pdf->SetFont('Times','',9);
$i=0;
$j = 88;
foreach($personas as $persona){
    $i++;

    if($i == 1){
        $pdf->Cell(20, 5, $i, 1, 0, 'C');
        $pdf->Cell(69, 5, utf8_decode(strtoupper($persona['producto'])), 1, 0, 'C');
        $pdf->Cell(47, 5, utf8_decode($persona['cantidad']), 1, 0, 'C');
        $pdf->MultiCell(37, 3, utf8_decode(strtoupper($get_caso['observacion'])), 'LRT',);
        $pdf->Ln(5);
    }else{

        $pdf->SetXY(17, $j);
        $pdf->Cell(20, 5, $i, 1, 0, 'C');
        $pdf->Cell(69, 5, utf8_decode(strtoupper($persona['producto'])), 1, 0, 'C');
        $pdf->Cell(47, 5, utf8_decode($persona['cantidad']), 1, 0, 'C');
        $pdf->Ln(5);
        $j = $j + 5;

    }
    



    if($i == 7){
        break;
    }
}
$i++;
while($i < 8)
{   
        $pdf->SetXY(17, $j);
        $pdf->Cell(20, 5, $i, 1, 0, 'C');
        $pdf->Cell(69, 5, '', 1, 0, 'C');
        $pdf->Cell(47, 5, '', 1, 0, 'C');
        $pdf->Ln(5);
        $j = $j + 5;
        $i++;
}

$pdf->SetFont('Times','',7);

$pdf->SetXY(17, 118);
$pdf->Cell(65,20,utf8_decode(strtoupper($atencion['nombre'])), 0, 0, 'C');

$pdf->Cell(55,20,utf8_decode(strtoupper($almacen['nombre'])), 0, 0, 'C');

$pdf->Cell(70,20,utf8_decode(strtoupper($get_persona['nombre'])), 0, 0, 'C');

$pdf->SetXY(17, 123);
$pdf->Cell(65,2,'__________________________', 0, 0, 'C');

$pdf->Cell(55,2,'__________________________', 0, 0, 'C');

$pdf->Cell(70,2,'__________________________', 0, 0, 'C');

$pdf->SetXY(17, 128);
$pdf->Cell(65,7,utf8_decode(strtoupper($atencion['cargo'])), 0, 0, 'C');

$pdf->Cell(55,7,utf8_decode(strtoupper($almacen['cargo'])), 0, 0, 'C');

$pdf->Cell(70,7,'C.I:'.utf8_decode(strtoupper($get_persona['cedula'])), 0, 0, 'C');


$pdf->Output('I', "FICHA ", true);
?>
