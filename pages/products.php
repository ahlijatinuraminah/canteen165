			<section class="header_text sub">
			
			<?php
			
			if(isset($_GET['id'])){	
				$id =  $_GET['id'];
				include('inc.koneksi.php');		
				$query = mysql_query("SELECT a.*, b.nama as nama_kategori FROM tblmenu a, tblcategory b where a.idcategory=b.idcategory and a.idcategory='$id' order by idmenu desc limit 8") 
						or die(mysql_error());
				if(mysql_num_rows($query) >= 0){
					$firstrow = mysql_fetch_assoc($query);
					mysql_data_seek($query, 0);																
			?>
			<h4><span>Kategori <?php echo $firstrow['nama_kategori']; ?></span></h4>
			</section>
			<section class="main-content">				
				<div class="row">						
					<div class="span12">								
						<ul class="thumbnails listing-products">						
						<?php
								$no = 1;	
								while($data = mysql_fetch_assoc($query)){
									echo '<li class="span3">';
									echo '<div class="product-box">';
									echo '<span class="sale_tag"></span>
											<p><a href="index.php?p=productdetail&id='.$data['IDMenu'].'"><img height="150" width="200" src="upload/menu/'.$data['Foto'].'" alt="" /></a></p>
											<a href="index.php?p=productdetail&id='.$data['IDMenu'].'" class="title">'.$data['Nama'].'</a><br/>
											<a href="index.php?p=products" class="category">'.$data['nama_kategori'].'</a>
											<p class="price">Rp '.number_format($data['Harga'],2,',','.').'</p>
											</div>';
									echo '</li>';
									$no++;	
								}
							}
						}								
						?>
						</ul>								
						<hr>
						<div class="pagination pagination-small pagination-centered">
							<ul>
								<li><a href="#">Prev</a></li>
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">Next</a></li>
							</ul>
						</div>
					</div>					
				</div>
			</section>
			