<div class="container">  
<div class="span6">			
  <h4 class="title"><span class="text"><strong>Role List</strong></span></h4>
  <a class="btn btn-primary" href="index.php?p=Role">Add</a>
  <br>
  <br>  
<table class="table">
	<tr>
	<th>No.</th>
	<th>Nama Role</th>
	<th>Action</th>
	</tr>	
	<?php
		require_once('./class/class.Role.php'); 		
		$objRole = new Role(); 
		$arrayResult = $objRole->SelectAllRole();

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="4">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataRole) {
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$dataRole->role.'</td>';
					echo '<td><a class="btn btn-warning"  href="index.php?p=role&id='.$dataRole->id.'">Edit</a> </td>';	
				echo '</tr>';
				
				$no++;	
			}
		}
		?>
</table>
</div>
</div>

