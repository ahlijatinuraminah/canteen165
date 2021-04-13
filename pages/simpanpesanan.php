<?php 
require_once('./class/class.Pesanan.php'); 
require_once('./class/class.User.php'); 	
require_once('./class/class.Mail.php'); 	
$objPesanan = new Pesanan(); 		

if(isset($_POST['btnSubmit'])){	
	$objPesanan->status = "Menunggu Persetujuan";
	$objPesanan->iduser = $_SESSION['iduser'];
	$objPesanan->totalharga = $_SESSION['totalharga'];
	$objPesanan->tanggaltransaksi = date('Y-m-d');
	$objPesanan->AddPesanan();

	if($objPesanan->hasil){
		unset ($_SESSION["cart"]);

		$objUser = new User(); 	
		$objUser->id = $_SESSION['iduser'];
		$objUser->SelectOneUser();

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
										 
		
		Mail::SendMail($objUser->email, $objUser->name, 'Pesanan berhasil dibuat', $message);	
	}
}

?>
<section class="header_text">
	Pesanan anda telah kami terima
    <br>Silakan cek history pesanan untuk informasi pengiriman.
	<br>Terima kasih
</section>

