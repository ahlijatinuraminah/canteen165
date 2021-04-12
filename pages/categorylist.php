<div class="container">  
<div class="span11">			
  <h4 class="title"><span class="text"><strong>Category List</strong></span></h4>
  <a class="btn btn-primary" href="index.php?p=category">Add</a>
  <br>
  <br>  
<table class="table">
	<tr>
	<th>No.</th>
	<th>ID Kategori</th>
	<th>Nama Kategori</th>
	<th>Deskripsi</th>
	<th>Action</th>
	</tr>	
	<?php
		require_once('./class/class.Category.php'); 		
		$objCategory = new Category(); 
		$arrayResult = $objCategory->SelectAllCategory();

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="4">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataCategory) {
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$dataCategory->id.'</td>';	
					echo '<td>'.$dataCategory->nama.'</td>';
					echo '<td>'.$dataCategory->deskripsi.'</td>';
					echo '<td><a class="btn btn-warning"  href="index.php?p=category&id='.$dataCategory->id.'">Edit</a> |
   					          <a class="btn btn-danger"  href="index.php?p=deletecategory&id='.$dataCategory->id.'" 
							  onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete</a></td>';	
				echo '</tr>';
				
				$no++;	
			}
		}
		?>
</table>
</div>
</div>

