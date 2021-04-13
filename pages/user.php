<?php 
require_once('./class/class.User.php'); 		

$objUser = new User(); 

if(isset($_POST['btnSubmit'])){	
	
    $objUser->nama = $_POST['nama'];
    $objUser->email = $_POST['email'];
	$objUser->password ='123456';
	$objUser->alamat = $_POST['alamat'];
	$objUser->tempatlahir = $_POST['tempatlahir'];	
	$objUser->tanggallahir = $_POST['tanggallahir'];
	$objUser->handphone = $_POST['handphone'];
	$objUser->jeniskelamin =$_POST['jeniskelamin'];
	
	if(isset($_GET['id'])){
		$objUser->id = $_GET['id'];
		$objUser->UpdateUser();
	}
	else{	
		$cekEmail = $objUser->ValidateEmail($_POST['email']);
	
		if($cekEmail)	
			echo "<script> alert('Email sudah terdaftar'); </script>";			
		else
			$objUser->AddUser();				
	}	
	
	if($objUser->hasil){
		echo "<script> alert('".$objUser->message."'); </script>";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=userlist">'; 				
	}
	else{
		echo "<script> alert('Proses gagal. Silakan ulangi'); </script>";	
	}		
				
}
else if(isset($_GET['id'])){	
	$objUser->id = $_GET['id'];	
	$objUser->SelectOneUser();
}
?>
<div class="container">  
<div class="span7">			
  <h4 class="title"><span class="text"><strong>USER</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
	<tr>
	<td>Name</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="nama" name="nama" value="<?php echo $objUser->nama; ?>"></td>
	</tr>
	 <tr>
	<td>E-mail</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="email" maxlength="50" name="email" value="<?php echo $objUser->email; ?>"></td>
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
	<td>
	<input type="date" class="form-control" id="tanggallahir" name="tanggallahir" value="<?php echo $objUser->tanggallahir; ?>">	
	</td>
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
	<td><input type="radio" name="jenisKelamin" value="laki-laki" <?php if($objUser->jeniskelamin == 'laki-laki') echo 'checked'; ?>>Laki-Laki</input>
		<input type="radio" name="jenisKelamin" value="perempuan" <?php if($objUser->jeniskelamin == 'perempuan') echo 'checked'; ?>>Perempuan</input>
	</td>
	</tr>		
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
	    <a href="index.php?p=userlist" class="btn btn-primary">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>


