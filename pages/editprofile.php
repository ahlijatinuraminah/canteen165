<?php 

require_once('./class/class.Pembeli.php'); 		
$objPembeli = new Pembeli(); 

if(isset($_POST['btnSubmit'])){	
	$objPembeli->id =  $_SESSION["idpembeli"];
    //$objPembeli->nama = $_POST['nama'];
    //$objPembeli->email = $_POST['email'];
	$objPembeli->alamat = $_POST['alamat'];
	$objPembeli->tempatlahir = $_POST['tempatlahir'];	
	$objPembeli->tanggallahir = $_POST['tanggallahir'];
	$objPembeli->handphone = $_POST['handphone'];
	$objPembeli->jeniskelamin =$_POST['jeniskelamin'];	
	$objPembeli->currentfoto =$_POST['currentfoto'];	
	$message = '';
	
	$folder		= './upload/pembeli/';
		//type file yang bisa diupload
	$file_type	= array('jpg','jpeg','png','gif','bmp');
	$max_size	= 1000000; // 1MB	
	$isErrorFile   = false;
	$isSuccessUpload = true;
	
	if (!empty($_FILES['foto']['name'])) {	
		$file_name	= $_FILES['foto']['name'];
		$file_size	= $_FILES['foto']['size'];
		//cari extensi file dengan menggunakan fungsi explode
		$explode	= explode('.',$file_name);
		$extensi	= $explode[count($explode)-1];
		//check apakah type file sudah sesuai
		if(!in_array($extensi,$file_type)){
			$isErrorFile   = true;
			$message .= 'Type file yang anda upload tidak sesuai';
		}
		if($file_size > $max_size){
			$isErrorFile   = true;
			$message .= 'Ukuran file melebihi batas maximum';
		}	
		
		if($isErrorFile){
			echo "<script> alert('$message'); </script>";
		}
		else{
			$objPembeli->foto = $objPembeli->id.'.'.$extensi;
			$isSuccessUpload = move_uploaded_file($_FILES['foto']['tmp_name'], $folder.$objPembeli->foto);							
		}
	}
		
	if($isSuccessUpload){			
		$objPembeli->UpdatePembeli();
			
		if($objPembeli->hasil){						
			echo "<script> alert('$objPembeli->message'); </script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=editprofile">'; 				
		}
		else
			echo "<script> alert('Proses update gagal. Silakan ulangi'); </script>";			
	}
	else
		echo "<script> alert('Proses upload gagal. Silakan ulangi'); </script>";			
				
}
else if(isset($_SESSION["idpembeli"])){		
	$objPembeli->id = $_SESSION["idpembeli"];
	$objPembeli->SelectOnePembeli();	
}
?>

<section class="main-content">				
	<div class="row">						
		<div class="span12">
			<div class="row">
				<div class="span3">
				<br/>
					<?php 
						if($objPembeli->foto !='')
							echo "<img src='upload/pembeli/".$objPembeli->foto."' width='300px' height='350px'/>"; 
						else
							echo "<img src='upload/pembeli/default.png' width='300px' height='350px'/>"; 
					?>								
				</div>
				<div class="span6">
				<h4 class="title"><span class="text"><strong>EDIT PROFILE</strong></span></h4>
				<form action="" method="post" enctype="multipart/form-data">
					<table class="table" border="0">
					<tr>
					<td>Name</td>
					<td>:</td>
					<td><input type="text" class="form-control" readonly id="nama" name="nama" value="<?php echo $objPembeli->nama; ?>"></td>
					</tr>
					 <tr>
					<td>E-mail</td>
					<td>:</td>
					<td><input type="text" class="form-control" readonly id="email" readonly maxlength="50" name="email" value="<?php echo $objPembeli->email; ?>"></td>
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
					<td><input type="date" class="form-control" id="tanggallahir" name="tanggallahir" value="<?php echo $objPembeli->tanggallahir; ?>">	</td>
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
					<td><input type="radio" name="jeniskelamin" value="laki-laki" <?php if($objPembeli->jeniskelamin == 'laki-laki') echo 'checked'; ?>>Laki-Laki</input>
						<input type="radio" name="jeniskelamin" value="perempuan" <?php if($objPembeli->jeniskelamin == 'perempuan') echo 'checked'; ?>>Perempuan</input>
					</td>
					</tr>	
					<tr>
					<td>Upload Foto</td>
					<td>:</td>
					<td><input type="file" class="form-control" id="foto" name="foto">
						<input type="hidden" name="currentfoto" value="<?php echo $objPembeli->foto; ?>">	
					</td>
					</tr>		
					<tr>
					<td></td>
					<td></td>
					<td><input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
						<a href="index.php" class="btn btn-primary">Cancel</a></td>
					</tr>	
					</table>    
				</form>		
				</div>							
			</div>						
		</div>		
	</div>
</section>			
	