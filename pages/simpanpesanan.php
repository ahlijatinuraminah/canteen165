<?php 
require_once('./class/class.Pesanan.php'); 
require_once('./class/class.Pembeli.php'); 
require_once('./class/class.Mail.php'); 	
$objPesanan = new Pesanan(); 		

if(isset($_POST['btnSubmit'])){	

	$objPembeli = new Pembeli(); 	
	$objPembeli->id = $_SESSION['idpembeli'];
	$objPembeli->SelectOnePembeli();

	$objPesanan->status = "Menunggu Persetujuan";
	$objPesanan->idpembeli = $objPembeli->id;
	$objPesanan->totalharga = $_SESSION['totalharga'];
	$objPesanan->tanggaltransaksi = date('Y-m-d');
	$objPesanan->AddPesanan();

	if($objPesanan->hasil){
		unset ($_SESSION["cart"]);

		

		$message =  file_get_contents('templateemail.html');  					 
		$header = "Pesanan berhasil dibuat";
		$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
				Terima kasih sudah melakukan pemesanan pada sistem Canteen 165.<br>
				Berikut ini informasi pesanan Anda:<br>
				</span>
				<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					ID Pesanan : '.$objPesanan->id.'<br>
					Tanggal Transaksi : '.$objPesanan->tanggaltransaksi.'<br>
					Total Harga : '.$objPesanan->totalharga.'<br>
				</span>';
		$footer ='Silakan login untuk mengakses sistem';
									
		$message = str_replace("#header#",$header,$message);
		$message = str_replace("#body#",$body,$message);
		$message = str_replace("#footer#",$footer,$message);
										 
		
		Mail::SendMail($objPembeli->email, $objPembeli->nama, 'Pesanan berhasil dibuat', $message);	
	}
}

?>
<section class="header_text">
	Pesanan anda telah kami terima
    <br>Silakan cek history pesanan untuk informasi pengiriman.
	<br>Terima kasih
</section>

