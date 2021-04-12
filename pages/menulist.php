<div class="container">  
<div class="span11">			
  <h4 class="title"><span class="text"><strong>Menu List</strong></span></h4>
  <a class="btn btn-primary" href="index.php?p=menu">Add</a>
  <br>
  <br>  
<table class="table">
	<tr>
	<th>No.</th>
	<th>Kategori Menu</th>
	<th>Nama Menu</th>	
	<th style="width:250px">Deskripsi</th>
	<th>Harga</th>
	<th>Foto</th>
	<th>Action</th>
	</tr>	
	<?php
	require_once('./class/class.Menu.php'); 
		$cari_idcategory =0;
		$cari_deskripsi = '';
		$objMenu = new Menu(); 		

		if(isset($_POST['btnCari'])){				
			$cari_idcategory = $_POST['cari_idcategory'];				
			$cari_deskripsi = $_POST['cari_deskripsi'];	
		}
		if(isset($_POST['btnReset'])){				
			$cari_idcategory = '';			
			$cari_deskripsi = '';				
		}
		$arrayResult = $objMenu->SelectAllMenu($cari_idcategory, $cari_deskripsi);

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="4">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataMenu) {
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$dataMenu->namacategory.'</td>';
					echo '<td>'.$dataMenu->nama.'</td>';
					echo '<td>'.$dataMenu->deskripsi.'</td>';
					echo '<td>Rp '.number_format($dataMenu->harga,2,',','.').'</td>';
					echo "<td><img src='upload/menu/".$dataMenu->foto."' width='100px' height='100px'/></td>";
					echo '<td><a class="btn btn-warning"  href="index.php?p=menu&id='.$dataMenu->id.'">Edit</a> |
   					          <a class="btn btn-danger"  href="index.php?p=deletemenu&id='.$dataMenu->id.'" 
							  onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete</a> |
							  <a class="btn btn-warning"  href="index.php?p=menufoto&id='.$dataMenu->id.'">Upload Foto</a> </td>';	
				echo '</tr>';
				
				$no++;	
			}
		}
		
		?>
</table>
</div>
</div>