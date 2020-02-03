<?php
require_once "header.php";

$user_id=$_SESSION['id'];
$bank = "SELECT * FROM bank ";
$Qbank = mysqli_query($koneksi,$bank);
$user_products_query="select detail_transaksi.ID_Detail,barang.ID_Barang,barang.Nama_Barang,barang.Deskripsi,
barang.Harga,barang.Gambar_Barang,detail_transaksi.Qty_Det from detail_transaksi inner join 
barang on barang.ID_Barang=detail_transaksi.ID_Barang where detail_transaksi.ID_Customer='$user_id'
and detail_transaksi.Status='BELUM BAYAR'";
$user_products_result=mysqli_query($koneksi,$user_products_query) or die(mysqli_error($koneksi));
$no_of_user_products= mysqli_num_rows($user_products_result);

?>
    <!-- END nav -->

    <section class="ftco-menu mb-5 pb-5">
			<div class="container">
				<div class="row d-md-flex">
					<div class="col-lg-12 ftco-animate p-md-5">
						<div class="row">
					  <div class="col-md-12 nav-link-wrap mb-5">
						<div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<h1>Checkout</h1>
						</div>
					  </div>
					  <div class="col-md-12 d-flex align-items-center">
		
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
				<?php 
			if(isset($_SESSION['message'])){
				?>
				<div class="alert alert-info text-center">
					<?php echo $_SESSION['message']; ?>
				</div>
				<?php
				unset($_SESSION['message']);
			}

			?>

						<form method="POST" action="co_pem.php" enctype="multipart/form-data">
						  <div class="col-lg-20 ftco-animate p-md-20">
                            <div class="billing-form ftco-bg-dark p-3 p-md-5">
                                
                            <div class="row align-items-end">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_transaksi">Nama</label>
                            <input type="text" class="form-control" disabled name="id" placeholder="" value="<?php echo $row['Nama'] ?>" >
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="total_pembayaran">No. Telp</label>
                            <input type="text"  class="form-control" disabled placeholder="" value="<?php echo $row['No_Telepon'] ?>">
                            </div>
                            </div>
                            <div class="col-md-12">
                                <p>Alamat</p>
                            <input type="text"  class="form-control" disabled placeholder="" value="<?php echo $row['Alamat'] ?>">
                            </div>
			
                        </div>
                        </div>
    				<div style="padding-top : 20px;">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>Produk</th>
						        <th>Nama Produk</th>
						        <th>Harga</th>
						        <th>Qty</th>
						        <th>Subtotal</th>
						      </tr>
						    </thead>
						    <tbody style="background-color: #191919;">
							<?php
								//initialize total
								
								//$sql = mysqli_query($koneksi, "SELECT * FROM detail_transaksi WHERE ID_Customer='".$_SESSION['id']."'");
								//$a = mysqli_num_rows($sql);								
				
								$total = 0;
								if($no_of_user_products > 0){
								
								while($roww=mysqli_fetch_array($user_products_result)){
								//create array of initail qty which is 1
								//while($b = mysqli_fetch_array($sql)){ ?>
								<?php
								 //$sql1 = "SELECT * FROM barang WHERE ID_Barang='".$b['ID_Barang']."'";
								 //$query = $koneksi->query($sql1);
								 //$row3 = $query->fetch_assoc();
									
								?>
									
						      <tr class="text-center">
						        <td class="image-prod"><div class="img" style="background-image:url(filebarang/<?php echo $roww['Gambar_Barang'] ?>);"></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $roww['Nama_Barang']; ?></h3>
						        	<p><?php echo $roww['Deskripsi']; ?></p>
						        </td>
						        
						        <td class="price">Rp. <?php echo $roww['Harga']; ?></td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
									
								<input type="hidden" name="iddet" value="<?php echo $roww['ID_Detail']; ?>">
								<input type="hidden" name="idbarang" value="<?php echo $roww['ID_Barang']; ?>">
								<input type="hidden" id="hargacart" name="hargacart_" value="<?php echo $roww['Harga']; ?>">
					             	<input disabled type="text" id="jmlcart" class="quantity form-control input-number" name="jumlahcart" value="<?php echo $roww['Qty_Det']; ?>"  onchange="mySubmit(this.form)">
					          	</div>
					          </td>
							  
						        <td class="total" id="totalharga" name="subtotal"  >Rp. <?php echo ($roww['Qty_Det']*$roww['Harga']); ?></td>
								<?php $total += $roww['Qty_Det']*$roww['Harga']; ?>
						      </tr>
							  
							  	<!-- END TR-->
							  <?php
								 }	
							}
								
						else{
							?>
							<tr>
								<td colspan="6" class="text-center">No Item in Checkout</td>
							</tr>
							<?php
						}

					?>
						    </tbody>
						  </table>
						  <!--<div style="float: left;">
						  <a  href="shop.php" class="btn btn-danger"><span  class="glyphicon glyphicon-arrow-left"></span > Back</a> -->
						  
						
		</div>
		
		<?php
		 $bree = mysqli_query($koneksi, "SELECT * FROM bank");

		 $trans = mysqli_query($koneksi, "SELECT * FROM transaksi  where ID_Customer = '".$_SESSION['id']."' ORDER BY ID_Transaksi DESC LIMIT 1");
		 $hop = mysqli_fetch_array($trans);
		?>
		<div class="row">
		<div class="col-lg-7 ftco-animate p-md-20">
				<div class="billing-form ftco-bg-dark p-3 p-md-10">
				<div class="col-md-12">
                            <div class="form-group" >
							<label>Bank Tujuan</label>
					<select class="form-control" name="bank_tujuan" id="bank_tujuan">
					<option style="color: black;" value=""> Pilih Bank</option>
						<?php while ($bbank = mysqli_fetch_assoc($bree)){
							$idb= $bbank['ID_Bank'];
							$nmbank = $bbank['Nama_Bank'];
							$nmrek = $bbank['Nama_Rek'];
							$norekbank = $bbank['No_Rek'];
								?><option style="color: black;" value="<?php echo $idb;?>"><?php echo $nmbank.'-'.$nmrek.'-'. $norekbank;?></option>	

						<?php }?>
						
					</select>
				</div>
                            </div>
				<div class="col-md-6">
				<div class="form-group">
					<label>Nama Rekening Pengirim</label>
					<input required class="form-control text-left px-12" type="text" id="namarekres" name="namarekres" onkeypress="return huruf(event)"">
				</div>
				</div>
				<div class="col-md-6">
				<div class="form-group">
					<label>No Rekening Pengirim</label>
					<input required class="form-control text-left px-12" type="text" id="norekres" name="norekres"  onkeypress="return hanyaAngka(event)">
				</div>
				</div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
								<label for="total_pembayaran">Bukti Bayar</label>
								<label>Bukti Bayar</label>
								<input type="file" required name="buktiByr"  >
                           
                            </div>
                            </div>
                    
						</div>
					</div>
			<div class="col col-lg-4 col-md-6  cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>

    					<p class="d-flex total-price">
    						<span>Total</span>
							Rp. &nbsp; <span id="totalharga"><?php echo ($total); ?>
							</span>
						</p>
						<input type ="hidden" name="kdtr" id="kdtr" value="<?php echo $hop['ID_Transaksi'];?>">
						<input type ="hidden" name="totals" id="subtotal" value="<?php echo $total;?>">
						<!--<label for="metode_pembayaran">Transfer Bank</label>
                                    <div class="select-wrap">
                                  <div class="icon"><span class=""></span></div>
                                  <select name="bank" id="" class="">
                                  
                                  </select>
                                </div> -->
					</div>         
					<p style="background-color: #191919;" class="text-center"><input type="submit" value="Lanjut" class="btn btn-primary py-3 px-4"></p>
					<p style="background-color: #191919;" class="text-center"><a style="color: white;" href="trans_cancel.php?id=<?php echo $hop['ID_Transaksi']; ?>" class="btn btn-primary py-3 px-4">Batal</a></p>
				</div>
				</div>
				</div>
			</div>
			</form>
    		</div>
			</div>
			
		</section>

		


    <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-5 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Tentang Ning Puri</h2>
              <p>Ning Puri berdiri sejak tahun 2017 memproduksi hasil kebun sendiri menjadi produk olahan sirup markisa yang terkenal mengandung vit. C tinggi, menyehatkan tanpa bahan pengawet, tanpa pemanis buatan, tanpa pewarna tambahan,  ekonomis dengan harga terjangkau, dan baik di konsumsi untuk semua kalangan mulai dari anak-anak, orang tua dan ibu hamil.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
         
         
          <div style="padding-left: 100px;">
			<div class="col-lg-10 col-md-6 mb-5 mb-md-5">
			  <div class="ftco-footer-widget mb-4">
				  <h2 class="ftco-heading-2">Kontak Kami</h2>
				  <div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
       
      </div>
    </footer>
    
  

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
  <script>
     function mySubmit(theForm) {
    $.ajax({ // create an AJAX call...
        data: $(theForm).serialize(), // get the form data
        type: $(theForm).attr('method'), // GET or POST
        url: $(theForm).attr('action'), // the file to call
        success: function (response) { // on success..
            $('#here').html(response);
			 // update the DIV
			 //location.reload();
        }
    });
}

$( "#jmlcart" ).keyup(function() {
  var jmlcart = $( "#jmlcart" ).val();
  var harga = $( "#hargacart" ).val();
  var total = jmlcart * harga;
  $( "#totalharga" ).text("Rp. "+total);
});

function huruf(evt){ //hanya huruf
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
            return false;
		return true;
}

function hanyaAngka(evt) { //hanya angka
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
    </script>
    
  </body>
</html>