<div class="container">  
<div class="span11">					
						<h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
						<form action="index.php?p=checkout" method="POST">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Remove</th>
									<th>Image</th>
									<th>Product Name</th>
									<th>Quantity</th>
									<th>Unit Price</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><a href="index.php?p=removecart&id=1"><img src="themes/images/delete.png"  height="20" width="20"></a></td>
									<td><a href="product_detail.html"><img height="60" width="80" alt="" src="upload/menu/15.jpg"></a></td>
									<td>Rendang</td>
									<td><input type="text" placeholder="1" class="input-mini"></td>
									<td>Rp 90.000,00</td>
									<td>Rp 90.000,00</td>
								</tr>			  
								<tr>
									<td><a href="index.php?p=removecart&id=2"><img src="themes/images/delete.png"  height="20" width="20"></a></td>
									<td><a href="product_detail.html"><img height="60" width="80" alt="" src="upload/menu/11.jpg"></a></td>
									<td>Pizza</td>
									<td><input type="text" placeholder="2" class="input-mini"></td>
									<td>Rp 50.000,00</td>
									<td>Rp 100.000,00</td>
								</tr>
								<tr>
									<td><a href="index.php?p=removecart&id=3"><img src="themes/images/delete.png"  height="20" width="20"></a></td>
									<td><a href="product_detail.html"><img height="60" width="80" alt="" src="upload/menu/13.jpg"></a></td>
									<td>Salad buah</td>
									<td><input type="text" placeholder="1" class="input-mini"></td>
									<td>Rp 31.000,00</td>
									<td>Rp 31.000,00</td>
								</tr>								
							</tbody>
						</table>						
						<div class="cart-total right">
							<strong>Sub-Total</strong>:	Rp 221.000,00<br>
							<strong>Pajak (10%)</strong>: Rp 22.100,00<br>
							<h3><strong>Total</strong>: Rp 243.100,00</h3><br>
						</div>
						<hr/>
						<p class="buttons center">				
							<button class="btn btn-inverse" type="submit" id="checkout">Checkout Order</button>
						</p>	
					</form>						
					</div>
</div>