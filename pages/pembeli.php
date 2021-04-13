<?php 
require_once('./class/class.Pembeli.php'); 		

$objPembeli = new Pembeli(); 

if(isset($_POST['btnSubmit'])){	
	
    $objPembeli->nama = $_POST['nama'];
    $objPembeli->email = $_POST['email'];	
	$objPembeli->alamat = $_POST['alamat'];
	$objPembeli->tempatlahir = $_POST['tempatlahir'];	
	$objPembeli->tanggallahir = $_POST['tanggallahir'];
	$objPembeli->handphone = $_POST['handphone'];
	$objPembeli->jeniskelamin =$_POST['jeniskelamin'];
	
	if(isset($_GET['id'])){
		$objPembeli->id = $_GET['id'];
		$objPembeli->UpdatePembeli();
	}
	else{	
		$objPembeli->AddPembeli();				
	}	
	
	if($objPembeli->hasil){
		echo "<script> alert('".$objPembeli->message."'); </script>";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=pembelilist">'; 				
	}
	else{
		echo "<script> alert('Proses gagal. Silakan ulangi'); </script>";	
	}		
				
}
else if(isset($_GET['id'])){	
	$objPembeli->id = $_GET['id'];	
	$objPembeli->SelectOnePembeli();
}
?>
<div class="container">  
<div class="span7">			
  <h4 class="title"><span class="text"><strong>Pembeli</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
	<tr>
	<td>Name</td>
	<td>:</td>
	<td><input type="text" class="form-control" readonly id="nama" name="nama" value="<?php echo $objPembeli->nama; ?>"></td>
	</tr>
	 <tr>
	<td>E-mail</td>
	<td>:</td>
	<td><input type="text" class="form-control" readonly id="email" maxlength="50" name="email" value="<?php echo $objPembeli->email; ?>"></td>
	</tr>
	<tr>
	<td>Tempat Lahir</td>
	<td>:</td>
	<td>
    <input type="text" class="form-control" id="tempatlahir" maxlength="20" name="tempatlahir" value="<?php echo $objPembeli->tempatlahir; ?>">	
	</td>
	</tr>
	<tr>
	<td>Tanggal Lahir</td>
	<td>:</td>
	<td>
	<input type="date" class="form-control" id="tanggallahir" name="tanggallahir" value="<?php echo $objPembeli->tanggallahir; ?>">	
	</td>
	</tr>	
	<tr>
	<td>Alamat</td>
	<td>:</td>
	<td><textarea style="width:55%" name="alamat" class="form-control" rows="3" cols="19"><?php echo $objPembeli->alamat; ?></textarea></td>
	</tr>	
	<tr>
	<td>Handphone</td>
	<td>:</td>
	<td><input type="text" name="handphone" value="<?php echo $objPembeli->handphone; ?>">
	</td>
	</tr>	
	<tr>
	<td>Jenis Kelamin</td>
	<td>:</td>
	<td><input type="radio" name="jenisKelamin" value="laki-laki" <?php if($objPembeli->jeniskelamin == 'laki-laki') echo 'checked'; ?>>Laki-Laki</input>
		<input type="radio" name="jenisKelamin" value="perempuan" <?php if($objPembeli->jeniskelamin == 'perempuan') echo 'checked'; ?>>Perempuan</input>
	</td>
	</tr>		
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
	    <a href="index.php?p=pembelilist" class="btn btn-primary">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>


