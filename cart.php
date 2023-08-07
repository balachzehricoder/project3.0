<?php

session_start();

// if not logged in cant see this page
if (!isset($_SESSION["user_id"])) {
  header("Location: login.php");
  exit();
}
// include 'navs.php'

?>



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
<!-- Meta Tag -->
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">



</head>
<style>
  .img {
    height: 50px;
  }
</style>

<body>
  



  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<style>
  .empty {
    color: red;
    align-items: center;
    font: 200;
    font-variant-caps: petite-caps;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: bold;
  }

  .img {
    height: 50px;
  }

  .cart {
    border-right: 2px;
  }

  .total {
    color: green;
  }
</style>
<?php
include 'config.php';



// Check if the cart is empty.
if (empty($_SESSION['cart'])) {
  echo '<center><h1 class="empty">Your Cart Is Empty.</h1></center>';
  echo '<br>';
  echo '<center><a class="btn btn-danger" href="index.php">Return to home</a></center>';
  exit;
}

$cart = $_SESSION['cart'];

$insert = false;
if (isset($_POST['submit'])) {
  // Retrieve form data
  // $name = $_POST['name'];
  // $email = $_POST['email'];
  // $phone = $_POST['phone'];
  // $address = $_POST['address'];
  // $payment = $_POST['payment'];

  $user_id = $_SESSION["user_id"];
  $total = $_SESSION['cart_details']['cart_total_price'];
  $delivery_charges = 200;
  $order_date_time = date('Y-m-d H:i:s');

  // Sanitize the form data
  // $name = mysqli_real_escape_string($conn, $name);
  // $email = mysqli_real_escape_string($conn, $email);
  // $phone = mysqli_real_escape_string($conn, $phone);
  // $address = mysqli_real_escape_string($conn, $address);
  // $payment = mysqli_real_escape_string($conn, $payment);

  if (!$conn) {
    die("conn failed" . mysqli_connect_errno());
  }

  $sql = "INSERT INTO ORDERS (user_id, total, delivery_charges, order_date_time) VALUES ('$user_id', '$total', '$delivery_charges', '$order_date_time')";

  if ($conn->query($sql) === TRUE) {
    

    $order_id = mysqli_insert_id($conn);



    foreach ($cart as $product_id => $product) {
      // $product_name = mysqli_real_escape_string($conn, $product['name']);
      $price = $product['price'];
      $qty = $product['quantity'];
      // $total_price = $product['price_total'];

      $sql = "INSERT INTO order_details (order_id, product_id, price, qty) VALUES ('$order_id', '$product_id', '$price', '$qty')";
      ob_start(); 
      if ($conn->query($sql) === TRUE) {
        $insert = true;
        $_SESSION['cart'] = [];
      } else {
        echo "Error: $sql <br> " . $conn->error;
      }
    }


    $insert = true;
    $_SESSION['cart'] = null;
    $_SESSION['cart_details'] = null;
?>

    <div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<?php
    // emails
    include 'Email/email.php';
    
   
    

    header("Location: invoice.php?order_id=" . $order_id);
    exit;
  } else {
    echo "Error: $sql <br> " . $conn->error;
  }

  $conn->close();
}
ob_end_flush(); 
?>
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
		
	
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
							<tr>

            <?php foreach ($cart as $product_id => $product) { ?>
              <td class="image" data-title="No"><img src="<?php echo $product['image'] ?>" alt="#"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="#"><?php echo $product['name'] ?></a></p>
									
								</td>
								<td class="price" data-title="Price"><span>Rp <?php echo number_format($product['price']) ?> </span></td>
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="100" value="<?php echo $product['quantity'] ?>">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div>
									<!--/ End Input Order -->
								</td>
								<td class="total-amount" data-title="Total"><span>Rp <?php echo number_format($product['price']) ?> </span></td>
								<td class="action" data-title="Remove"><a href="remove.php?product_id=<?php echo $product_id; ?>"><i class="ti-trash remove-icon"></i></a></td>
							</tr>
							
									<!--/ End Input Order -->
                  <?php } ?>


                  <tr>
								
                </tbody>
              </table>
              <!--/ End Shopping Summery -->
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <!-- Total Amount -->
              <div class="total-amount">
                <div class="row">
                  <div class="col-lg-8 col-md-5 col-12">
                    <div class="left">
                      <div class="coupon">
                        <form action="#" target="_blank">
                          <input name="Coupon" placeholder="Enter Your Coupon">
                          <button class="btn">Apply</button>
                        </form>
                      </div>
                    
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-7 col-12">
                    <div class="right">
                      <ul>
                        <li>Cart Subtotal<span>Rp <?php echo number_format($_SESSION['cart_details']['cart_total_price']  ) ; ?></span></li>
                        <li>Shipping<span>200</span></li>
                        <li>You Save<span>Rp0.00</span></li>
                        <li class="last">You Pay<span><?php echo number_format($_SESSION['cart_details']['cart_total_price'] + 200 ) ; ?></span></li>
                      </ul>
                      
                      <div class="button5">
                      <form id="checkoutForm" action="" method="POST">
  <!-- Add an ID to the button -->
  <button id="checkoutButton" type="submit" class="btn btn-danger" name="submit">Checkout</button></form>
                        <a href="index.php" class="btn">Continue shopping</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ End Total Amount -->
            </div>
          </div>
        </div>
      </div>
      <!--/ End Shopping Cart -->
          
      
      
      
<?php include 'footer.php'; ?>
<!-- Jquery -->
<script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="js/magnific-popup.js"></script>
	<!-- Fancybox JS -->
	<script src="js/facnybox.min.js"></script>
	<!-- Waypoints JS -->
	<script src="js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="js/nicesellect.js"></script>
	<!-- Ytplayer JS -->
	<script src="js/ytplayer.min.js"></script>
	<!-- Flex Slider JS -->
	<script src="js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="js/easing.js"></script>
	<!-- Active JS -->
	<script src="js/active.js"></script>
</body>
</html> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>   $(document).ready(function() {
        // Add event listener to the Checkout button
        $('#checkoutForm').on('submit', function() {
            // Show the preloader
            $('#preloader').show();
        });
    });

    // After your checkout process is complete (for example, in your PHP script)
    // Hide the preloader using JavaScript/jQuery
    // For demonstration purposes, this is a simulated delay
    setTimeout(function() {
        $('#preloader').hide();
    }, 2000); // Replace 2000 with the appropriate delay (in milliseconds)
</script>

</html>