<section  class="homepage-slider" id="home-slider">
	<div class="flexslider">
		<ul class="slides">
		<?php
            require_once('./class/class.Banner.php'); 		
            $objBanner = new Banner(); 
            $arrayResult = $objBanner->SelectAllBanner();

            foreach ($arrayResult as $dataBanner) {
    			echo '<li>';
				echo '<img src="upload/banner/'.$dataBanner->foto.'" alt="" />
	        			<div class="intro">
    						<h1>'.$dataBanner->nama.'</h1>
	        				<p><span>'.$dataBanner->deskripsi1.'</span></p>
							<p><span>'.$dataBanner->deskripsi2.'</span></p>
						</div>';
				echo '</li>';								
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
					<div>
					<ul class="thumbnails">		
					<?php

					require_once('./class/class.Menu.php'); 
					$objMenu = new Menu(); 		
					$arrayResult = $objMenu->SelectAllMenu(0, '');

					foreach ($arrayResult as $dataMenu) {
						echo '<li class="span3">
								<div class="product-box">
									<span class="sale_tag"></span>
									<p><a href="index.php?p=productdetail&id='.$dataMenu->id.'"><img height="150" width="200" src="upload/menu/'.$dataMenu->foto.'" alt="" /></a></p>
									   <a href="index.php?p=productdetail&id='.$dataMenu->id.'" class="title">'.$dataMenu->nama.'</a><br/>
									   <a href="index.php?p=products&id='.$dataMenu->idcategory.'" class="category">'.$dataMenu->namacategory.'</a>
									<p class="price">Rp '.number_format($dataMenu->harga,2,',','.').'</p>
								</div>
							  </li>
							  
							  ';
					}
					?>
					</ul>								
					</div>
				</div>						
			</div>			
		</div>				
	</div>
</section>