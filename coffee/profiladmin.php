<?php
include 'koneksi.php';
session_start();

$result1 = mysqli_query($koneksi, " SELECT * FROM customer  WHERE Username='".$_SESSION['username']."'");
$row = mysqli_fetch_array($result1);

$result2 = mysqli_query($koneksi, "SELECT * FROM admin WHERE Username='".$_SESSION['username']."'");
$row2 = mysqli_fetch_array($result2);

// $result2 = mysqli_query($koneksi, " SELECT customer.ID_Customer,customer.Username,customer.Nama,customer.Email,customer.Alamat,customer.No_Telepon,member.Member FROM customer INNER JOIN member on customer.ID_Member=member.ID_Member='".$_SESSION['username']."'");
// $row2 = mysqli_fetch_array($result2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from https://bootdey.com  -->
    <!--  All snippets are MIT license https://bootdey.com/license -->
    <title>NingPuri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/profil.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body style="background-image: url(images/bg_4.jpg);">
<div  class="container">
    <div style="background: #191919;" class="view-account">
        <section class="module">
            <div class="module-inner">
                <div class="side-bar">
                    <div class="user-info">
                        <img class="img-profile img-circle img-responsive center-block" src="images/passionfruit.jpg" alt="">
                        <ul class="meta list list-unstyled">
                        <?php
                        
                            echo '<li style="color: white;" class="name"><b>'.$row2['Username'].'</b></li>';
                            echo '<li style="color: white;" class="name"><p>'.$row2['Email'].'</p></li>';
                            
                        ?>                           
                        </ul>
                    </div>
            		<nav class="side-menu">
        				<ul class="nav">
        					<li class=""><a href="index.php"><span class=""></span> Beranda</a></li>
        					<li class="active"><a href="#"><span class=""></span> Tambah Admin</a></li>
        					<li><a href="password.php"><span class=""></span> Kata Sandi</a></li>
        				</ul>
        			</nav>
                </div>
                <div class="content-panel" style="margin-bottom: 30px;">
                    <!--<h2 class="title" style="color: white;">Tambah Admin</h2> <span " class="pro-label label label-warning"><?php 
                    // if($row['ID_Member'] == "1"){
                    //     echo 'Bronze';
                    // }else{
                    //     echo 'Gold';
                    // }
                    ?></span>-->
                    <div class="form-horizontal">
                        <fieldset class="fieldset">
                        <?php 
                            if(isset($_GET['pesan'])){
                                if($_GET['pesan'] == "update"){
                                    echo 'Sudah di Update';
                                }
                            }
                        ?>
                            <h3 class="fieldset-title" style="color: white;">Admin</h3>
                           
                            <form action="tambahadmin.php" method="post">
                            
                            <input type="hidden" name="USERNAME" class="form-control" value="<?php echo $row2['Username']  ?>" >
                         <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label" style="color: white;" >Username</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="Username" class="form-control" value="" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label" style="color: white;" >Password</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="password" name="Password" class="form-control" value="" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label" style="color: white;" >Email</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="Email" class="form-control" value="" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label" style="color: white;" >Alamat</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="Alamat" class="form-control" value="" >
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                <input onclick="myFunction()" class="btn btn-primary" type="submit" value="Tambah Admin">
                            </div>
                        </div>
                        </form>
                        </div>                   
                </div>
            </div>
        </section>
    </div>
</div>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript"></script>

<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
        }
        
        function myFunction() {
  alert("Data yang telah dimasukkan sukses ");
}
	</script>
	

</body>
</html>