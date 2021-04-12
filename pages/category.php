<?php 
require_once('./class/class.Category.php'); 		

$objCategory = new Category(); 

if(isset($_POST['btnSubmit'])){	
	$objCategory->nama = $_POST['nama'];	
    $objCategory->deskripsi = $_POST['deskripsi'];
	
	if(isset($_GET['id'])){		
		$objCategory->id = $_GET['id'];
		$objCategory->UpdateCategory();
	}
	else{	
		$objCategory->AddCategory();
	}			
	
	if($objCategory->hasil){
		echo "<script> alert('".$objCategory->message."'); </script>";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=categorylist">'; 				
	}
	else{
		echo "<script> alert('Proses gagal. Silakan ulangi'); </script>";	
	}			
}
else if(isset($_GET['id'])){	
	$objCategory->id = $_GET['id'];	
	$objCategory->SelectOneCategory();
}
?>
<div class="container">  
<div class="span7">			
  <h4 class="title"><span class="text"><strong>Category</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
	<tr>
	<td>Nama</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="nama" name="nama" value="<?php echo $objCategory->nama; ?>"></td>
	</tr>	
	<tr>
	<td>Deskripsi</td>
	<td>:</td>
	<td>
	<textarea style="width:55%" name="deskripsi" rows="3" cols="19"><?php echo $objCategory->deskripsi; ?></textarea></td>
	</tr>	
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
	    <a href="index.php?p=categorylist" class="btn btn-primary">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>


