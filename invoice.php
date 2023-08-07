<?php
session_start();

include 'config.php';
include 'navs.php';
$id = $_SESSION["user_id"];
$query = "SELECT * FROM users where id='$id' ";
$result = $conn->query($query);
if($result->num_rows > 0){
    foreach($result as $row){
        $full_name = $row['full_name'];
        $email = $row['email'];
        $phone = $row['phone'];
		$address = $row['address'];



?>

<?php
							}
						}
						?>




<?php

// Get the order ID from the cart page

$order_id = $_GET['order_id'];

// Retrieve order details from the database
$query = "SELECT * FROM orders WHERE id = '$order_id'";
$orders = $conn->query($query);
$orders = mysqli_fetch_assoc($orders);

// Retrieve order details from the database
$query = "SELECT od.*, p_name FROM order_details od JOIN products p ON od.product_id = p.id WHERE od.order_id = '$order_id'";
$result = $conn->query($query);


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Invoice</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/20034a5f5a.js" crossorigin="anonymous"></script>

	<style>
		.invoice-wrap {
			overflow: auto;
		}

		.invoice-wrap ul li {
			list-style-type: none !important;
			color: black !important;
		}

		.invoice-box {
			background: #f9fdf8;
			width: 100%;
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
			border: 1px solid #4cbb17;
			border-radius: 20px;
		}

		.invoice-header {
			padding-bottom: 30px;
		}

		.invoice-desc .invoice-sub {
			width: 40%;
			float: left;
			padding: 8px 15px;
		}

		.invoice-desc .invoice-hours,
		.invoice-desc .invoice-rate {
			width: 20%;
			float: left;
			padding: 8px 15px;
		}

		.invoice-desc .invoice-subtotal {
			width: 20%;
			float: right;
			padding: 8px 15px;
		}

		.invoice-desc .invoice-desc-head {
			background: #4cbb17;
			font-weight: 500;
			color: black;
		}

		.invoice-desc .invoice-desc-body {
			padding-top: 15px;
			min-height: 300px;
		}

		.invoice-desc .invoice-desc-footer .invoice-desc-body {
			padding-bottom: 0;
		}

		.invoice_details_text {
			color: black;
			line-height: 8px;
		}

		.invoice-desc .invoice-desc-body ul li {
			border-bottom: 1px solid #4cbb17;
			padding-bottom: 5px;
		}
	</style>
</head>

<body class="goto-here">

	<div class="container">
		<div class="invoice-wrap mb-5">
			<div class="invoice-box">
				<div class="invoice-header">
					<div class="logo text-center">
						<a href="user_orders.php"><span class="ion-ios-arrow-back"></span> &nbsp;Go to Orders History</a>
					</div>
				</div>
				<h4 class="text-center mb-5 font-weight-600">Invoice ID: <?php echo $order_id ?></h4>
				<h4 class="text-center mb-5 font-weight-600">USER NAME: <?php echo $full_name ?></h4>

				<div class="row pb-5 invoice_details_text">
					<div class="col-md-6">
					</div>
					<div class="col-md-6">
						<div class="text-right">
							<p class="mb-3">Address: <strong><?php echo $address ?></strong></p>
							<p class="mb-3">Email: <strong><?php echo $email ?></strong></p>
							<p class="mb-3">Phone: <strong><?php echo $phone ?></strong></p>
						</div>
					</div>
				</div>
				<div class="invoice-desc">
					<div class="invoice-desc-head clearfix">
						<div class="invoice-sub">Product Name</div>
						<div class="invoice-rate">Unit Price</div>
						<div class="invoice-hours">Quantity</div>
						<div class="invoice-subtotal">Subtotal</div>
					</div>
					<div class="invoice-desc-body">
						<ul>
							<?php
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									$p_name = $row['p_name'];
									$price = $row['price'];
									$qty = $row['qty'];
									$subtotal = $price * $qty;
							?>
									<li class="clearfix">
										<div class="invoice-sub"><?php echo $p_name; ?></div>
										<div class="invoice-rate">PKR <?php echo number_format($price); ?></div>
										<div class="invoice-hours"><?php echo $qty; ?></div>
										<div class="invoice-subtotal"><span class="font-weight-600">PKR <?php echo number_format($subtotal); ?></span></div>
									</li>
							<?php
								}
							}
							?>
						</ul>
					</div>
					<div class="invoice-desc-footer">
					<div class="invoice-desc-head clearfix">
						<div class="invoice-sub">Sub-Total</div>
                            <div class="invoice-rate">Shipping Cost</div>
                            <div class="invoice-subtotal">Total</div>
					</div>
					<div class="invoice-desc-body">
						<ul>
							<li class="clearfix">
								<div class="invoice-sub">
									<p class="font-14 mb-5"><strong class="weight-600">PKR <?php echo number_format($orders["total"]); ?></strong></p>
								</div>
								<div class="invoice-rate font-20 weight-600">PKR <?php echo number_format($orders["delivery_charges"]); ?></div>
								<div class="invoice-subtotal main_total"><span class="weight-600 font-24">PKR <?php echo number_format($orders["delivery_charges"] + $orders["total"]); ?></span></div>
							</li>
						</ul>
					</div>
				</div>
				</div>
				<div class="text-center mt-4">
					<i class="fas fa-print" onclick="window.print()"></i>
				</div>
				<h4 class="text-center mt-5">Thank You for shopping <?php echo $full_name ?> from phonesell.com</h4>
			</div>
		</div>
	</div>

</body>

</html>
