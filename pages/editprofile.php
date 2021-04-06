<?php 
include "inc.koneksi.php";
$id =0;
$name = '';
$email = '';
$alamat = '';
$tempatlahir = '';
$tglLahir = 0;
$blnLahir =0;
$thnLahir =0;
$handphone ='';
$jenisKelamin ='';
$foto ='';
$currentfoto ='';

if(isset($_POST['btnSubmit'])){	
    $name = $_POST['name'];
    $email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$tempatlahir = $_POST['tempatlahir'];	
	$tglLahir = $_POST['tglLahir'];
	$blnLahir =$_POST['blnLahir'];
	$thnLahir = $_POST['thnLahir'];
	$tanggalLahir = "$thnLahir-$blnLahir-$tglLahir";
	$handphone = $_POST['handphone'];
	$jenisKelamin =$_POST['jenisKelamin'];	
	$currentfoto =$_POST['currentfoto'];	
	$message = '';
	
	$folder		= './upload/member/';
		//type file yang bisa diupload
	$file_type	= array('jpg','jpeg','png','gif','bmp');
	$max_size	= 1000000; // 1MB	
	$isErrorFile   = false;
	$isSuccessUpload = true;
	
	$id =  $_SESSION["IDUser"];
	
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
			$currentfoto = $id.'.'.$extensi;
			$isSuccessUpload = move_uploaded_file($_FILES['foto']['tmp_name'], $folder.$currentfoto);							
		}
	}
		
	if($isSuccessUpload){			
		$sql = "UPDATE tbluser SET Email = '$email',
				Nama ='$name',
				Alamat = '$alamat',
				TempatLahir = '$tempatlahir',
				TanggalLahir = '$tanggalLahir',
				Handphone = '$handphone',
				JenisKelamin = '$jenisKelamin',
				Foto ='$currentfoto'
				WHERE IDUser = $id";
		$message = 'Update berhasil!';
			
		$result = mysql_query($sql) or die(mysql_error());
		if($result){			
			$_SESSION["Nama"]= $name;
			echo "<script> alert('$message'); </script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=editprofile">'; 				
		}
		else
			echo "<script> alert('Proses update gagal. Silakan ulangi'); </script>";			
	}
	else
		echo "<script> alert('Proses upload gagal. Silakan ulangi'); </script>";			
				
}
else if(isset($_SESSION["IDUser"])){	
	$id =  $_SESSION["IDUser"];
	$queryOne = "SELECT * FROM tbluser WHERE IDUser='$id'";
	$resultOne = mysql_query($queryOne) or die(mysql_error());
	
	if(mysql_num_rows($resultOne) == 1){
		
		$data = mysql_fetch_assoc($resultOne);
		$name = $data['Nama'];		
		$email = $data['Email'];	
		$alamat = $data['Alamat'];	
		$tempatlahir = $data['TempatLahir'];			
		$tanggalLahir = strtotime($data['TanggalLahir']);
		$thnLahir =  date('Y', $tanggalLahir);
		$blnLahir = date('m', $tanggalLahir);
		$tglLahir = date('d', $tanggalLahir);
		$handphone = $data['Handphone'];	
		$jenisKelamin = $data['JenisKelamin'];	
		$foto = $data['Foto'];	
	}	
}
?>

<section class="main-content">				
	<div class="row">						
		<div class="span12">
			<div class="row">
				<div class="span3">
				<br/>
					<?php 
						if($foto !='')
							echo "<img src='upload/member/".$foto."' width='300px' height='350px'/>"; 
						else
							echo "<img src='upload/member/default.png' width='300px' height='350px'/>"; 
					?>								
				</div>
				<div class="span6">
				<h4 class="title"><span class="text"><strong>EDIT PROFILE</strong></span></h4>
				<form action="" method="post" enctype="multipart/form-data">
					<table class="table" border="0">
					<tr>
					<td>Name</td>
					<td>:</td>
					<td><input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>"></td>
					</tr>
					 <tr>
					<td>E-mail</td>
					<td>:</td>
					<td><input type="text" class="form-control" id="email" readonly maxlength="50" name="email" value="<?php echo $email; ?>"></td>
					</tr>
					<tr>
					<td>Tempat Lahir</td>
					<td>:</td>
					<td>
					<input type="text" class="form-control" id="tempatlahir" maxlength="20" name="tempatlahir" value="<?php echo $tempatlahir; ?>">	
					</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td>
					<select style="width:20%" name="tglLahir">
					  <option>Tanggal</option>
					  <?php	  
					  for($i=1;$i<=31;$i++)
					  {
						  if($i == $tglLahir)
							echo "<option value='$i' selected='true'>$i</option>";
						  else
							echo "<option value='$i'>$i</option>";
					  }
					  ?>	 
					</select>
					<select style="width:30%" name="blnLahir">	  
					  <?php
						$arrayBulan = array( "Bulan", "Januari", "Februari", "Maret", "April", "Mei", "Juni",
										   "Juli", "Agustus", "September", "Oktober", "November", "Desember");	  	  
						for($c=0; $c<count($arrayBulan); $c++){
						  if($c == $blnLahir)
							echo "<option value='$c' selected='true'>$arrayBulan[$c]</option>";
						  else
							echo"<option value='$c'>$arrayBulan[$c]</option>";
						}	  
					  ?>	 
					 
					</select>
					<select style="width:18%" name="thnLahir">
					  <option>Tahun</option>
					  <?php	  
					  for($i=2016;$i>=1999;$i--)
					  {
						  if($i == $thnLahir)
							echo "<option value='$i' selected='true'>$i</option>";
						  else
							echo "<option value='$i'>$i</option>";
					  }
					  ?>	 
					</select>	
					</td>
					</tr>	
					<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><textarea style="width:55%" name="alamat" class="form-control" rows="3" cols="19"><?php echo $alamat; ?></textarea></td>
					</tr>	
					<tr>
					<td>Handphone</td>
					<td>:</td>
					<td><input type="text" name="handphone" value="<?php echo $handphone; ?>">
					</td>
					</tr>	
					<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><input type="radio" name="jenisKelamin" value="laki-laki" <?php if($jenisKelamin == 'laki-laki') echo 'checked'; ?>>Laki-Laki</input>
						<input type="radio" name="jenisKelamin" value="perempuan" <?php if($jenisKelamin == 'perempuan') echo 'checked'; ?>>Perempuan</input>
					</td>
					</tr>	
					<tr>
					<td>Upload Foto</td>
					<td>:</td>
					<td><input type="file" class="form-control" id="foto" name="foto">
						<input type="hidden" name="currentfoto" value="<?php echo $foto; ?>">	
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
	