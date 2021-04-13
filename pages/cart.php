<?php
require_once('./class/class.Menu.php'); 
$objMenu = new Menu(); 

//add to cart berdasarkan idmenu dan qty
if (isset($_POST['idmenu'], $_POST['qty'])) {
	$idmenu = $_POST['idmenu'];
	$qty = $_POST['qty'];
	if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
		if (array_key_exists($idmenu, $_SESSION['cart'])) {
			$_SESSION['cart'][$idmenu] += $qty;
		} else {
			$_SESSION['cart'][$idmenu] = $qty;
		}
	} else {
		$_SESSION['cart'] = array($idmenu => $qty);
	}
	header('location: index.php?p=cart');
	exit;
}

//update quantity menu
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    header('location: index.php?p=cart');
    exit;
}

//remove menu form cart
if (isset($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
	unset($_SESSION['cart'][$_GET['remove']]);
}

//checkout
if (isset($_POST['checkout']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: index.php?p=checkout');
    exit;
}
?>


<div class="container">  
<div class="span11">					
	<h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
	<form action="index.php?p=cart" method="POST">
		<table class="table table-striped">
			<thead>
				<tr>					
					<th>Image</th>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Unit Price</th>					
					<th>Sub Total</th>
					<th>Remove</th>
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
					echo '<tr>';
					echo '<td><a href="index.php?p=productdetail&id='.$menu->id.'"><img height="60" width="80" alt="" src="upload/menu/'.$menu->foto.'"></a></td>';
					echo '<td><a href="index.php?p=productdetail&id='.$menu->id.'">'.$menu->nama.'</a></td>';
					//echo '<td>'.$products_in_cart[$menu->id].'</td>';	
					echo '<td><input type="number" class="span1" name="quantity-'.$menu->id.'" value="'.$products_in_cart[$menu->id].'" required></td>';
					echo '<td> Rp'.number_format($menu->harga,2,',','.').'</td>';
					echo '<td> Rp'.number_format($subtotal,2,',','.').'</td>';
					echo '<td><a href="index.php?p=cart&remove='.$menu->id.'" class="btn btn-danger">Hapus</a></td>';
					echo '</tr>';	
				}
			}

			?>
						  
						
			</tbody>
		</table>						
		<div class="cart-total right">
			<h3><strong>Total</strong>: <?php echo number_format($total,2,',','.'); ?></h3><br>
		</div>
		<hr/>
		<p class="buttons center">				
			<input class="btn btn-warning" type="submit" value="Update" name="update">
			<input class="btn btn-inverse" type="submit" value="Checkout" name="checkout">
		</p>	
	</form>						
</div>
</div>