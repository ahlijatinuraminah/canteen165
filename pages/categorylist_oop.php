<div class="container">  
<div class="span11">			
  <h4 class="title"><span class="text"><strong>Category List</strong></span></h4>
  <a class="btn btn-primary" href="index.php?p=category_oop">Add</a>
  <br>
  <br>
  <form method="POST">
	<table>	
	<tr>
	<td>Nama Category:</td>
	<td><input type="text" name="cari_nama"></td>
	</tr>
	<tr>
	<td>Deskripsi:</td>
	<td><input type="text" name="cari_deskripsi"></td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" class="btn btn-warning" name="btnCari" value="Cari">
	<input type="submit" class="btn btn-danger" name="btnReset" value="Reset">
	</td>
	</tr>
	</table>
  </form>
<table class="table">
	<tr>
	<th>No.</th>
	<th>ID Kategori</th>
	<th>Nama Kategori</th>
	<th>Deskripsi</th>
	<th>Action</th>
	</tr>	
	<?php
		require_once('class.Category.php'); 
		$cari_id =0;
		$cari_nama = '';
		$objCategory = new Category(); 
		

		if(isset($_POST['btnCari'])){				
			$cari_nama = $_POST['cari_nama'];				
			$cari_deskripsi = $_POST['cari_deskripsi'];	
		}
		if(isset($_POST['btnReset'])){				
			$cari_nama = '';			
			$cari_deskripsi = '';				
		}
		$arrayResult = $objCategory->SelectAllCategory($cari_nama, $cari_deskripsi);

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
					echo '<td><a class="btn btn-warning"  href="index.php?p=category_oop&id='.$dataCategory->id.'">Edit</a> |
   					          <a class="btn btn-danger"  href="index.php?p=deletecategory_oop&id='.$dataCategory->id.'" 
							  onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete</a></td>';	
				echo '</tr>';
				
				$no++;	
			}
		}
		?>
</table>
</div>
</div>

