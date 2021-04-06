<?php

require('fpdf/fpdf.php');
require_once('class.User.php'); 

ob_end_clean();    
header("Content-Encoding: None", true);
 
$pdf = new FPDF();
$pdf->AddPage('L', 'A4');
$pdf->SetFont('Arial','B',16);
$judul = "LAPORAN DATA MEMBER";
$pdf->Cell(0,20, $judul, '0', 1, 'C');

//tampilkan header
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);

$pdf->Cell(10, 5, "NO.", 1, '0', "C", true);
$pdf->Cell(40, 5, "EMAIL", 1, '0', "C", true);
$pdf->Cell(40, 5, "NAMA", 1, '0', "C", true);
$pdf->Cell(60, 5, "ALAMAT", 1, '0', "C", true);
$pdf->Cell(50, 5, "TEMPAT, TANGGAL LAHIR", 1, '0', "C", true);
$pdf->Cell(30, 5, "HANDPHONE", 1, '0', "C", true);
$pdf->Cell(30, 5, "JENIS KELAMIN", 1, '0', "C", true);

$pdf->Ln();

//tampilkan data
$objUser = new User(); 		
$arrayResult = $objUser->SelectAllUser();
$pdf->SetTextColor(0);
if(count($arrayResult) == 0){
	$pdf->Cell(40,10,'Tidak ada data!');
}else{	
	$i = 1;	
	foreach ($arrayResult as $dataUser) {		
			$pdf->Cell(10, 5, $i, 1, '0');
			$pdf->Cell(40, 5, $dataUser->email, 1, '0');
			$pdf->Cell(40, 5, $dataUser->nama, 1, '0');
			$pdf->Cell(60, 5, $dataUser->alamat, 1, '0');
			$pdf->Cell(50, 5, $dataUser->tempatlahir.', '.$dataUser->tanggallahir, 1, '0');
			$pdf->Cell(30, 5, $dataUser->handphone, 1, '0');			
			$pdf->Cell(30, 5, $dataUser->jeniskelamin, 1, '0');					
		$i++;
		$pdf->Ln();
	}
}


$pdf->Ln();
$tanggalCetak = date("d F Y H:i:sA");
$pdf->Cell(30, 5, "Report di-generate per tanggal ".$tanggalCetak );		
$pdf->Output('I', $judul.'.pdf');// D untuk download otomatis

?>



