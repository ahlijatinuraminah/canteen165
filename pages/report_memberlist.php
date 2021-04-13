<?php
	
	require './../inc.koneksi.php';
    require './../class/class.User.php';
	require_once dirname(__FILE__).'/../vendor/autoload.php';
	
		use Spipu\Html2Pdf\Html2Pdf;


//tampilkan data
$judul = 'LAPORAN DATA MEMBER';
$content ='<b>'.$judul.'</b>';
$content.= '<table style="border:1px">';
$content.= 	'<tr>
			<td>No.</td>
			<td>Email</td>
			<td>Password</td>
			<td>Nama</td>
			<td>Alamat</td>
			<td>Tempat, Tanggal Lahir</td>
			<td>Handphone</td>
			<td>JenisKelamin</td></tr>';

$objUser = new User(); 		
$arrayResult = $objUser->SelectAllUser();
if(count($arrayResult) == 0){
	$content.= '<td>Tidak ada data!</td>';
}else{	
	$i = 1;	
	foreach ($arrayResult as $dataUser) {					
			$content.= '<tr>';
			$content.= '<td>'.$i.'</td>';
			$content.= '<td>'.$dataUser->email.'</td>';
			$content.= '<td>'.$dataUser->nama.'</td>';
			$content.= '<td>'.$dataUser->alamat.'</td>';
			$content.= '<td>'.$dataUser->tempatlahir.', '.$dataUser->tanggallahir.'</td>';
			$content.= '<td>'.$dataUser->handphone.'</td>';
			$content.= '<td>'.$dataUser->jeniskelamin.'</td>';			
			$content.= '</tr>';
		$i++;		
	}
}

$content.= '</table>';

	$html2pdf = new HTML2PDF('L', 'A4', 'fr');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
	ob_end_clean();    
    $html2pdf->Output($judul.'.pdf');

?>



