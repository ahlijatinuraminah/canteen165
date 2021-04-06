<?php

require('fpdf/fpdf.php');
require_once('class.Pesanan.php'); 

ob_end_clean();    
header("Content-Encoding: None", true);

if(isset($_GET['id'])){	
 
	$pdf = new FPDF();
	$pdf->AddPage('P', 'A4');
	$pdf->SetFont('Arial','B',16);
	$judul = "HISTORY PEMESANAN";
	$pdf->Cell(0,20, $judul, '0', 1, 'C');

	$objPesanan = new Pesanan(); 		
	$objPesanan->id = $_GET['id'];
	$objPesanan->SelectOnePesanan();	
	
	$pdf->SetFont('Arial','','10');
	$pdf->Cell(50,5, "Nama User :", '1', 0, 'L');
	$pdf->Cell(50,5, $objPesanan->namauser, '1', 1, 'L');
	$pdf->Cell(50,5, "ID Pesanan :", '1', 0, 'L');
	$pdf->Cell(50,5, $objPesanan->id, '1', 1, 'L');
	$pdf->Cell(50,5, "Tanggal Transaksi :", '1', 0, 'L');
	$pdf->Cell(50,5, $objPesanan->tanggaltransaksi, '1', 1, 'L');
	$pdf->Cell(50,5, "Menu yang dipesan :", '1', 0, 'L');
	$pdf->Cell(50,5, $objPesanan->namamenu, '1', 1, 'L');
	$pdf->Cell(50,5, "Harga Satuan :", '1', 0, 'L');
	$pdf->Cell(50,5, 'Rp '.number_format($objPesanan->harga,2,',','.'), '1', 1, 'L');
	$pdf->Cell(50,5, "Quantity :", '1', 0, 'L');
	$pdf->Cell(50,5, $objPesanan->quantity, '1', 1, 'L');
	$pdf->Cell(50,5, "Total Harga :", '1', 0, 'L');
	$pdf->Cell(50,5, 'Rp '.number_format($objPesanan->totalharga,2,',','.'), '1', 1, 'L');
	$pdf->Cell(50,5, "Status :", '1', 0, 'L');
	$pdf->Cell(50,5, $objPesanan->status, '1', 1, 'L');

	$pdf->Ln();
	$tanggalCetak = date("d F Y H:i:sA");
	$pdf->Cell(30, 5, "Report di-generate per tanggal ".$tanggalCetak );		
	$pdf->Output('I', $judul.'-'.$objPesanan->id.'.pdf');// D untuk download otomatis
}
?>



