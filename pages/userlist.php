<?php
	//require("authorization_admin.php");
	if (empty($_GET['p'])) {
		header("HTTP/1.0 400 Bad Request", true, 400);
		exit('400: Bad Request');
	} 
?>

<div class="container">  
<div class="span11">			
  <h4 class="title"><span class="text"><strong>User List</strong></span></h4>
  <br>  
  
  <a class="btn btn-primary" href="index.php?p=user">Add User</a>   
  <br><br>
<table class="table">
	<tr>
	<th>No.</th>
	<th>Email</th>
	<th>Nama</th>
	<th>Alamat</th>
	<th>Tempat, Tanggal Lahir</th>
	<th>Handphone</th>
	<th>Jenis Kelamin</th>	
	<th>Foto</th>	
	<th>Action</th>
	</tr>	
	<?php
	
	require_once('./class/class.User.php'); 		
		$objUser = new User(); 		
		$arrayResult = $objUser->SelectAllUser();

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="4">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataUser) {
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$dataUser->email.'</td>';	
					echo '<td>'.$dataUser->nama.'</td>';
					echo '<td>'.$dataUser->alamat.'</td>';
					echo '<td>'.$dataUser->tempatlahir.', '. date("j F Y", strtotime($dataUser->tanggallahir)).'</td>';
					echo '<td>'.$dataUser->handphone.'</td>';
					echo '<td>'.$dataUser->jeniskelamin.'</td>';
					echo "<td><img src='upload/user/".$dataUser->foto."' width='50px' height='50px'/></td>";
					echo '<td><a class="btn btn-warning" href="index.php?p=user&id='.$dataUser->id.'">Edit</a> |  
							  <a class="btn btn-danger" href="index.php?p=deleteuser&id='.$dataUser->id.'" 
							  onclick="return confirm(\'apakah anda yakin untuk menghapus?\')">Delete</a></td>';	
					echo '</tr>';				
				
				$no++;	
			}
		}
	
	?>
</table>
<a class="btn btn-success" href="pages/report_memberlist.php">Download</a>   
</div>
</div>