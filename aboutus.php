<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - PhoneSell.com</title>
  <!-- Add your CSS stylesheets and JavaScript files here -->
  <link rel="stylesheet" href="styles.css">
  <script src="script.js"></script>
</head>

<body>
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
		        	<li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
		        	<li class="nav-item"><a href="contactus.php" class="nav-link">Contact</a></li>
		        	<li class="nav-item active"><a href="aboutus.php" class="nav-link">About</a></li>
		        	<li class="nav-item"><a href="privecypolice.php" class="nav-link">Privecy Policy</a></li>
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

  <header>
    <!-- Your header content goes here -->
  </header>

  <!-- Main content section -->
  <section id="about-us">
    <div class="container">
      <h1>About Us</h1>
      <p>Welcome to PhoneSell.com, your trusted destination for all things related to smartphones. Our mission is to provide you with the latest information, reviews, and deals on a wide range of mobile devices.</p>

      <h2>Our Story</h2>
      <p>PhoneSell.com was founded in 2023 with a passion for technology and a desire to help people make informed decisions when purchasing smartphones. Our team of experts is dedicated to researching and analyzing the latest trends in the mobile industry to bring you the most relevant and up-to-date information.</p>

      <h2>What We Offer</h2>
      <p>At PhoneSell.om, we offer:</p>
      <ul>
        <li>Comprehensive smartphone reviews</li>
        <li>Expert buying guides</li>
        <li>Comparison tools to help you find the perfect phone</li>
        <li>The latest news and updates in the mobile industry</li>
        <li>Exclusive deals and discounts</li>
      </ul>

      <h2>Contact Us</h2>
      <p>If you have any questions, feedback, or suggestions, please don't hesitate to contact us. We value your input and strive to provide the best possible experience for our visitors.</p>
      <p>You can reach us via:</p>
      <ul>
        <li>Email: phonesell7896.com</li>
        <li>Phone: [03313345084]</li>
        <li>Address: gulshan-e-iqbal block 17 shop #33</li>
      </ul>
    </div>
  </section>

  <!-- Add your footer section here -->
  <footer>
    <!-- Your footer content goes here -->
  </footer>
</body>

</html>
