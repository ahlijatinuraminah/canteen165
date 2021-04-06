<div class="container">  
<div class="span7">			
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
	<input type="checkbox" name="showpass">Show Password
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
<script>
getE
</script>
<?php // jika submit button diklik
  if(isset($_POST['btnLogin'])){
	include "inc.koneksi.php";
	
    $email = $_POST['email'];
	$password = $_POST['password'];
	$sqlCek = "SELECT * FROM tbluser WHERE email='$email'";
    
	$cekEmail = mysql_query($sqlCek) or die(mysql_error());
	if(mysql_num_rows($cekEmail) != 0){
		$data = mysql_fetch_assoc($cekEmail);		
		
		if($email == $data['Email'] && $password == $data['Password']){
			if (!isset($_SESSION)) {
				session_start();
			}		  
		
			$_SESSION["IDUser"]= $data['IDUser'];
			$_SESSION["Role"]= $data['Role'];
			$_SESSION["Nama"]= $data['Nama'];
			
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

