<?php
	if (!isset($_SESSION)) {
				session_start();
	}
	//cek apakah user sudah login
	if(!isset($_SESSION['IDUser'])){
		echo "<script> alert('Anda harus login untuk mengakses halaman ini'); </script>";	
		die();
	}
	//cek role user apakah admin
	if($_SESSION['Role']!="admin"){
		echo "<script> alert('Anda tidak berhak mengakses halaman ini'); </script>";	
		die();
	}
?>

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
	
	$sql = '';
	$message ='';
	if(isset($_GET['id'])){
		$id =  $_GET['id'];
		$sql = "UPDATE tbluser SET Email = '$email',
		        Nama ='$name',
				Alamat = '$alamat',
				TempatLahir = '$tempatlahir',
				TanggalLahir = '$tanggalLahir',
				Handphone = '$handphone',
				JenisKelamin = '$jenisKelamin'
				WHERE IDUser = $id";
		$message ='Data berhasil diubah!';
	}
	else{	
		$sqlCek = "SELECT email FROM tbluser WHERE email='$email'";    
		$cekEmail = mysql_query($sqlCek) or die(mysql_error());
	
		if(mysql_num_rows($cekEmail) == 1){			
			echo "<script> alert('Email sudah terdaftar'); </script>";	
		}
		else
		{
			$sql = "INSERT INTO tbluser(Email, Nama, Alamat, TempatLahir, TanggalLahir, Handphone, JenisKelamin) 
		            values ('$email','$name', '$alamat', '$tempatlahir', '$tanggalLahir', '$handphone', '$jenisKelamin')";
			$message ='Data berhasil ditambahkan!';			
		}
	}			
	$result = mysql_query($sql) or die(mysql_error());
	if($result){
		echo "<script> alert('$message'); </script>";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=memberlist">';// redirect ke form memberlist    				
	}
	else{
		echo "<script> alert('Proses gagal. Silakan ulangi'); </script>";	
	}			
}
else if(isset($_GET['id'])){	
	$id =  $_GET['id'];
	$queryOne = "SELECT * FROM tbluser WHERE IDUser='$id'";
	$resultOne = mysql_query($queryOne) or die(mysql_error());
	
	if(mysql_num_rows($resultOne) == 1){
		//jika email sudah terdaftar maka tampilkan alert
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
	}	
}
?>
<div class="container">  
<div class="span7">			
  <h4 class="title"><span class="text"><strong>Member</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
	<tr>
	<td>Name</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>"></td>
	</tr>
	 <tr>
	<td>E-mail</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="email" maxlength="50" name="email" value="<?php echo $email; ?>"></td>
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
	<select style="width:18%" name="blnLahir">	  
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
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
	    <a href="index.php?p=memberlist" class="btn btn-primary">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>


