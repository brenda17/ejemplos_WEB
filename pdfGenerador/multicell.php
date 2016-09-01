<?php
// require('./fpdf/fpdf.php');
//
// $pdf = new FPDF(); //Se crea un nuevo documento PDF hoja vertical, medida en puntos y tamañp carta
// $pdf->AddPage();
//
// $pdf->Output();

require('/fpdf/fpdf.php');

$pdf=new FPDF('P','pt','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);


$inicioX = 25;
$anchoCeldas = 17; //no es el ancho es el alto
$inicioY = 20;
$lineasVerticales = [$inicioX+106,$inicioX+192,$inicioX+450];

$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(147, 149, 152);

$pdf->SetXY($inicioX+20,$inicioY);
$pdf->MultiCell(86,$anchoCeldas,'Fecha',0,'C',true);
$posicionY = $pdf->GetY();
$pdf->SetXY($inicioX+106,$inicioY);
$pdf->MultiCell(86,$anchoCeldas,'Hora',0,'C',true);
$posicionY = ($pdf->GetY() > $posicionY) ? $pdf->GetY() : $posicionY  ;
$pdf->SetXY($inicioX+192,$inicioY);
$pdf->MultiCell(258,$anchoCeldas,utf8_decode('Ubicación'),0,'C',true);
$posicionY = ($pdf->GetY() > $posicionY) ? $pdf->GetY() : $posicionY ;
$pdf->SetXY($inicioX+450,$inicioY);
$pdf->MultiCell(86,$anchoCeldas,'Velocidad',0,'C',true);
$posicionY = ($pdf->GetY() > $posicionY) ? $pdf->GetY() : $posicionY ;

$pdf->SetFont('Arial','',9);
$pdf->SetTextColor(147, 149, 152);


$pdf->SetDrawColor(145, 145, 145);
for($i=0;$i<10;$i++){

$posicionYInicio = $posicionY;
$pdf->SetXY($inicioX+20,$posicionYInicio);
$pdf->MultiCell(86,$anchoCeldas,'20/06/2016',0,'C');
$posicionY = $pdf->GetY();
$pdf->SetXY($inicioX+106,$posicionYInicio);
$pdf->MultiCell(86,$anchoCeldas,'15:14',0,'C');
$posicionY = ($pdf->GetY() > $posicionY) ? $pdf->GetY() : $posicionY  ;
$pdf->SetXY($inicioX+192,$posicionYInicio);
$pdf->MultiCell(258,$anchoCeldas,utf8_decode('Ecatepec de morelos es una direccion muy muy muy muy muy muy muy muy muy muy muy muy muy muy muy muy muy muy muy muy muy muy muy muy muy muy muy muy muy larga'),0,'C');
$posicionY = ($pdf->GetY() > $posicionY) ? $pdf->GetY() : $posicionY ;
$pdf->SetXY($inicioX+450,$posicionYInicio);
$pdf->MultiCell(86,$anchoCeldas,'86 KPH',0,'C');
$posicionY = ($pdf->GetY() > $posicionY) ? $pdf->GetY() : $posicionY ;

$pdf->Line($inicioX+20,$posicionY,$inicioX+450+86,$posicionY);

$posicionYInicio = $posicionY;
$pdf->SetXY($inicioX+20,$posicionYInicio);
$pdf->MultiCell(86,$anchoCeldas,'20/06/2016',0,'C');
$posicionY = $pdf->GetY();
$pdf->SetXY($inicioX+106,$posicionYInicio);
$pdf->MultiCell(86,$anchoCeldas,'15:14',0,'C');
$posicionY = ($pdf->GetY() > $posicionY) ? $pdf->GetY() : $posicionY  ;
$pdf->SetXY($inicioX+192,$posicionYInicio);
$pdf->MultiCell(258,$anchoCeldas,utf8_decode('Ecatepec de morelos'),0,'C');
$posicionY = ($pdf->GetY() > $posicionY) ? $pdf->GetY() : $posicionY ;
$pdf->SetXY($inicioX+450,$posicionYInicio);
$pdf->MultiCell(86,$anchoCeldas,'86 KPH',0,'C');
$posicionY = ($pdf->GetY() > $posicionY) ? $pdf->GetY() : $posicionY ;

$pdf->Line($inicioX+20,$posicionY,$inicioX+450+86,$posicionY);

}




for ($i=0; $i < 3; $i++) {
  $pdf->Line($lineasVerticales[$i],$inicioY+$anchoCeldas,$lineasVerticales[$i],$posicionY);
}


$pdf->Output();

?>
