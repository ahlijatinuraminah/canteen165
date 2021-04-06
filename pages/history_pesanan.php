<div class="container">  
<div class="span11">					
						<h4 class="title"><span class="text"><strong>Order</strong> History</span></h4>
						<table class="table table-striped">
							<thead>
								<tr>									
									<th>No.</th>
									<th>ID Pesanan</th>
									<th>Tanggal Transaksi</th>
									<th>Nama Menu</th>
									<th>Harga Satuan</th>
									<th>Quantity</th>
									<th>Total Harga</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
	<?php
	
		require_once('class.Pesanan.php'); 
		$objPesanan = new Pesanan(); 		
		//$objPesanan->iduser = $_SESSION['IDUser'];
		$arrayResult = $objPesanan->SelectHistoryPesanan();

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="4">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataPesanan) {
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$dataPesanan->id.'</td>';	
					echo '<td>'.$dataPesanan->tanggaltransaksi.'</td>';	
					echo '<td>'.$dataPesanan->namamenu.'</td>';
					echo '<td>Rp '.number_format($dataPesanan->harga,2,',','.').'</td>';
					echo '<td>'.$dataPesanan->quantity.'</td>';					
					echo '<td>Rp '.number_format($dataPesanan->harga,2,',','.').'</td>';
					echo '<td>'.$dataPesanan->status.'</td>';
					echo '<td><a class="btn btn-warning" href="index.php?p=report_historypesanan&id='.$dataPesanan->id.'">Download</a>';	
					echo '</tr>';				
				
				$no++;	
			}
		}
	
	?>
							
						</table>			
					</div>
</div>