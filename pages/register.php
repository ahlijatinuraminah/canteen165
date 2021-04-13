<div class="container">  
<div class="span5">
  <h2>Sign Up</h2>
    <form action="" method="post">
	<table class="table" border="0">
	<tr>
	<td>Name</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="nama" name="nama"></td>
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
	<td>Templat Lahir</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="tempatlahir" maxlength="50" name="tempatlahir"></td>
	</tr>
	<tr>
	<td>Tanggal Lahir</td>
	<td>:</td>
	<td>		
	<input type="date" class="form-control" id="tanggallahir" name="tanggallahir">	
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
	<td><input type="radio" name="jeniskelamin" value="laki-laki" text="">Laki-Laki</input>
		<input type="radio" name="jeniskelamin" value="perempuan">Perempuan
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
	require_once('./class/class.User.php'); 	
	require_once('./class/class.Mail.php'); 			
	$objUser = new User(); 
	
	$objUser->nama = $_POST['nama'];
    $objUser->email = $_POST['email'];
	$objUser->password = $_POST['password'];
	$objUser->alamat = $_POST['alamat'];
	$objUser->tempatlahir = $_POST['tempatlahir'];	
	$objUser->tanggallahir = $_POST['tanggallahir'];
	$objUser->handphone = $_POST['handphone'];
	$objUser->jeniskelamin =$_POST['jeniskelamin'];
	$objUser->role ='member';
				
	$cekEmail = $objUser->ValidateEmail($_POST['email']);
	
	if($cekEmail)	
		echo "<script> alert('Email sudah terdaftar'); </script>";			
	else{
		$objUser->AddUser();		
		
		if($objUser->hasil){

			$message =  file_get_contents('templateemail.html');  					 
			$header = "Registrasi berhasil";
			$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					Selamat <b>' .$objUser->name.'</b>, anda telah terdaftar pada sistem Canteen 165.<br>
					Berikut ini informasi account anda:<br>
					</span>
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
						Username : '.$objUser->email.'<br>
						Password : '.$objUser->password.'
					</span>';
			$footer ='Silakan login untuk mengakses sistem';
										
			$message = str_replace("#header#",$header,$message);
			$message = str_replace("#body#",$body,$message);
			$message = str_replace("#footer#",$footer,$message);
					 						
			
			Mail::SendMail($objUser->email, $objUser->name, 'Registrasi berhasil', $message);	
			
			echo "<script> alert('Anda berhasil mendaftar. Terima Kasih!'); </script>";			
			echo "<script>window.location = 'index.php?p=login' </script>";
		}
		else{
			echo "<script> alert('Pendaftaran gagal. Silakan ulangi'); </script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=register">';// refresh form register
		}	
	}

	
  }
   
?>

