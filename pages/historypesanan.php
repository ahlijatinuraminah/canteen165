<div class="container">  
<div class="span11">					
	<h4 class="title"><span class="text"><strong>Order</strong> History</span></h4>
	<table class="table table-striped">
		<thead>
		<tr>									
			<th>No.</th>
			<th>ID Pesanan</th>
			<th>Tanggal Transaksi</th>						
			<th>Menu | Quantity | Harga</th>
			<th>Total Harga</th>
			<th>Status</th>
			
		</tr>
		</thead>
	<?php
	
		require_once('./class/class.Pesanan.php'); 
		require_once('./class/class.DetailPesanan.php'); 
		$objPesanan = new Pesanan(); 		
		$objPesanan->idpembeli = $_SESSION['idpembeli'];
		$arrayResult = $objPesanan->SelectHistoryPesanan();

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="4">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataPesanan) {
				$objDetailPesanan = new DetailPesanan(); 	
				$objDetailPesanan->idpesanan = $dataPesanan->id;
				$arrayDetailPesanan = $objDetailPesanan->SelectAllDetailPesanan();

				echo '<tr>';
				echo '<td>'.$no.'</td>';	
				echo '<td>'.$dataPesanan->id.'</td>';	
				echo '<td>'.$dataPesanan->tanggaltransaksi.'</td>';	
				echo '<td>';
				echo '<ol>
				';
					foreach ($arrayDetailPesanan as $dataDetailPesanan) {
						echo '<li>'.$dataDetailPesanan->namamenu.'|&nbsp'.$dataDetailPesanan->quantity.'|&nbsp'.$dataDetailPesanan->subtotal.'</li>';
					}

				echo '</ol>';
				echo '</td>';
				echo '<td>Rp '.number_format($dataPesanan->totalharga,2,',','.').'</td>';
				echo '<td>'.$dataPesanan->status.'</td>';
				echo '</tr>';				
				
				$no++;	
			}
		}	
	?>
							
	</table>			
	
	</div>
</div>