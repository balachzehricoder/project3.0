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
					<a href="profile.php"><i class="fa-solid fa-user"></i></a>
				 <li> <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping">



					<?php
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
				  if (!isset($_SESSION["user_id"])) {

					exit();
				  }
				  
				 
				 ?>
					<a href="logout.php"><button type="button" class="btn btn-danger">LOG OUT</button></a>

				 
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

