<?php
	//require("authorization_admin.php");
	if (empty($_GET['p'])) {
		header("HTTP/1.0 400 Bad Request", true, 400);
		exit('400: Bad Request');
	} 
?>

<div class="container">  
<div class="span11">			
  <h4 class="title"><span class="text"><strong>Account List</strong></span></h4>
  <br>  
  
  <a class="btn btn-primary" href="index.php?p=account">Add Account</a>   
  <br><br>
<table class="table">
	<tr>
	<th>No.</th>
	<th>Nama</th>
	<th>Email</th>	
	<th>Role</th>	
	<th>Action</th>
	</tr>	
	<?php
	
	require_once('./class/class.Account.php'); 		
		$objAccount = new Account(); 		
		$arrayResult = $objAccount->SelectAllAccount();

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="4">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataAccount) {
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$dataAccount->nama.'</td>';
					echo '<td>'.$dataAccount->email.'</td>';	
					echo '<td>'.$dataAccount->role.'</td>';
					echo '<td><a class="btn btn-warning" href="index.php?p=account&id='.$dataAccount->id.'">Edit</a> |  
							  <a class="btn btn-danger" href="index.php?p=deleteaccount&id='.$dataAccount->id.'" 
							  onclick="return confirm(\'apakah anda yakin untuk menghapus?\')">Delete</a></td>';	
					echo '</tr>';				
				
				$no++;	
			}
		}
	
	?>
</table>
<a class="btn btn-success" href="pages/report_userlist.php">Download</a>   
</div>
</div>