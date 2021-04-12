<?php 

require_once('./class/class.Menu.php'); 
$objMenu = new Menu(); 

if(isset($_POST['btnSubmit'])){	
	$message ='';
    $isErrorFile = false;
	$folder		= './upload/menu/';
	$file_type	= array('jpg','jpeg','png','gif','bmp');
	$max_size	= 1000000; // 1MB	
	$file_name	= $_FILES['foto']['name'];
	$file_size	= $_FILES['foto']['size'];
	//cari extensi file dengan menggunakan fungsi explode
	$explode	= explode('.',$file_name);
	$extensi	= $explode[count($explode)-1];
	//check apakah type file sudah sesuai
	if(!in_array($extensi,$file_type)){
		$isErrorFile   = true;
		$message .= 'Type file yang anda upload tidak sesuai';
	}
	if($file_size > $max_size){
		$isErrorFile   = true;
		$message .= 'Ukuran file melebihi batas maximum';
	}

    if($isErrorFile){
		echo "<script> alert('$message'); </script>";
	}		
	else{		
		$objMenu->id =  $_GET['id'];		
		$isSuccessUpload = move_uploaded_file($_FILES['foto']['tmp_name'], $folder . $objMenu->id.'.'.$extensi);				
		
		if($isSuccessUpload){	
			$objMenu->foto = $objMenu->id.'.'.$extensi;

			$objMenu->UpdateFotoMenu();
			if($objMenu->hasil){			
				echo "<script> alert('".$objMenu->message."'); </script>";
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=menulist">'; 				
			}
			else
				echo "<script> alert('Proses update gagal. Silakan ulangi'); </script>";			
		}
		else
			echo "<script> alert('Proses upload gagal. Silakan ulangi'); </script>";			
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
	<td><?php echo $objMenu->namacategory; ?></td>
	</tr>	
	<tr>
	<tr>
	<td>Nama</td>
	<td>:</td>
	<td><?php echo $objMenu->nama; ?></td>
	</tr>	
	<tr>
	<td>Deskripsi</td>
	<td>:</td>
	<td><?php echo $objMenu->deskripsi; ?></td>
	</tr>	
	<tr>
	<td>Harga</td>
	<td>:</td>
	<td><?php echo $objMenu->harga; ?></td>
	</tr>	
	<tr>
	<td>Foto</td>
	<td>:</td>
	<td>
	<?php 
		if($objMenu->foto !='')
			echo "<img src='upload/menu/".$objMenu->foto."' width='100px' height='100px'/>"; 
	?>
	</td>
	</tr>	
	<tr>
	<td>Upload Foto</td>
	<td>:</td>
	<td><input type="file" class="form-control" id="foto" name="foto" required>	
	</td>
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


