<?php 

require_once('./class/class.User.php'); 		
$objUser = new User(); 

if(isset($_POST['btnSubmit'])){	
	$objUser->id =  $_SESSION["iduser"];
    $objUser->nama = $_POST['nama'];
    $objUser->email = $_POST['email'];
	$objUser->alamat = $_POST['alamat'];
	$objUser->tempatlahir = $_POST['tempatlahir'];	
	$objUser->tanggallahir = $_POST['tanggallahir'];
	$objUser->handphone = $_POST['handphone'];
	$objUser->jeniskelamin =$_POST['jeniskelamin'];	
	$objUser->currentfoto =$_POST['currentfoto'];	
	$message = '';
	
	$folder		= './upload/user/';
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
			$objUser->foto = $objUser->id.'.'.$extensi;
			$isSuccessUpload = move_uploaded_file($_FILES['foto']['tmp_name'], $folder.$objUser->foto);							
		}
	}
		
	if($isSuccessUpload){			
		$objUser->UpdateUser();
			
		if($objUser->hasil){			
			$_SESSION["nama"]= $objUser->nama;
			echo "<script> alert('$objUser->message'); </script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=editprofile">'; 				
		}
		else
			echo "<script> alert('Proses update gagal. Silakan ulangi'); </script>";			
	}
	else
		echo "<script> alert('Proses upload gagal. Silakan ulangi'); </script>";			
				
}
else if(isset($_SESSION["iduser"])){		
	$objUser->id = $_SESSION["iduser"];
	$objUser->SelectOneUser();	
}
?>

<section class="main-content">				
	<div class="row">						
		<div class="span12">
			<div class="row">
				<div class="span3">
				<br/>
					<?php 
						if($objUser->foto !='')
							echo "<img src='upload/user/".$objUser->foto."' width='300px' height='350px'/>"; 
						else
							echo "<img src='upload/user/default.png' width='300px' height='350px'/>"; 
					?>								
				</div>
				<div class="span6">
				<h4 class="title"><span class="text"><strong>EDIT PROFILE</strong></span></h4>
				<form action="" method="post" enctype="multipart/form-data">
					<table class="table" border="0">
					<tr>
					<td>Name</td>
					<td>:</td>
					<td><input type="text" class="form-control" id="nama" name="nama" value="<?php echo $objUser->nama; ?>"></td>
					</tr>
					 <tr>
					<td>E-mail</td>
					<td>:</td>
					<td><input type="text" class="form-control" id="email" readonly maxlength="50" name="email" value="<?php echo $objUser->email; ?>"></td>
					</tr>
					<tr>
					<td>Tempat Lahir</td>
					<td>:</td>
					<td>
					<input type="text" class="form-control" id="tempatlahir" maxlength="20" name="tempatlahir" value="<?php echo $objUser->tempatlahir; ?>">	
					</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td><input type="date" class="form-control" id="tanggallahir" name="tanggallahir" value="<?php echo $objUser->tanggallahir; ?>">	</td>
					</tr>	
					<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><textarea style="width:55%" name="alamat" class="form-control" rows="3" cols="19"><?php echo $objUser->alamat; ?></textarea></td>
					</tr>	
					<tr>
					<td>Handphone</td>
					<td>:</td>
					<td><input type="text" name="handphone" value="<?php echo $objUser->handphone; ?>">
					</td>
					</tr>	
					<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><input type="radio" name="jeniskelamin" value="laki-laki" <?php if($objUser->jeniskelamin == 'laki-laki') echo 'checked'; ?>>Laki-Laki</input>
						<input type="radio" name="jeniskelamin" value="perempuan" <?php if($objUser->jeniskelamin == 'perempuan') echo 'checked'; ?>>Perempuan</input>
					</td>
					</tr>	
					<tr>
					<td>Upload Foto</td>
					<td>:</td>
					<td><input type="file" class="form-control" id="foto" name="foto">
						<input type="hidden" name="currentfoto" value="<?php echo $objUser->foto; ?>">	
					</td>
					</tr>		
					<tr>
					<td></td>
					<td></td>
					<td><input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
						<a href="index.php?p=memberlist" class="btn btn-primary">Cancel</a></td>
					</tr>	
					</table>    
				</form>		
				</div>							
			</div>						
		</div>		
	</div>
</section>			
	