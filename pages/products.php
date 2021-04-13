<section class="header_text sub">
			
<?php
	if(isset($_GET['id'])){	
	$idcategory =  $_GET['id'];
	require_once('./class/class.Menu.php'); 
	$objMenu = new Menu(); 		
	$arrayResult = $objMenu->SelectAllMenu($idcategory, '');
														
?>
			
	<h4><span>Kategori <?php echo $arrayResult[0]->namacategory;  ?></span></h4>
</section>
<section class="main-content">				
	<div class="row">						
		<div class="span12">								
			<ul class="thumbnails listing-products">						
				<?php

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
				
			}
				?>
			</ul>								
		<hr>
						
		</div>					
	</div>
</section>
			