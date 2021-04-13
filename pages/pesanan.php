<?php 
require_once('./class/class.Pesanan.php'); 
require_once('./class/class.Pembeli.php'); 
require_once('./class/class.Mail.php'); 
require_once('./class/class.DetailPesanan.php'); 
$objPesanan = new Pesanan(); 		


if(isset($_POST['btnSubmit'])){	
	$objPesanan->id = $_GET['id'];	
	$objPesanan->SelectOnePesanan();
	$objPesanan->status = $_POST['status'];
		
	if(isset($_GET['id'])){		
		$objPesanan->id = $_GET['id'];
		$objPesanan->UpdatePesanan();
	}
	else{	
		$objPesanan->AddPesanan();
	}			
	
	if($objPesanan->hasil){

		$objPembeli = new Pembeli(); 	
		$objPembeli->id = $objPesanan->idpembeli;
		$objPembeli->SelectOnePembeli();

		$message =  file_get_contents('templateemail.html');  					 
		$header = "Status Pesanan ID " . $objPesanan->id;
		$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
				Status Pesanan Anda telah diupdate menjadi '.$objPesanan->status.' pada sistem Canteen 165.<br>
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
										 
		
		Mail::SendMail($objPembeli->email, $objPembeli->nama, 'Status Pesanan ID ' . $objPesanan->id, $message);	


		echo "<script> alert('$objPesanan->message'); </script>";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=pesananlist">'; 				
	}
	else{
		echo "<script> alert('Proses gagal. Silakan ulangi'); </script>";	
	}			
}
else if(isset($_GET['id'])){	
	$objPesanan->id = $_GET['id'];	
	$objPesanan->SelectOnePesanan();
	$objDetailPesanan = new DetailPesanan(); 	
	$objDetailPesanan->idpesanan = $objPesanan->id;
	$arrayDetailPesanan = $objDetailPesanan->SelectAllDetailPesanan();

}
?>
<div class="container">  
<div class="span7">			
  <h4 class="title"><span class="text"><strong>Pesanan</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
	<tr>
	<td>Nama Pembeli:</td>
	<td><?php echo $objPesanan->namapembeli;?>	
	</td>
	</tr>
	<tr>
	<td>Tanggal Transaksi:</td>
	<td><?php echo $objPesanan->tanggaltransaksi;?></td>
	</tr>
	<tr>
	<td>Detail Pesanan:</td>
	<td>
	<?php
	echo '<ol>';
	foreach ($arrayDetailPesanan as $dataDetailPesanan) {
		echo '<li>'.$dataDetailPesanan->namamenu.'|&nbsp'.$dataDetailPesanan->quantity.'|&nbsp Rp'.number_format($dataDetailPesanan->subtotal,2,',','.').'</li>';
	}
	echo '</ol>';
	?>
	
	</td>
	</tr>
	
	<tr>
	<td>Total Harga:</td>
	<td><?php echo 'Rp '.number_format($objPesanan->totalharga,2,',','.');?></td>
	</tr>
	<tr>
	<td>Status:</td>
	<td><select name="status">
	<option value="Not Approve" <?php if($objPesanan->status == 'Not Approve') echo 'checked'; ?>>Not Approve</option>
	<option value="Approve" <?php if($objPesanan->status == 'Approve') echo 'checked'; ?>>Approve</option>
	</select>
	</td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
	    <a href="index.php?p=pesananlist" class="btn btn-primary">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>


