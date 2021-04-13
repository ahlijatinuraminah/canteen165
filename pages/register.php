<div class="container">  
<div class="span5">
  <h2>Sign Up</h2>
    <form action="" method="post">
	<table class="table" border="0">
	<tr>
	<td>Nama</td>
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
	require_once('./class/class.Account.php'); 	
	require_once('./class/class.Mail.php'); 			
	require_once('./class/class.Pembeli.php'); 			
	$objAccount = new Account(); 
	
	$objAccount->nama = $_POST['nama'];
    $objAccount->email = $_POST['email'];
	$objAccount->password = $_POST['password'];
	$objAccount->role ='pembeli';
				
	$cekEmail = $objAccount->ValidateEmail($_POST['email']);
	
	if($cekEmail)	
		echo "<script> alert('Email sudah terdaftar'); </script>";			
	else{
		$objAccount->AddAccount();		
		
		if($objAccount->hasil){

			$objPembeli = new Pembeli();
			$objPembeli->idaccount = $objAccount->id;
			$objPembeli->AddPembeli();

			$message =  file_get_contents('templateemail.html');  					 
			$header = "Registrasi berhasil";
			$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					Selamat <b>' .$objAccount->nama.'</b>, anda telah terdaftar pada sistem Canteen 165.<br>
					Berikut ini informasi account anda:<br>
					</span>
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
						Accountname : '.$objAccount->email.'<br>
						Password : '.$objAccount->password.'
					</span>';
			$footer ='Silakan login untuk mengakses sistem';
										
			$message = str_replace("#header#",$header,$message);
			$message = str_replace("#body#",$body,$message);
			$message = str_replace("#footer#",$footer,$message);
					 						
			
			Mail::SendMail($objAccount->email, $objAccount->nama, 'Registrasi berhasil', $message);	
			
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

