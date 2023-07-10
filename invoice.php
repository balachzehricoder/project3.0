<?php
include 'config.php';


$orderid = $_GET['orderid'];




?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>invoice</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
			width: 800px;
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
			/* min-height: 50px; */
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

	<div class="invoice-wrap">
		<div class="invoice-box">
			<div class="invoice-header">
				<div class="logo text-center">
					<a href="#"><span class="ion-ios-arrow-back"></span> &nbsp;Go to Orders History</a>
				</div>
			</div>
			<h4 class="text-center mb-5 weight-600"> invoice iD : <?php echo $orderid ?> <strong class="weight-600"></strong></h4>
			<div class="row pb-5 invoice_details_text">
				<div class="col-md-6">
				</div>
				<div class="col-md-6">
					<div class="text-right">
						<p class=""><strong>phonesell.com</strong></p>
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
						<li class="clearfix">

						<?php 
$query = "SELECT * FROM order_details where order_id='$orderid' ";
$result = $conn->query($query);
if($result->num_rows > 0){
    foreach($result as $row){
        $product = $row['name'];
        $product = $row['price'];
        $product = $row['quantity'];
?>



 ?>
							
						
						<li class="clearfix">
							<div class="invoice-sub">Logo Design</div>
							<div class="invoice-rate">PKR 20</div>
							<div class="invoice-hours">100</div>
							<div class="invoice-subtotal"><span class="weight-600">PKR 2000</span></div>
						</li>
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
									<p class="font-14 mb-5"><strong class="weight-600">PKR 120.00</strong></p>
								</div>
								<div class="invoice-rate font-20 weight-600">PKR 199.00</div>
								<div class="invoice-subtotal main_total"><span class="weight-600 font-24">PKR 319.00</span></div>
							</li>
						</ul>
					</div>
				</div>
				<h4 class="text-center">Thank You for shopping from phonesell.com</h4>
			</div>

		</div>
	</div>

</body>
<?php }}?>
</html>