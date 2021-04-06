<?php

require_once('html2pdf/html2pdf.class.php');
include "inc.koneksi.php";

if(isset($_GET['id'])){	
 $id = $_GET['id'];
 $sql = "SELECT a.*, b.Nama as NamaUser, c.Nama as NamaMenu FROM tblpesanan a, tbluser b, tblmenu c where a.IDUser = b.IDUser and a.IDMenu = c.IDMenu and a.IDPesanan=".$id;
		$result = mysql_query($sql) or die(mysql_error()); //mengeksekusi query
 $data = mysql_fetch_assoc($result);					
	$judul = 'HISTORY PESANAN'.$objPesanan->id;
	$content ='
	<table>
	<tr>
	<td>Nama User:</td>
	<td>'.$data['NamaUser'].'</td>
	</tr>
	<tr>
	<td>Tanggal Transaksi:</td>
	<td>'.$data['TanggalTransaksi'].'</td>
	</tr>
	<tr>
	<td>Menu:</td>
	<td>'.$data['NamaMenu'].'</td>
	</tr>
	<tr>
	<td>Harga Satuan:</td>	
	<td>Rp '.number_format($data['Harga'],2,',','.').'</td>
	</tr>
	<tr>
	<td>Quantity:</td>
	<td>'.$data['Quantity'].'</td>
	</tr>
	<tr>
	<td>Total Harga:</td>
	<td>Rp '.number_format($data['TotalHarga'],2,',','.').'</td>
	</tr>
	<tr>
	<td>Status:</td>
	<td>'.$data['Status'].'</td>
	</tr>
	</table>';

	$html2pdf = new HTML2PDF('L', 'A4', 'fr');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
	ob_end_clean();    
    $html2pdf->Output($judul.'.pdf');
}
?>