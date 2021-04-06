<html>
<body>
<div class="container">  
<div class="span11">			
  <h4 class="title"><span class="text"><strong>Category List</strong></span></h4>
  <a class="btn btn-primary" href="index.php?p=category">Add</a>
  <br>
  <br>  
<table class="table">
	<tr>
	<th>ID Kategori</th>
	<th>Nama Kategori</th>
	<th>Deskripsi</th>
	<th>Action</th>
	</tr>	
	<?php
	  
	  include "inc.koneksi.php";
	  $sql = "SELECT * FROM tblcategory";  //membuat query
	  $result = mysql_query($sql) or die(mysql_error()); //mengeksekusi query
	  
	  while($data = mysql_fetch_assoc($result)){
				echo '<tr>';
					echo '<td>'.$data['IDCategory'].'</td>';	
					echo '<td>'.$data['Nama'].'</td>';
					echo '<td>'.$data['Deskripsi'].'</td>';
					echo '<td><a class="btn btn-success" href="index.php?p=category&id='.$data['IDCategory'].'">Edit</a> | 
					          <a class="btn btn-danger"href="index.php?p=deletecategory&id='.$data['IDCategory'].'" 
							     onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete</a>
					      </td>';	
				echo '</tr>';
				
	}
	
	?>
</table>
</div>
</div>