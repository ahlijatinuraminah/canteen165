<section class="header_text sub">
	<h4><span>Check Out</span></h4>
</section>	
<section class="main-content">			
	<div class="row">
	<div class="span6">
	<?php
		if(!isset($_SESSION['iduser'])){
			echo "Anda harus login atau register dulu";	
			include "login.php";	
	?>
	</div>
	<div class="span6">
	<?php
		include "register.php";	
	}
	?>
	</div>		
</div>
</section>

<?php 
require_once('./class/class.User.php'); 
require_once('./class/class.Menu.php'); 
$objMenu = new Menu(); 
$objUser = new User();
$objUser->id = $_SESSION["iduser"];
$objUser->SelectOneUser();

?>
  
  <div class="row">
	<div class="span8">
	<h4 class="title"><span class="text"><strong>Data Pesanan</strong></span></h4>
	<table class="table table-striped">
			<thead>
				<tr>					
					<th>Image</th>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Unit Price</th>					
					<th>Sub Total</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$total = 0;
			$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
			if ($products_in_cart) {
				$arrayproductincart = implode(',', array_keys($products_in_cart));
				$arraymenu = $objMenu->SelectAllMenuInCart($arrayproductincart);
			}

			if (empty($arraymenu)){
                echo '<tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>';
			}
            else{
				foreach($arraymenu as $menu) {
					$subtotal = $products_in_cart[$menu->id] * $menu->harga;
					$total += $subtotal;
					$_SESSION['totalharga'] = $total;
					echo '<tr>';
					echo '<td><a href="index.php?p=productdetail&id='.$menu->id.'"><img height="60" width="80" alt="" src="upload/menu/'.$menu->foto.'"></a></td>';
					echo '<td><a href="index.php?p=productdetail&id='.$menu->id.'">'.$menu->nama.'</a></td>';
					echo '<td>'.$products_in_cart[$menu->id].'</td>';	
					echo '<td> Rp'.number_format($menu->harga,2,',','.').'</td>';
					echo '<td> Rp'.number_format($subtotal,2,',','.').'</td>';
					echo '</tr>';	
				}
			}

			?>			
			</tbody>
		</table>	
		<div class="cart-total right">
			<h3><strong>Total</strong>: <?php echo number_format($total,2,',','.'); ?></h3><br>
		</div>
	</div>
	<div class="span4">
	<form action="index.php?p=simpanpesanan" method="post">
	<table>	
	<tr>
	<td colspan="2"><h4 class="title"><span class="text"><strong>Data Pemesan</strong></span></h4></td>
	</tr>
	<tr>
	<td>Nama:</td>
	<td>
	<input type="text" readonly value="<?php echo $objUser->nama; ?>"></td>
	</tr>
	<tr>
	<td>Alamat:</td>
	<td>
	<input type="text" readonly value="<?php echo $objUser->alamat; ?>"></td>
	</tr>
	<tr>
	<td>Handphone:</td>
	<td>
	<input type="text" readonly value="<?php echo $objUser->handphone; ?>"></td>
	</tr>
	<tr>		
	</table>  
	</div>			
</div>
<section class="header_text sub">
<input type="submit" class="btn btn-primary" value="Submit Pesanan" name="btnSubmit">
<a href="index.php" class="btn btn-primary">Cancel</a>
</section>	
</form>	


