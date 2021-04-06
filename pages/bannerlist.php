<div class="container">  
<div class="span11">			
  <h4 class="title"><span class="text"><strong>Banner List</strong></span></h4>
  <a class="btn btn-primary" href="index.php?p=banner">Add</a>
  <br>
  <br>
<table class="table">
	<tr>
	<th>No.</th>
	<th>ID Banner</th>
	<th>Nama</th>	
	<th>Deskripsi 1</th>
	<th>Deskripsi 2</th>
	<th>Foto</th>
	<th>Action</th>
	</tr>	
	<?php
		include('inc.koneksi.php');
		
		$query = mysql_query("SELECT * FROM tblbanner ORDER BY IDBanner ASC") 
		         or die(mysql_error());
		
		if(mysql_num_rows($query) == 0){
			echo '<tr><td colspan="8">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			while($data = mysql_fetch_assoc($query)){
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$data['IDBanner'].'</td>';	
					echo '<td>'.$data['Nama'].'</td>';
					echo '<td>'.$data['Deskripsi1'].'</td>';
					echo '<td>'.$data['Deskripsi2'].'</td>';
					echo "<td><img src='upload/banner/".$data['Foto']."' width='100px' height='100px'/></td>";
					echo '<td><a class="btn btn-warning"  href="index.php?p=banner&id='.$data['IDBanner'].'">Edit</a> |
   					          <a class="btn btn-danger"  href="index.php?p=deletebanner&id='.$data['IDBanner'].'" 
							  onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete</a></td>';	
				echo '</tr>';
				
				$no++;	
			}
		}
		?>
</table>
</div>
</div>