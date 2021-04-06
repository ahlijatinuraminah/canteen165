<div class="container">  
<div class="span11">					
						<h4 class="title"><span class="text"><strong>Order</strong> History</span></h4>
						<table class="table table-striped">
							<thead>
								<tr>									
									<th>No.</th>
									<th>ID Pesanan</th>
									<th>Tanggal Transaksi</th>
									<th>Nama User</th>
									<th>Nama Menu</th>
									<th>Harga Satuan</th>
									<th>Quantity</th>
									<th>Total Harga</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
	<?php
	
		$sql = "SELECT a.*, b.Nama as NamaUser, c.Nama as NamaMenu FROM tblpesanan a, tbluser b, tblmenu c where a.IDUser = b.IDUser and a.IDMenu = c.IDMenu ORDER BY IDPesanan ASC";
		$result = mysql_query($sql) or die(mysql_error()); //mengeksekusi query
	  
		while($data = mysql_fetch_assoc($result)){
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$data['IDPesanan'].'</td>';	
					echo '<td>'.$data['TanggalTransaksi'].'</td>';	
					echo '<td>'.$data['NamaUser'].'</td>';
					echo '<td>'.$data['NamaMenu'].'</td>';
					echo '<td>Rp '.number_format($data['Harga'],2,',','.').'</td>';
					echo '<td>'.$data['Quantity'].'</td>';					
					echo '<td>Rp '.number_format($data['TotalHarga'],2,',','.').'</td>';
					echo '<td>'.$data['Status'].'</td>';
					echo '<td><a class="btn btn-warning" href="index.php?p=pesanan&id='.$data['IDPesanan'].'">Edit</a>|
							  <a class="btn btn-danger"  href="index.php?p=deletepesanan&id='.$data['IDPesanan'].'" 
							  onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete</a> |
							  <a class="btn btn-success" href="index.php?p=report_historypesanan&id='.$data['IDPesanan'].'">Download</a>';	
					echo '</tr>';				
				
				$no++;	
			}
		
	
	?>
							
						</table>			
						<a class="btn btn-success" href="index.php?p=report_pesananlist">Download</a>   
					</div>
</div>