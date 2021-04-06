			<?php
			if(isset($_GET['id'])){	
				$id =  $_GET['id'];
				include('inc.koneksi.php');		
				$query = mysql_query("SELECT a.*, b.nama as nama_kategori FROM tblmenu a, tblcategory b where a.idcategory=b.idcategory and IDMenu='$id'") 
									or die(mysql_error());
				if(mysql_num_rows($query) >= 0){
				
					$data = mysql_fetch_assoc($query);
					$nama = $data['Nama'];		
					$nama_kategori = $data['nama_kategori'];	
					$deskripsi = $data['Deskripsi'];	
					$harga = 'Rp '.number_format($data['Harga'],2,',','.');	
					$foto =  $data['Foto'];	
				}
			}
			?>
			
			<section class="header_text sub">
			
				<h4><span><?php echo $nama; ?></span></h4>
			</section>
			<section class="main-content">				
				<div class="row">						
					<div class="span12">
						<div class="row">
							<div class="span4">
								<a href="<?php echo "upload/menu/".$data['Foto']; ?>" class="thumbnail" data-fancybox-group="group1" title="Description 1"><?php echo '<img height="150" width="250" src="upload/menu/'.$data['Foto'].'" alt="" />'; ?></a>												
								
							</div>
							<div class="span3">
								<address>
								
									<strong>ID Menu:</strong> <span><?php echo $id; ?></span><br>
									<strong>Kategori:</strong> <span><?php echo $nama_kategori; ?></span><br>									
								</address>									
								<h4><strong>Price: <?php echo $harga; ?></strong></h4>
								<form action="index.php?p=pesan" method="post" class="form-inline">									
									<input type="hidden" name="idmenu" value="<?php echo $id; ?>">									
									<label>Qty:</label>									
									<input type="text" class="span1" required name="qty" placeholder="1">
									<input name="btnPesan" class="btn btn-inverse" type="submit" value="Pesan">
								</form>
							</div>							
							<div class="span4">
								<h4>
									<span class="text"><strong>Description</strong></span>
								</h4>
									<div class="tab-content">
										<div class="tab-pane active" id="home"><?php echo $deskripsi; ?></div>									
									</div>															
							</div>												
						</div>						
					</div>		
					
				</div>
			</section>			
	