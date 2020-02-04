<?php
require_once "header.php";
$_GET['id'];
$editt = mysqli_query($koneksi, "SELECT pembayaran.ID_Pembayaran,pembayaran.ID_Transaksi, customer.Nama, customer.Alamat, bank.No_Rek, pembayaran.Bukti_Pembayaran, pembayaran.Tanggal_Pembayaran, pembayaran.Status FROM pembayaran INNER JOIN transaksi JOIN customer JOIN bank on pembayaran.ID_Transaksi=transaksi.ID_Transaksi AND transaksi.ID_Customer=customer.ID_Customer AND pembayaran.ID_Bank=bank.ID_Bank WHERE ID_Pembayaran='".$_GET['id']."'");
$edit = mysqli_fetch_array($editt);
?>

    <section class="ftco-menu mb-5 pb-5">
			<div class="container">
				<div class="row d-md-flex">
					<div class="col-lg-12 ftco-animate p-md-5">
						<div class="row">
					  <div class="col-md-12 nav-link-wrap mb-5">
						<div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<!-- <h1>Form Penambahan Produk</h1> -->
						</div>
					  </div>
					  <div class="col-md-12 d-flex align-items-center">
		
    	<div style="margin-top: -100px" class="container">
        	<div class="row">
				<div class="col-lg-12 ftco-animate p-md-5">
						<div class="billing-form ftco-bg-dark p-3 p-md-5">
							<h3 class="mb-4 billing-heading">Edit Pesanan</h3>
							<?php 
                            if(isset($_GET['pesan'])){
                                if($_GET['pesan'] == "update"){
                                    echo 'Sudah di Update';
                                }
                            }
                        ?>
						
							<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
								

                <div class="row align-items-end">
				</div>
				<form action="updatepesanan.php" method="post">
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">ID Pembayaran</label>
					  <input style="color: white;" disabled type="text" class="form-control" name="id" placeholder=""  <?php echo 'value="'.$_GET['id'].'"' ?> >
	                </div>
				  </div>
				  <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="firstname">ID Transaksi</label>
					  <input disabled type="text" class="form-control" name="idtrans" placeholder=""  <?php echo 'value="'.$edit['ID_Transaksi'].'"' ?> >
	                </div>
					</div>
		            <div class="w-100"></div>
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Nama</label>
	                  <input disabled type="text" class="form-control" name="nama" placeholder="" <?php echo 'value="'.$edit['Nama'].'"' ?> >
	                </div>
				  </div>
				  <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="firstname">Alamat</label>
					  <input disabled type="text" class="form-control" name="alamat" placeholder=""  <?php echo 'value="'.$edit['Alamat'].'"' ?> >
	                </div>
					</div>
					<div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="firstname">No. Rekening</label>
					  <input disabled type="text" class="form-control" name="no_rek" placeholder=""  <?php echo 'value="'.$edit['No_Rek'].'"' ?> >
	                </div>
					</div>
					<div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="firstname">Tanggal Pembayaran</label>
					  <input disabled type="text" class="form-control" name="nama" placeholder=""  <?php echo 'value="'.$edit['Tanggal_Pembayaran'].'"' ?> >
	                </div>
					</div>
				  <div class="w-100"></div>
				  <div class="col-md-6">
		            	<div class="form-group">
				  <label>Status</label>
                                  <select class="form-control" name="status" id="status" >
								  <option style="color: black;" value="Menunggu">Menunggu </option>
								  <option style="color: black;" value="Sukses"> Sukses </option>
                                  </select>
								</div>
						</div>
		            <div class="col-md-12">
						<div class="form-group">
						<button onclick="myFunction()" class="btn btn-primary py-3 px-4" type="submit" > Simpan</button>
						</div>
					</div>
					</form>
				</div>
				
			</div><!-- END -->
          </div> <!-- .col-md-8 -->
        </section> <!-- .section -->

        <footer class="ftco-footer ftco-section img">
            <div class="overlay"></div>
          <div class="container">
            <div class="row mb-5">
              <div class="col-lg-5 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                  <h2 class="ftco-heading-2">Tentang Ning Puri</h2>
                  <p>Ning Puri berdiri sejak tahun 2017 memproduksi hasil kebun sendiri menjadi produk olahan sirup markisa yang terkenal mengandung vit. C tinggi, menyehatkan tanpa bahan pengawet, tanpa pemanis buatan, tanpa pewarna tambahan,  ekonomis dengan harga terjangkau, dan baik di konsumsi untuk semua kalangan mulai dari anak-anak, orang tua dan ibu hamil.</p></p>
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

  <script src="js/upload.js"></script>
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
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });

		});

		function myFunction() {
  alert("Data yang telah dimasukkan sukses ");
}

function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}

	
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	
	</script>

    
  </body>
</html>