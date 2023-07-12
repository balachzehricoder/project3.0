<?php


include 'config.php';


$error = "";

if (isset($_POST['submit'])) {
	$p_qty = $_POST['p_qty'];
	$p_price = $_POST['p_price'];
	$p_name = $_POST['p_name'];
	$p_tax = $_POST['p_tax'];

  include 'image_upload.php';
	
// uploadimg
$fileResult = UploadImage($_FILES["uploadimg"]);
$path = $fileResult["uploadedFile"];


	if ($p_qty != "" && $p_price != "" && $p_name != "" && $p_tax != "" && $path != "") {
		$query = "INSERT INTO products (p_qty, p_price, p_tax, p_name, img_upload) VALUES ('$p_qty', '$p_price', '$p_tax', '$p_name', '$path')";
		if ($conn->query($query)) {
			$error = "<script>alert('Successful')</script>";
		} else {
			$error = "<script>alert('your product didnt add')</script>";
		}
	} else {
		$error = "<script>alert('Please fill in all fields')</script>";
	}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
  <link rel="icon" href="phonesell.com_logo.png">
y
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<style>
  .inp{
    color: black;
    text-decoration: double black;
    font-weight: 800;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-style: italic;
    font-variant: normal;
    display: flex;
    height: 50px;
    
  }
  .inp:hover{
    color: lightblue;
    font-weight: bolder;
  }
  h1{
    margin: 0 auto;
    
    text-decoration: double black;
    font-weight: 800;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-style: italic;
    font-variant: normal;
  }
</style>
<body>


<!-- navs -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/20034a5f5a.js" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="phonesell.com_logo.png">


	</head>
	<style>
		.nav{
			border: 0px;
		}
	.img{
		height: 50px;
	}</style>
	<body>
  
	<section class="section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 text-center  ">
				</div>
			</div>
		</div>
		<div class="container">
			<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light nav" id="ftco-navbar">
		    <div class="container">
		    	<a class="navbar-brand" href="index.php"><img class="img" src="phonesell.com_logo.png" alt=""></a>
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="fa fa-bars"></span> Menu
		      </button>
		      <div class="collapse navbar-collapse" id="ftco-nav">
		        <ul class="navbar-nav ml-auto mr-md-3">
		        	<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
		        	<li class="nav-item"><a href="contactus.php" class="nav-link">Contact</a></li>
		        	<li class="nav-item"><a href="Email/email.php" class="nav-link">About</a></li>
		        	<li class="nav-item"><a href="#" class="nav-link">Privecy Policy</a></li>
					<!-- <a href="profile.php"><i class="fa-solid fa-user"></i></a> -->
				 <!-- <li> <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"> -->



					<!-- <?php
					//   $cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
					//   echo $cart_count;
				  

					if(isset($_SESSION['cart_details']['cart_total_qty']))
					{
						print_r($_SESSION['cart_details']['cart_total_qty']);
					}
					else
					{
						print_r(0);
					}
					?>
				   
				  </i>     </a>
                  </li>
				  <?php 
				 
				  
				  
				 
				 ?> -->

				 
		        </ul>
		      </div>
		    </div>
		  </nav>
    <!-- END nav -->
	

	</section>


	

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>



<center><h1></h1></center>

<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="formGroupExampleInput" class="inp" >product name</label>
    <input type="text" class="form-control inp" id="formGroupExampleInput" name="p_name" placeholder="product name">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" class="inp" >product price</label>
    <input type="text" class="form-control inp" id="formGroupExampleInput2" name="p_price" placeholder="product price">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" class="inp" >product qty</label>
    <input type="text" class="form-control inp" id="formGroupExampleInput2" name="p_qty" placeholder="product qty">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" class="inp" >product tax</label>
    <input type="text" class="form-control inp" id="formGroupExampleInput2" name="p_tax" placeholder="product tax">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" class="inp" >product image</label>
    <input type="file" class="form-control inp" id="formGroupExampleInput2" name="uploadimg">
  </div>
  <br><br><br>


  <center><button name="submit" class="btn btn-primary" >submit</button>
</center>

</form>






</body>

</html>
  
  
  







