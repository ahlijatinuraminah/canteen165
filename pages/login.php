<div class="container">  
<div class="span5">			
  <h2>Sign In</h2>
    <form action="" method="post">
	<table class="table" width="80%">	
	<tr>
	<td>E-mail</td>
	<td>:</td>
	<td><input type="text" required class="form-control" name="email"></td>
	</tr>	
	<tr>
	<td>Password</td>
	<td>:</td>
	<td><input type="password" required class="form-control" name="password">
	</td>
	</tr>	
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-primary" name="btnLogin" value="Login">	
	</tr>	
	</table>    
</form>
	
  </div>
</div>

<?php // jika submit button diklik
  if(isset($_POST['btnLogin'])){
	require_once('./class/class.Account.php'); 		
	$objAccount = new Account(); 
	
    $objAccount->email = $_POST['email'];
	$objAccount->password = $_POST['password'];

	$cekEmail = $objAccount->ValidateEmail($_POST['email']);
    if($cekEmail){
		if($objAccount->email == $_POST['email'] && $objAccount->password == $_POST['password']){
			if (!isset($_SESSION)) {
				session_start();
			}		  
		
			$_SESSION["idaccount"]= $objAccount->id;
			$_SESSION["idpembeli"]= $objAccount->idpembeli;
			$_SESSION["role"]= $objAccount->role;
			$_SESSION["nama"]= $objAccount->nama;
			
			echo "<script> alert('Login sukses'); </script>";		
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
		}
		else{
			echo "<script> alert('Email dan password tidak match'); </script>";		
		}		
	}
	else{
		echo "<script> alert('Email tidak terdaftar'); </script>";		  
	}
	
  }
?>

