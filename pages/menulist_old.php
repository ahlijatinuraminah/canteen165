<div class="container">  
<div class="span11">			
  <h4 class="title"><span class="text"><strong>Menu List</strong></span></h4>
  <a class="btn btn-primary" href="index.php?p=menu">Add</a>
  <br>
  <br>
<table class="table">
	<tr>
	<th>No.</th>
	<th>ID Menu</th>
	<th>Kategori Menu</th>
	<th>Nama Menu</th>	
	<th style="width:250px">Deskripsi</th>
	<th>Harga</th>
	<th>Foto</th>
	<th>Action</th>
	</tr>	
	<?php
		include('inc.koneksi.php');
		
		$query = mysql_query("SELECT a.*, b.nama as nama_kategori FROM tblmenu a, tblcategory b where a.IDCategory= b.IDCategory ORDER BY IDMenu ASC") 
		         or die(mysql_error());
		
		if(mysql_num_rows($query) == 0){
			echo '<tr><td colspan="8">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			while($data = mysql_fetch_assoc($query)){
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$data['IDMenu'].'</td>';	
					//echo '<td>'.$data['IDCategory'].'</td>';
					echo '<td>'.$data['nama_kategori'].'</td>';
					echo '<td>'.$data['Nama'].'</td>';
					echo '<td>'.$data['Deskripsi'].'</td>';
					echo '<td>Rp '.number_format($data['Harga'],2,',','.').'</td>';
					//echo '<td>'.$data['Foto'].'</td>';
					echo "<td><img src='upload/menu/".$data['Foto']."' width='100px' height='100px'/></td>";
					echo '<td><a class="btn btn-warning"  href="index.php?p=menu&id='.$data['IDMenu'].'">Edit</a> |
   					          <a class="btn btn-danger"  href="index.php?p=deletemenu&id='.$data['IDMenu'].'" 
							  onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete</a> |
							  <a class="btn btn-warning"  href="index.php?p=menufoto&id='.$data['IDMenu'].'">Upload Foto</a> </td>';	
				echo '</tr>';
				
				$no++;	
			}
		}
		?>
</table>
</div>
</div>