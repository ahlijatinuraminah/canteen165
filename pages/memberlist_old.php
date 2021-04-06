<?php
	//require("authorization_admin.php");
	if (empty($_GET['p'])) {
		header("HTTP/1.0 400 Bad Request", true, 400);
		exit('400: Bad Request');
	} 
?>

<div class="container">  
<div class="span11">			
  <h4 class="title"><span class="text"><strong>Member List</strong></span></h4>
  <br>  
  
  <a class="btn btn-primary" href="index.php?p=member">Add Member</a>   
  <br><br>
<table class="table">
	<tr>
	<th>No.</th>
	<th>Email</th>
	<th>Password</th>
	<th>Nama</th>
	<th>Alamat</th>
	<th>Tempat, Tanggal Lahir</th>
	<th>Handphone</th>
	<th>JenisKelamin</th>	
	<th>Action</th>
	</tr>	
	<?php
	
	include('inc.koneksi.php');		
	$query = mysql_query("SELECT * FROM tbluser ORDER BY IDUser ASC")  or die(mysql_error());		
	if(mysql_num_rows($query) == 0){
		echo '<tr><td colspan="7">Tidak ada data!</td></tr>';			
	}else{	
		$no = 1;	
		while($data = mysql_fetch_assoc($query)){			
			echo '<tr>';
			echo '<td>'.$no.'</td>';						
			echo '<td>'.$data['Email'].'</td>';
			echo '<td>'.$data['Password'].'</td>';
			echo '<td>'.$data['Nama'].'</td>';
			echo '<td>'.$data['Alamat'].'</td>';
			echo '<td>'.$data['TempatLahir'].', '. date("j F Y", strtotime($data['TanggalLahir'])).'</td>';
			echo '<td>'.$data['Handphone'].'</td>';
			echo '<td>'.$data['JenisKelamin'].'</td>';
			echo '<td><a class="btn btn-warning" href="index.php?p=member&id='.$data['IDUser'].'">Edit</a> |  
			          <a class="btn btn-danger" href="index.php?p=deletemember&id='.$data['IDUser'].'" 
					  onclick="return confirm(\'apakah anda yakin untuk menghapus?\')">Delete</a>
					  <a class="btn btn-success" href="index.php?p=report_member&id='.$data['IDUser'].'">Download</a>
					  </td>';	
			echo '</tr>';				
			$no++;	
			}
	}
	?>
</table>
<a class="btn btn-success" href="pages/report_memberlist.php">Download</a>   
</div>
</div>