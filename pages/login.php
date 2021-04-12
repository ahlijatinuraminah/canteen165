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

<?php // jika submit button diklik
  if(isset($_POST['btnLogin'])){
	require_once('./class/class.User.php'); 		
	$objUser = new User(); 
	
    $objUser->email = $_POST['email'];
	$objUser->password = $_POST['password'];

	$cekEmail = $objUser->ValidateEmail($_POST['email']);
    if($cekEmail){
		if($objUser->email == $_POST['email'] && $objUser->password == $_POST['password']){
			if (!isset($_SESSION)) {
				session_start();
			}		  
		
			$_SESSION["id"]= $objUser->id;
			$_SESSION["role"]= $objUser->role;
			$_SESSION["nama"]= $objUser->nama;
			
		//	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
		}
		else{
			//echo "<script> alert('Email dan password tidak match'); </script>";		
		}		
	}
	else{
		//echo "<script> alert('Email tidak terdaftar'); </script>";		  
	}
	
	echo 'role:'. $objUser->role;
  }
?>

