<?php 
include "inc.koneksi.php";
$id =0;
$nama = '';
$deskripsi = '';
$idcategory = 0;
$namakategori = 0;
$harga = '';
$foto = '';
$sql = '';
$message ='';

if(isset($_POST['btnSubmit'])){	
    $isErrorFile = false;
	$folder		= './upload/menu/';
		//type file yang bisa diupload
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
		$id =  $_GET['id'];		
		$isSuccessUpload = move_uploaded_file($_FILES['foto']['tmp_name'], $folder.$id.'.'.$extensi);				
		
		if($isSuccessUpload){			
			$sql = "UPDATE tblmenu SET 
					Foto ='$id.$extensi'
					WHERE IDMenu = $id";		
			$message = 'Upload berhasil!';
			
			$result = mysql_query($sql) or die(mysql_error());
			if($result){			
				echo "<script> alert('$message'); </script>";
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=menulist_old">'; 				
			}
			else
				echo "<script> alert('Proses update gagal. Silakan ulangi'); </script>";			
		}
		else
			echo "<script> alert('Proses upload gagal. Silakan ulangi'); </script>";			
	}		
}
else if(isset($_GET['id'])){	
	$id =  $_GET['id'];
	$queryOne = "SELECT a.*, b.nama as namakategori FROM tblmenu a, tblcategory b where a.IDCategory= b.IDCategory and IDMenu='$id'";
	$resultOne = mysql_query($queryOne) or die(mysql_error());
	
	if(mysql_num_rows($resultOne) == 1){
		$data = mysql_fetch_assoc($resultOne);
		$nama = $data['Nama'];				
		$deskripsi = $data['Deskripsi'];				
		$idcategory = $data['IDCategory'];	
		$namakategori = $data['namakategori'];	
		$harga = $data['Harga'];	
		$foto = $data['Foto'];	
	}	
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
	<td><?php echo $namakategori; ?></td>
	</tr>	
	<tr>
	<tr>
	<td>Nama</td>
	<td>:</td>
	<td><?php echo $nama; ?></td>
	</tr>	
	<tr>
	<td>Deskripsi</td>
	<td>:</td>
	<td><?php echo $deskripsi; ?></td>
	</tr>	
	<tr>
	<td>Harga</td>
	<td>:</td>
	<td><?php echo $harga; ?></td>
	</tr>	
	<tr>
	<td>Foto</td>
	<td>:</td>
	<td>
	<?php 
		if($foto !='')
			echo "<img src='upload/menu/".$foto."' width='100px' height='100px'/>"; 
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
	    <a href="index.php?p=menulist_old" class="btn btn-primary">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>


