<?php
	//require("authorization_admin.php");
	if (empty($_GET['p'])) {
		header("HTTP/1.0 400 Bad Request", true, 400);
		exit('400: Bad Request');
	} 
?>

<div class="container">  
<div class="span11">			
  <h4 class="title"><span class="text"><strong>Pembeli List</strong></span></h4>
  <br>  
  
  
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
	
	require_once('./class/class.Pembeli.php'); 		
		$objPembeli = new Pembeli(); 		
		$arrayResult = $objPembeli->SelectAllPembeli();

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="4">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataPembeli) {
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$dataPembeli->email.'</td>';	
					echo '<td>'.$dataPembeli->nama.'</td>';
					echo '<td>'.$dataPembeli->alamat.'</td>';
					echo '<td>'.$dataPembeli->tempatlahir.', '. date("j F Y", strtotime($dataPembeli->tanggallahir)).'</td>';
					echo '<td>'.$dataPembeli->handphone.'</td>';
					echo '<td>'.$dataPembeli->jeniskelamin.'</td>';
					echo "<td><img src='upload/Pembeli/".$dataPembeli->foto."' width='50px' height='50px'/></td>";
					echo '<td><a class="btn btn-warning" href="index.php?p=pembeli&id='.$dataPembeli->id.'">Edit</a>';  
							 
					echo '</tr>';				
				
				$no++;	
			}
		}
	
	?>
</table>

</div>
</div>