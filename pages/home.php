
			<section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
					<?php
						include('inc.koneksi.php');		
						$query = mysql_query("SELECT * from tblbanner order by idBanner desc limit 3") 
													or die(mysql_error());
							if(mysql_num_rows($query) >= 0){
								$no = 1;	
								while($data = mysql_fetch_assoc($query)){
									echo '<li>';
									echo '<img src="upload/banner/'.$data['Foto'].'" alt="" />
											<div class="intro">
											<h1>'.$data['Nama'].'</h1>
											<p><span>'.$data['Deskripsi1'].'</span></p>
											<p><span>'.$data['Deskripsi2'].'</span></p>
											</div>';
									echo '</li>';
									$no++;	
								}
							}
					?>	
						
					</ul>
				</div>			
			</section>
			<section class="header_text">
				We stand for top quality templates. Our genuine developers always optimized bootstrap commercial templates. 
				<br/>Don't miss to use our cheap abd best bootstrap templates.
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line">New <strong>Products</strong></span></span></span>
									
								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">												
											<?php
											$query = mysql_query("SELECT a.*, b.nama as nama_kategori FROM tblmenu a, tblcategory b where a.idcategory=b.idcategory order by idmenu desc limit 4") 
													or die(mysql_error());
											if(mysql_num_rows($query) >= 0){
												$no = 1;	
												while($data = mysql_fetch_assoc($query)){
													echo '<li class="span3">';
													echo '<div class="product-box">';
													echo '<span class="sale_tag"></span>
														<p><a href="index.php?p=productdetail&id='.$data['IDMenu'].'"><img height="150" width="200" src="upload/menu/'.$data['Foto'].'" alt="" /></a></p>
														<a href="index.php?p=productdetail&id='.$data['IDMenu'].'" class="title">'.$data['Nama'].'</a><br/>
														<a href="index.php?p=products&id='.$data['IDCategory'].'" class="category">'.$data['nama_kategori'].'</a>
														<p class="price">Rp '.number_format($data['Harga'],2,',','.').'</p>
													</div>';
												echo '</li>';
												$no++;	
												}							
											}					
											?>	
												
										</div>										
									</div>							
								</div>
							</div>						
						</div>
						<br/>						
						<div class="row feature_box">						
							<div class="span4">
								<div class="service">
									<div class="responsive">	
										<img src="themes/images/feature_img_2.png" alt="" />
										<h4>MODERN <strong>DESIGN</strong></h4>
										<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>									
									</div>
								</div>
							</div>
							<div class="span4">	
								<div class="service">
									<div class="customize">			
										<img src="themes/images/feature_img_1.png" alt="" />
										<h4>FREE <strong>SHIPPING</strong></h4>
										<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
									</div>
								</div>
							</div>
							<div class="span4">
								<div class="service">
									<div class="support">	
										<img src="themes/images/feature_img_3.png" alt="" />
										<h4>24/7 LIVE <strong>SUPPORT</strong></h4>
										<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
									</div>
								</div>
							</div>	
						</div>		
					</div>				
				</div>
			</section>