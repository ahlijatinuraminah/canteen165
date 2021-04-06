<?php 
include "inc.koneksi.php";
$id =0;
$nama = '';
$deskripsi = '';
$idcategory = 0;
$harga = '';
$sql = '';
$message ='';

if(isset($_POST['btnSubmit'])){	
    $nama = $_POST['nama'];	
	$deskripsi = $_POST['deskripsi'];	
	$idcategory = $_POST['idcategory'];	
	$harga = $_POST['harga'];		
	
	if(isset($_GET['id'])){
		$id =  $_GET['id'];
		$sql = "UPDATE tblmenu SET Nama ='$nama',
				Deskripsi = '$deskripsi',
				Harga ='$harga',
				IDCategory = '$idcategory'
				WHERE IDMenu = $id";
		$message ='Data berhasil diubah!';
	}
	else{	
		$sql = "INSERT INTO tblmenu(Nama, Deskripsi, Harga, IDCategory) 
				values ('$nama', '$deskripsi', '$harga', '$idcategory')";
		$message ='Data berhasil ditambahkan!';					
	}
			
	$result = mysql_query($sql) or die(mysql_error());		
			
	if($result){			
		echo "<script> alert('$message'); </script>";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=menulist_old">'; 				
	}
	else{
		echo "<script> alert('Proses gagal. Silakan ulangi'); </script>";	
	}
}
else if(isset($_GET['id'])){	
	$id =  $_GET['id'];
	$queryOne = "SELECT * FROM tblmenu WHERE IDMenu='$id'";
	$resultOne = mysql_query($queryOne) or die(mysql_error());
	
	if(mysql_num_rows($resultOne) == 1){
		$data = mysql_fetch_assoc($resultOne);
		$nama = $data['Nama'];				
		$deskripsi = $data['Deskripsi'];				
		$idcategory = $data['IDCategory'];	
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
	<td><select name="idcategory">
	<option></option>
	<?php
	
	$queryCat = mysql_query("SELECT * FROM tblcategory ORDER BY IDCategory ASC") 
		         or die(mysql_error());
		
		if(mysql_num_rows($queryCat) >= 0){
			while ($row = mysql_fetch_assoc($queryCat)) {
				if($row['IDCategory'] == $idcategory)					
					echo "<option selected='true' value='" . $row['IDCategory'] . "'>" . $row['Nama'] . "</option>";
				else		
					echo "<option value='" . $row['IDCategory'] . "'>" . $row['Nama'] . "</option>";
			}
		}	
	?>
	</select>
	</td>
	</tr>	
	<tr>
	<tr>
	<td>Nama</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>"></td>
	</tr>	
	<tr>
	<td>Deskripsi</td>
	<td>:</td>
	<td><textarea style="width:55%" name="deskripsi" class="form-control" rows="3" cols="19"><?php echo $deskripsi; ?></textarea></td>
	</tr>	
	<tr>
	<td>Harga</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga; ?>"></td>
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


