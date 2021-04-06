<div class="container">  
<div class="span7">
  <h2>Sign Up</h2>
    <form action="" method="post">
	<table class="table" border="0">
	<tr>
	<td>Name</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="name" name="name"></td>
	</tr>
	 <tr>
	<td>E-mail</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="email" maxlength="50" name="email"></td>
	</tr>
	 <tr>
	<td>Password</td>
	<td>:</td>
	<td><input type="password" class="form-control" id="password" name="password"></td>
	</tr>
	<tr>
	<td>Tanggal Lahir</td>
	<td>:</td>
	<td>		
	<select style="width:20%" name="tglLahir">
	  <option>Tanggal</option>
	  <option value="1">1</option>
	  <option value="2">2</option>
	  <option value="3">3</option>
	  <option value="4">4</option>
	  <option value="5">5</option>
	  <option value="6">6</option>
	  <option value="7">7</option>
	  <option value="8">8</option>
	  <option value="9">9</option>
	  <option value="10">10</option>
	</select>
	<select style="width:18%" name="blnLahir">
	  <option>Bulan</option>
	  <option value="1">Januari</option>
	  <option value="2">Februari</option>
	  <option value="3">Maret</option>
	  <option value="4">April</option>
	  <option value="5">Mei</option>
	  <option value="6">Juni</option>
	  <option value="7">Juli</option>
	  <option value="8">Agustus</option>
	  <option value="9">September</option>
	  <option value="10">Oktober</option>
	  <option value="11">November</option>
	  <option value="12">Desember</option>
	</select>
	<select style="width:18%" name="thnLahir">
	  <option>Tahun</option>
	  <option value="1">2000</option>
	  <option value="2">1999</option>
	  <option value="3">1998</option>
	  <option value="4">1997</option>
	</select>	
	</td>
	</tr>	
	<tr>
	<td>Alamat</td>
	<td>:</td>
	<td><textarea style="width:55%" name="alamat" class="form-control" rows="3" cols="19"></textarea></td>
	</tr>	
	<tr>
	<td>Handphone</td>
	<td>:</td>
	<td><input type="text" name="handphone">
	</td>
	</tr>	
	<tr>
	<td>Jenis Kelamin</td>
	<td>:</td>
	<td><input type="radio" name="jenisKelamin" value="laki-laki" text="">Laki-Laki</input>
		<input type="radio" name="jenisKelamin" value="perempuan">Perempuan
	</td>
	</tr>		
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
	    <input type="button" value="Cancel" class="btn btn-primary" name="btnReset"></td>
	</tr>	
	</table>    
</form>
	
</div>  
</div>
<?php // jika submit button diklik
  if(isset($_POST['btnSubmit'])){	
	include "inc.koneksi.php";
	//include "class.Mail.php";
	
    $name = $_POST['name'];
    $email = $_POST['email'];
	$password = $_POST['password'];
	$alamat = $_POST['alamat'];
	$sql = "INSERT INTO tbluser(Email, Password, Nama, Alamat, Role) 
		        values ('$email', '$password', '$name', '$alamat', 'member')";
				
		$result = mysql_query($sql) or die(mysql_error());
		if($result){
			$subject= "Registrasi sukses";
			$message = "Selamat datang <b>$name</b>";			
			//$objMail = new Mail();
			//$objMail->SendMail($email, $name, $subject, $message);

			echo "<script> alert('Anda berhasil mendaftar. Terima Kasih!'); </script>";
			//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=login">';// redirect ke form login    			
			echo "<script>window.location = 'index.php?p=login' </script>";
		}
		else{
			echo "<script> alert('Pendaftaran gagal. Silakan ulangi'); </script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=register">';// refresh form register
		}		
	}	
   
?>

