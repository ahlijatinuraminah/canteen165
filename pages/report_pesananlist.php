<?php
	
	require './../inc.koneksi.php';
    require './../class/class.Pesanan.php';
	require_once dirname(__FILE__).'/../vendor/autoload.php';
	
		use Spipu\Html2Pdf\Html2Pdf;

		$objPesanan = new Pesanan(); 		
		$arrayResult = $objPesanan->SelectAllPesanan();

//tampilkan data
$judul = 'LAPORAN DATA PESANAN';
$content ='<b>'.$judul.'</b>';
$content.= '<table border="0">';
$content.= 	'<tr>			
			<th>ID Pesanan</th>
			<th>Tanggal Transaksi</th>
			<th>Nama User</th>
			<th>Total Harga</th>
			<th>Status</th></tr>';


			if(count($arrayResult) == 0){
				$content.= '<tr><td colspan="4">Tidak ada data!</td></tr>';			
			}else{	
				foreach ($arrayResult as $dataPesanan) {
					$content.= '<tr>';
						
						$content.= '<td>'.$dataPesanan->id.'</td>';	
						$content.= '<td>'.$dataPesanan->tanggaltransaksi.'</td>';
						$content.= '<td>'.$dataPesanan->namauser.'</td>';
						$content.= '<td>'.$dataPesanan->totalharga.'</td>';					
						$content.= '<td>'.$dataPesanan->status.'</td>';					
						$content.= '</tr>';				
				}
			}


$content.= '</table>';

	$html2pdf = new HTML2PDF('L', 'A4', 'fr');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
	ob_end_clean();    
    $html2pdf->output('Laporan_Data_Pesanan.pdf');		

?>



