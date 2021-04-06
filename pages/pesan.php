<?php 
require_once('class.Pesanan.php'); 
require_once('class.Menu.php'); 
require_once('class.User.php'); 

$objPesanan = new Pesanan(); 

if(isset($_POST['btnSubmit'])){	
	$objPesanan->idmenu = $_POST['idmenu'];	
	$objPesanan->iduser =$_SESSION["IDUser"];
    $objPesanan->quantity = $_POST['quantity'];	
	$objPesanan->harga = $_POST['harga'];
	$objPesanan->tanggaltransaksi = date("Y-m-d");
	$objPesanan->totalharga = $objPesanan->quantity * $objPesanan->harga;
	$objPesanan->status = "Not Approve";
	
	$objPesanan->AddPesanan();
	
	if($objPesanan->hasil){
		echo "<script> alert('Terima kasih atas pesanan anda, Admin kami akan segera memproses'); </script>";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">'; 				
	}
	else{
		echo "<script> alert('Proses gagal. Silakan ulangi'); </script>";	
	}			
}
else if(isset($_POST['btnPesan'])){	
	if(!isset($_SESSION["IDUser"])){
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=login">'; 				
	}
	else
	{
		$objMenu = new Menu();
		$objMenu->id = $_POST['idmenu'];
		$objMenu->SelectOneMenu();
		
		$objUser = new User();
		$objUser->id = $_SESSION["IDUser"];
		$objUser->SelectOneUser();
		
		
		$tanggaltransaksi = date("Y-m-d");
		$qty = $_POST['qty'];
		$totalharga = $qty * $objMenu->harga;
	}
}
?>
<div class="container">  
<div class="span7">			
  <h4 class="title"><span class="text"><strong>Data Pesanan</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
	<tr>
	<td>Tanggal Transaksi:</td>
	<td><input type="date" name="tanggaltransaksi" readonly value="<?php echo $tanggaltransaksi;?>"></td>
	</tr>
	<tr>
	<td>Menu:</td>
	<td>
	<input type="hidden" name="idmenu" value="<?php echo $objMenu->id; ?>">
	<input type="text" readonly name="namamenu" value="<?php echo $objMenu->nama; ?>"></td>
	</tr>
	<tr>
	<td>Harga Satuan:</td>
	<td><input type="text" name="harga" value="<?php echo $objMenu->harga;?>" readonly></td>
	</tr>
	<tr>
	<td>Quantity:</td>
	<td><input type="text" name="quantity" value="<?php echo $qty;?>"></td>
	</tr>
	<tr>
	<td>Total Harga:</td>
	<td><?php echo 'Rp '.number_format($totalharga,2,',','.');?></td>
	</tr>	
	<tr>
	<td colspan="2"><h4 class="title"><span class="text"><strong>Data Pemesan</strong></span></h4></td>
	</tr>
	<tr>
	<td>Nama:</td>
	<td>
	<input type="text" readonly value="<?php echo $objUser->nama; ?>"></td>
	</tr>
	<tr>
	<td>Alamat:</td>
	<td>
	<input type="text" readonly value="<?php echo $objUser->alamat; ?>"></td>
	</tr>
	<tr>
	<td>Handphone:</td>
	<td>
	<input type="text" readonly value="<?php echo $objUser->handphone; ?>"></td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" class="btn btn-primary" value="Submit Pesanan" name="btnSubmit">
	    <a href="index.php?p=pesananlist" class="btn btn-primary">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>


