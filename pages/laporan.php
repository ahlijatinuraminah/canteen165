<?php
require('fpdf/fpdf.php');

ob_end_clean();    
header("Content-Encoding: None", true);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Output();
?>