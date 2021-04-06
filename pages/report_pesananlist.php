<?php
	
require_once('html2pdf/html2pdf.class.php');
require_once('class.Pesanan.php'); 

//tampilkan data
$judul = 'LAPORAN DATA PESANAN';
$content ='<b>'.$judul.'</b>';
$content.= '<table border="1">';
$content.= 	'<tr>
			<th>No.</th>
			<th>ID Pesanan</th>
			<th>Tanggal Transaksi</th>
			<th>Nama User</th>
			<th>Nama Menu</th>
			<th>Harga Satuan</th>
			<th>Quantity</th>
			<th>Total Harga</th>
			<th>Status</th></tr>';


$sql = "SELECT a.*, b.Nama as NamaUser, c.Nama as NamaMenu FROM tblpesanan a, tbluser b, tblmenu c where a.IDUser = b.IDUser and a.IDMenu = c.IDMenu ORDER BY IDPesanan ASC";
		$result = mysql_query($sql) or die(mysql_error()); //mengeksekusi query
	  
		while($data = mysql_fetch_assoc($result)){
				$content.= '<tr>';
					$content.= '<td>'.$no.'</td>';	
					$content.= '<td>'.$data['IDPesanan'].'</td>';	
					$content.= '<td>'.$data['TanggalTransaksi'].'</td>';	
					$content.= '<td>'.$data['NamaUser'].'</td>';
					$content.= '<td>'.$data['NamaMenu'].'</td>';
					$content.= '<td>Rp '.number_format($data['Harga'],2,',','.').'</td>';
					$content.= '<td>'.$data['Quantity'].'</td>';					
					$content.= '<td>Rp '.number_format($data['TotalHarga'],2,',','.').'</td>';
					$content.= '<td>'.$data['Status'].'</td>';					
					$content.= '</tr>';				
				
				$no++;	
			}			


$content.= '</table>';

	$html2pdf = new HTML2PDF('L', 'A4', 'fr');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
	ob_end_clean();    
    $html2pdf->Output($judul.'.pdf');

?>



