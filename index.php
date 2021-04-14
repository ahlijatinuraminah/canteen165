<?php 
   if (!isset($_SESSION)) {
		session_start();
	}	

	require "inc.koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Canteen 165 E-commerce</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<link href="css/bootstrap.min.css" rel="stylesheet">      
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<!-- global styles -->
		<link href="css/flexslider.css" rel="stylesheet"/>
		<link href="css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>		
		<script src="js/superfish.js"></script>	
		<script src="js/jquery.scrolltotop.js"></script>
	</head>
    <body>		
		<div id="top-bar" class="container">		
			<div class="row">
				<div class="span4">
					<a href="index.php" class="logo pull-left"><img src="images/logo.png" class="site_logo" alt=""></a>
				</div>
				<div class="span8">
					<div id="menu_user" class="account pull-right">
						<ul class="user-menu">											
						    <li><a href="index.php">Home</a></li>
							<li><a href="index.php?p=about">About Us</a></li>
							<li><a href="index.php?p=contact">Contact us</a></li>																			
							<?php 
							    							    
								if(isset($_SESSION["role"]))
							    { 							
									if($_SESSION["role"] == "admin")
									{						
							?>				   	
										<li><a href="index.php?p=accountlist">User</a></li>	
										<li><a href="index.php?p=rolelist">Role</a></li>	
										<li><a href="index.php?p=pembelilist">Pembeli</a></li>	
										<li><a href="index.php?p=categorylist">Kategori</a></li>	
										<li><a href="index.php?p=menulist">Menu</a></li>	
										<li><a href="index.php?p=bannerlist">Banner</a></li>	
										<li><a href="index.php?p=pesananlist">Pesanan</a></li>	
							<?php 
									}
									else //member
									{
							?>							
										<li><a href="index.php?p=historypesanan">History Pesanan</a></li>	
										<li><a href="index.php?p=cart">Keranjang</a></li>	
							<?php 
									}							    
							?>			
									<li><a href="index.php?p=logout">Logout</a></li>							 
							<?php 
							    }
							    else
								{
							?>									
									<li><a href="index.php?p=register">Register</a></li>		
									<li><a href="index.php?p=login">Login</a></li>									
							<?php
								}
							?>
								
						</ul>
					</div>					
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">

		<div class="navbar-inner main-menu">	
				<?php
				if(isset($_SESSION["nama"])){
					echo "Welcome,  <a href='index.php?p=editprofile'>" . $_SESSION["nama"]. "</a> as " . $_SESSION["role"];
				}
				?>		
					<nav id="menu" class="pull-right">
					<ul>
					<?php
					require_once('./class/class.Category.php'); 		
					
					$objCategory = new Category(); 
					$arrayResult = $objCategory->SelectAllCategory();

					foreach ($arrayResult as $dataCategory) {
						echo '<li><a href="index.php?p=products&id='.$dataCategory->id.'">'.$dataCategory->nama.'</a>';								
						echo '</li>';	
					}
					?>	
						</ul>
					</nav>
				</div>
			
			
			<section id="content">
			<div id="konten">
				<?php
				$pages_dir = 'pages';
				if(!empty($_GET['p'])){
					$pages = scandir($pages_dir, 0);
					unset($pages[0], $pages[1]);
					
					$p = $_GET['p'];
					if(in_array($p.'.php', $pages)){
						include($pages_dir.'/'.$p.'.php');
					} else {
						echo 'Halaman tidak ditemukan! :(';
					}
				} else {
					include($pages_dir.'/home.php');
				}
				?>
			</div>
			</section>
	
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="index.php">Homepage</a></li>  
							<li><a href="index.php?p=about">About Us</a></li>
							<li><a href="./contact.html">Contac Us</a></li>
							<li><a href="./cart.html">Your Cart</a></li>
						</ul>					
					</div>
					<div class="span4">
						<h4>My Account</h4>
						<ul class="nav">
							<li><a href="index.php?p=editprofile">My Account</a></li>
							<li><a href="index.php?p=history">Order History</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Newsletter</a></li>
						</ul>
					</div>
					<div class="span5">
						<p class="logo"><img src="images/logo.png" class="site_logo" alt=""></p>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. the  Lorem Ipsum has been the industry's standard dummy text ever since the you.</p>
						<br/>
						<span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
					</div>					
				</div>	
			</section>
			<section id="copyright">
				<span>Copyright 2013 bootstrappage template  All right reserved.</span>
			</section>
		</div>
		
		<script src="js/common.js"></script>
		<script src="js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>
