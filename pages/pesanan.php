<?php 
require_once('class.Pesanan.php'); 

$objPesanan = new Pesanan(); 

if(isset($_POST['btnSubmit'])){	
	$objPesanan->idmenu = $_POST['idmenu'];	
    $objPesanan->quantity = $_POST['quantity'];	
	$objPesanan->harga = $_POST['harga'];
	$objPesanan->totalharga = $objPesanan->quantity * $objPesanan->harga;
	$objPesanan->status = $_POST['status'];
	
	if(isset($_GET['id'])){		
		$objPesanan->id = $_GET['id'];
		$objPesanan->UpdatePesanan();
	}
	else{	
		$objPesanan->AddPesanan();
	}			
	
	if($objPesanan->hasil){
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
}
?>
<div class="container">  
<div class="span7">			
  <h4 class="title"><span class="text"><strong>Pesanan</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
	<tr>
	<td>Nama User:</td>
	<td><?php echo $objPesanan->namauser;?></td>
	</tr>
	<tr>
	<td>Tanggal Transaksi:</td>
	<td><input type="date" name="tanggaltransaksi" value="<?php echo $objPesanan->tanggaltransaksi;?>"></td>
	</tr>
	<tr>
	<td>Menu:</td>
	<td>
	<select name="idmenu">
	<option></option>
	<?php
		require_once('class.Menu.php'); 
		$objMenu = new Menu(); 
		$arrayResult = $objMenu->SelectAllMenu('','');

		if(count($arrayResult) == 0){
			echo '<option></option>';			
		}else{	
			foreach ($arrayResult as $dataMenu) {
				if($dataMenu->id == $objPesanan->idmenu)					
					echo "<option selected='true' value='" . $dataMenu->id . "'>" . $dataMenu->nama . "</option>";
				else
					echo "<option value='" . $dataMenu->id . "'>" . $dataMenu->nama . "</option>";
			}
		}
		?>
	</select></td>
	</tr>
	<tr>
	<td>Harga Satuan:</td>
	<td><input type="text" name="harga" value="<?php echo $objPesanan->harga;?>" readonly></td>
	</tr>
	<tr>
	<td>Quantity:</td>
	<td><input type="text" name="quantity" value="<?php echo $objPesanan->quantity;?>"></td>
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


