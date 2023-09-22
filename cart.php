
<?php
session_start(); 
// include 'navs.php'
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
<!-- mail and invoice work -->
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

include 'navandside.php' ;

?>
<style>
    #preloader {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: rgba(0,0,0,0.5);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .spinner {
        border: 16px solid #f3f3f3;
        border-top: 16px solid #3498db;
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }
    @media (max-width: 768px) {
      #preloader {
            justify-content: center; /* Align to the right */
        }
        .spinner {
            width: 60px;
            height: 60px;
        }
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
<!-- end of mail and invoice work -->
		<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
    </head>
    <style>
      .empty{
        color: red;
	font: 600;
	font-weight: 500;
	font-display: initial;
	font-style: oblique;
	font-variant: small-caps;
	text-decoration: dotted;
	text-align: center;
	text-transform: uppercase;
	text-decoration-color: red;
        
      }
    </style>
    <body>
    <div id="preloader">
    <div class="spinner"></div>
</div>
   
<div class="span9">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Quantity/Update</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $product_id => $product) { ?>
                    <tr>
                        <td> <img width="60" src="<?php echo $product['image']; ?>" alt=""/></td>
                        <td><?php echo $product['name']; ?><br/>Color : black, Material : metal</td>
                        <td>
                            <div class="input-append">
                                <input class="span1" style="max-width:34px" placeholder="<?php echo $product['quantity'] ?>" id="appendedInputButtons" size="16" type="text">
                                <button class="btn" type="button"><i class="icon-minus"></i></button>
                                <button class="btn" type="button"><i class="icon-plus"></i></button>
                                <a href="remove.php?product_id=<?php echo $product_id; ?>" class="btn btn-danger" role="button">
                                    <i class="icon-remove icon-white"></i> Remove
                                </a>
                            </div>
                        </td>
                        <td>Rp<?php echo number_format($product['price']); ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="6" style="text-align:right">Total Price:</td>
                    <td> Rp<?php echo number_format( $_SESSION['cart_details']['cart_total_price']); ?></td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:right">Total Discount:</td>
                    <td> Rp00.00</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:right">Total Tax:</td>
                    <td> Rp31.00</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:center"><strong>TOTAL  =</strong></td>
                    <td class="label label-important" style="display:block"> <strong> (Rp<?php  echo number_format($_SESSION['cart_details']['cart_total_price'] ) ; ?>) </strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<form id="checkoutForm" action="" method="POST">
  <!-- Add an ID to the button -->
  <button id="checkoutButton"type="submit"  class="btn btn-danger" name="submit">Checkout</button></form>

								

                
                    

      
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>   
    $(document).ready(function() {
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
    }, 1000); // Replace 2000 with the appropriate delay (in milliseconds)
</script>
  </body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>