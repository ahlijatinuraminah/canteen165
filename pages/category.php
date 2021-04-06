<?php 
include "inc.koneksi.php";
$id =0;
$nama = '';
$deskripsi = '';

if(isset($_POST['btnSubmit'])){	
    $nama = $_POST['nama'];	
	$deskripsi = $_POST['deskripsi'];	
	$sql = '';
	$message ='';
	
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		//query update
		$sql = "UPDATE tblcategory SET Nama ='$nama',
		        Deskripsi = '$deskripsi'
				WHERE IDCategory = $id";
		$message ='Data berhasil diubah!';
	}else{
		//query insert
		$sql = "INSERT INTO tblcategory(Nama, Deskripsi) 
				values ('$nama', '$deskripsi')";
		$message ='Data berhasil ditambahkan!';	
	}	
				
	$result = mysql_query($sql) or die(mysql_error());
	if($result){
		echo "<script> alert('$message'); </script>";
		echo "<script>window.location = 'categorylist.php' </script>";
	}
	else{
		echo "<script> alert('Proses gagal. Silakan ulangi'); </script>";	
	}			
}else if(isset($_GET['id'])){  // cek apakah ada query string 'id'
	$id = $_GET['id'];
	
	$sql1 = "SELECT * FROM tblcategory where IDCategory=".$id;
	$result1 = mysql_query($sql1) or die(mysql_error());
	
	if(mysql_num_rows($result1) == 1){
		$data1 = mysql_fetch_assoc($result1);					
		$nama = $data1['Nama'];				
		$deskripsi = $data1['Deskripsi'];				
	}
}
?>
<div class="container">  
<div class="span7">			
  <h4 class="title"><span class="text"><strong>Category</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
	<tr>
	<td>ID Category</td>
	<td>:</td>
	<td><input type="text" disabled name="idcategory" value="<?php echo $id; ?>"></td>
	</tr>	
	<tr>
	<td>Nama</td>
	<td>:</td>
	<td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
	</tr>	
	<tr>
	<td>Deskripsi</td>
	<td>:</td>
	<td>
	<textarea style="width:55%" name="deskripsi" rows="3" cols="19"><?php echo $deskripsi; ?></textarea></td>
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


