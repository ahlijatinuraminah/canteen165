<?php 
require_once('./class/class.Category.php'); 
require_once('./class/class.Menu.php'); 
$objMenu = new Menu(); 

if(isset($_POST['btnSubmit'])){	

	$objMenu->nama = $_POST['nama'];	
    $objMenu->deskripsi = $_POST['deskripsi'];
    $objMenu->idcategory = $_POST['idcategory'];	
	$objMenu->harga = $_POST['harga'];		
	
	if(isset($_GET['id'])){
		$objMenu->id = $_GET['id'];
		$objMenu->UpdateMenu();
	}
	else{	
		$objMenu->AddMenu();				
	}
			
	if($objMenu->hasil){
		echo "<script> alert('".$objMenu->message."'); </script>";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=menulist">'; 				
	}
	else{
		echo "<script> alert('Proses gagal. Silakan ulangi'); </script>";	
	}		
}
else if(isset($_GET['id'])){	
	$objMenu->id = $_GET['id'];	
	$objMenu->SelectOneMenu();
}
?>
<div class="container">  
<div class="span7">			
  <h4 class="title"><span class="text"><strong>Menu</strong></span></h4>
    <form action="" method="post" enctype="multipart/form-data">
	<table class="table" border="0">
	<tr>
	<td>Kategori</td>
	<td>:</td>
	<td><select name="idcategory">
	<option></option>
	<?php

		
	$objCategory = new Category(); 
	$arrayResult = $objCategory->SelectAllCategory();

	foreach ($arrayResult as $dataCategory) {

		if($dataCategory->id == $objMenu->idcategory)					
			echo "<option selected='true' value='" . $dataCategory->id . "'>" . $dataCategory->nama . "</option>";
		else		
			echo "<option value='" .$dataCategory->id . "'>" . $dataCategory->nama. "</option>";
	}		
	?>
	</select>
	</td>
	</tr>	
	<tr>
	<tr>
	<td>Nama</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="nama" name="nama" value="<?php echo $objMenu->nama; ?>"></td>
	</tr>	
	<tr>
	<td>Deskripsi</td>
	<td>:</td>
	<td><textarea style="width:55%" name="deskripsi" class="form-control" rows="3" cols="19">
	<?php echo $objMenu->deskripsi; ?></textarea></td>
	</tr>	
	<tr>
	<td>Harga</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="harga" name="harga" value="<?php echo $objMenu->harga; ?>"></td>
	</tr>	
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
	    <a href="index.php?p=menulist" class="btn btn-primary">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>


