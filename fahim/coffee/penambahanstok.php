<?php
include 'koneksi.php';
session_start();

$result1 = mysqli_query($koneksi, "SELECT * FROM customer WHERE Username='".$_SESSION['username']."'");
$row = mysqli_fetch_array($result1);

$result2 = mysqli_query($koneksi, "SELECT * FROM admin WHERE Username='".$_SESSION['username']."'");
$row2 = mysqli_fetch_array($result2);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Keranjang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
	
	<style>

	.tombol {
		padding: 5px 10px;
		background: black;
		transition: .3s ease-in;
		color: white;
	  }
	
	  .tombol:hover {
	   background: whitesmoke;
	   color: black;
	  }

	  .tombol1 {
		padding: 10px 35px;
		background: black;
		transition: .3s ease-in;
		color: white;
		border: 1px solid white;
	  }
	
	  .tombol1:hover {
	   background: #191919;
	   color: white;
	  }
	</style>

  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Ning<small>Puri</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Beranda</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="shop.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produk</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
				  <a class="dropdown-item" href="shop.php">Produk</a>
				  
				<?php            

				if ($row2!="") {
				echo '<a class="dropdown-item" href="#">Tambah Produk</a>';
				echo '<a class="dropdown-item" href="penambahanstok.php">Penambahan Stok</a>';
				}

				else {
				echo '<a class="dropdown-item" href="cart.php">Keranjang</a>';
				echo '<a class="dropdown-item" href="checkout.php">Pembayaran</a>';
				}

				?>

              </div>
			</li>
			
				<?php

				if ($row!="") {
				echo '<li class="nav-item cart"><a href="cart.php" class="nav-link"><span class="icon icon-shopping_cart"></span><!--<span class="bag d-flex justify-content-center align-items-center"><small>1</small></span>--></a></li>';

				}

				else {
				echo '<li class="nav-item"><a href="index.php" class="nav-link">Pesanan</a></li>';
				echo '<li class="nav-item"><a href="index.php" class="nav-link">Laporan</a></li>';
				}

				?>

			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="shop.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/akun.png" alt="" style="width: 22px; height: 22px;"></a>
				<div class="dropdown-menu" aria-labelledby="dropdown04">

				<?php

				if ($row!="") {
				echo '<a class="dropdown-item" href="profil.php">Profil</a>';
				echo '<a class="dropdown-item" href="logout.php">Logout</a>';
				echo '<li  class="nav-item"><a href="profil.php" class="nav-link">  Hello '.$row['Username'].'</a></li>';
				}

				elseif ($row2!="") {
				echo '<a class="dropdown-item" href="profil.php"> Profil</a>';
				echo '<a class="dropdown-item" href="logout.php">Logout</a>';
				echo '<li class="nav-item"><a href="profil.php" class="nav-link"> Hello '.$row2['Username'].'</a></li>';
				
				}

				else {
				echo '<a class="dropdown-item" href="daftar.php">Daftar</a>';
				echo '<a class="dropdown-item" href="masuk.php">Masuk</a>';
				}
				?>
				</div>
			  </li>
	        </ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->

    <section class="ftco-menu mb-5 pb-5">
			<div class="container">
				<div class="row d-md-flex">
					<div class="col-lg-12 ftco-animate p-md-5">
						<div class="row">
					  <div class="col-md-12 nav-link-wrap mb-5">
						<div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<h1>Keranjang</h1>
						</div>
					  </div>
					  <div class="col-md-12 d-flex align-items-center">
		
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary" style="border-bottom: 2px solid white;">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>Produk</th>
						        <th>Nama Produk</th>
						        <th>Stok</th>
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						      </tr>
						    </thead>
						    <tbody style="background-color: #191919;">
						      <tr class="text-center">
							  <td></td>
						        
						        
						        <td class="image-prod"><div class="img" style="background-image:url(images/menu-2.jpg);"></div></td>
						        
						        <td class="product-name">
						        	<h3>Creamy Latte Coffee</h3>
						        	<p>Far far away, behind the word mountains, far from the countries</p>
						        </td>
						        
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
					             	<input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
					          	</div>
					          </td>
						        
								<td><button class="tombol">Tambah</button></td>
								<td></td>
						      </tr><!-- END TR-->

						      <tr class="text-center">
						        <td></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url(images/dish-2.jpg);"></div></td>
						        
						        <td class="product-name">
						        	<h3>Grilled Ribs Beef</h3>
						        	<p>Far far away, behind the word mountains, far from the countries</p>
						        </td>
						        
						        								
						        <td class="quantity">
						        	<div class="input-group mb-3">
					             	<input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
					          	</div>
					          </td>
						        
							  <td><button class="tombol">Tambah</button></td>
							  <td></td>
						      </tr><!-- END TR-->
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>$20.60</span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>$0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>$3.00</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>$17.60</span>
    					</p>
    				</div>
    				<p class="text-center"><a href="checkout.html" class="tombol1">Proceed to Checkout</a></p>
    			</div>
    		</div>
			</div>
		</section>

	<?php
  	require_once "footer.html";
	?>
	  
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

    
  </body>
</html>