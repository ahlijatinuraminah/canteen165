<?php
	if(isset($_GET['id'])){	
		require_once('./class/class.Menu.php'); 
		$objMenu = new Menu(); 
		$objMenu->id = $_GET['id'];	
		$objMenu->SelectOneMenu();
	}
?>
			
<section class="header_text sub">
	<h4><span><?php echo $objMenu->nama; ?></span></h4>
</section>
<section class="main-content">				
	<div class="row">						
		<div class="span12">
			<div class="row">
				<div class="span4">
					<a href="<?php echo "upload/menu/".$objMenu->foto; ?>" class="thumbnail" data-fancybox-group="group1" title="Description 1"><?php echo '<img height="150" width="250" src="upload/menu/'.$objMenu->foto.'" alt="" />'; ?></a>												
				</div>
				<div class="span3">
					<address>
						<strong>ID Menu:</strong> <span><?php echo $objMenu->id; ?></span><br>
						<strong>Kategori:</strong> <span><?php echo $objMenu->namacategory; ?></span><br>									
					</address>									
					<h4><strong>Price: <?php echo number_format($objMenu->harga,2,',','.'); ?></strong></h4>
					<form action="index.php?p=cart" method="post" class="form-inline">									
						<input type="hidden" name="idmenu" value="<?php echo $objMenu->id; ?>">									
						<label>Qty:</label>									
						<input type="text" class="span1" required name="qty" placeholder="1">
						<input name="btnPesan" class="btn btn-inverse" type="submit" value="Add to Cart">
					</form>
				</div>							
				<div class="span4">
					<h4>
						<span class="text"><strong>Description</strong></span>
					</h4>
					<div class="tab-content">
						<div class="tab-pane active" id="home"><?php echo $objMenu->deskripsi; ?></div>									
					</div>															
				</div>												
			</div>						
		</div>							
	</div>
</section>			
	