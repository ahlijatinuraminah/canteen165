<?php 
require_once('./class/class.Account.php'); 		
require_once('./class/class.Role.php'); 
$objAccount = new Account(); 
		
$objRole = new Role(); 
$roleList = $objRole->SelectAllRole();

if(isset($_POST['btnSubmit'])){	
	
    $objAccount->nama = $_POST['nama'];
    $objAccount->email = $_POST['email'];
	$objAccount->password ='123456';
	$objAccount->idrole = $_POST['idrole'];
	
	if(isset($_GET['id'])){
		$objAccount->id = $_GET['id'];
		$objAccount->UpdateAccount();
	}
	else{	
		$cekEmail = $objAccount->ValidateEmail($_POST['email']);
	
		if($cekEmail)	
			echo "<script> alert('Email sudah terdaftar'); </script>";			
		else
			$objAccount->AddAccount();				
	}	
	
	if($objAccount->hasil){
		echo "<script> alert('".$objAccount->message."'); </script>";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=accountlist">'; 				
	}
	else{
		echo "<script> alert('Proses gagal. Silakan ulangi'); </script>";	
	}		
				
}
else if(isset($_GET['id'])){	
	$objAccount->id = $_GET['id'];	
	$objAccount->SelectOneAccount();
}
?>
<div class="container">  
<div class="span7">			
  <h4 class="title"><span class="text"><strong>Account</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
	<tr>
	<td>Name</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="nama" name="nama" value="<?php echo $objAccount->nama; ?>"></td>
	</tr>
	<tr>
	<td>E-mail</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="email" maxlength="50" name="email" value="<?php echo $objAccount->email; ?>"></td>
	</tr>
	<tr>
	<td>Role</td>
	<td>:</td>
	<td>
	<select name="idrole">
	<option value="">--Please select role--</option>
		<?php		
			foreach ($roleList as $role){ 								
				if($objAccount->idrole == $role->id)				
					echo '<option selected="true" value='.$role->id.'>'.$role->role.'</option>';
				else
					echo '<option value='.$role->id.'>'.$role->role.'</option>';
			} 
		?>	
		</select>
	</select>
	</td>
	</tr>	
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
	    <a href="index.php?p=accountlist" class="btn btn-primary">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>


