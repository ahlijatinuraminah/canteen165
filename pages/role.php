<?php 
require_once('./class/class.Role.php'); 		

$objRole = new Role(); 

if(isset($_POST['btnSubmit'])){	
	$objRole->role = $_POST['role'];	
    	
	if(isset($_GET['id'])){		
		$objRole->id = $_GET['id'];
		$objRole->UpdateRole();
	}
	else{	
		$objRole->AddRole();
	}			
	
	if($objRole->hasil){
		echo "<script> alert('".$objRole->message."'); </script>";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=rolelist">'; 				
	}
	else{
		echo "<script> alert('Proses gagal. Silakan ulangi'); </script>";	
	}			
}
else if(isset($_GET['id'])){	
	$objRole->id = $_GET['id'];	
	$objRole->SelectOneRole();
}
?>
<div class="container">  
<div class="span7">			
  <h4 class="title"><span class="text"><strong>Role</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
	<tr>
	<td>role</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="role" name="role" value="<?php echo $objRole->role; ?>"></td>
	</tr>	
	
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
	    <a href="index.php?p=rolelist" class="btn btn-primary">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>


