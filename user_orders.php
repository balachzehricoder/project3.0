<?php


session_start();
include 'config.php';




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


</head>
<style>
	.img {
		height: 50px;
	}
</style>

<body>
	<section class="section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 text-center ">
				</div>
			</div>
		</div>
		<div class="container">
			<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar">
				<div class="container">
					<a class="navbar-brand" href="index.php"><img class="img" src="phonesell.com_logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="fa fa-bars"></span> Menu
					</button>
					<div class="collapse navbar-collapse" id="ftco-nav">
						<ul class="navbar-nav ml-auto mr-md-3">
							<li class="nav-item active"><a href="index.php" class="nav-link">user managment</a></li>
							<li class="nav-item"><a href="#" class="nav-link">order history</a></li>

							<!-- <a href="profile.php"><i class="fa-solid fa-user"></i></a> -->
							<!-- <li> <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping">



					<?php
					//   $cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
					//   echo $cart_count;


					if (isset($_SESSION['cart_details']['cart_total_qty'])) {
						print_r($_SESSION['cart_details']['cart_total_qty']);
					} else {
						print_r(0);
					}
					?>
				   
				  </i>     </a>
                  </li>
				  <a href="logout.php"><button type="button" class="btn btn-danger">LOG OUT</button></a> -->


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



<?php


$user_id = $_SESSION["user_id"];

$query = "SELECT * FROM orders where user_id='$user_id' ";
$result = $conn->query($query);

?>

<div class="container">
	<div class="table-wrapper">
		<div class="table-title">
			<div class="row">
				<div class="col-sm-6">
					<h2>order <b>history</b></h2>
				</div>
				<style>
					body {
						color: #566787;
						background: #f5f5f5;
						font-family: 'Varela Round', sans-serif;
						font-size: 13px;
					}

					.table-wrapper {
						background: #fff;
						padding: 20px 25px;
						margin: 30px 0;
						border-radius: 3px;
						box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
					}

					.table-title {
						padding-bottom: 15px;
						background: #435d7d;
						color: #fff;
						padding: 16px 30px;
						margin: -20px -25px 10px;
						border-radius: 3px 3px 0 0;
					}

					.table-title h2 {
						margin: 5px 0 0;
						font-size: 24px;
					}

					.table-title .btn-group {
						float: right;
					}

					.table-title .btn {
						color: #fff;
						float: right;
						font-size: 13px;
						border: none;
						min-width: 50px;
						border-radius: 2px;
						border: none;
						outline: none !important;
						margin-left: 10px;
					}

					.table-title .btn i {
						float: left;
						font-size: 21px;
						margin-right: 5px;
					}

					.table-title .btn span {
						float: left;
						margin-top: 2px;
					}

					table.table tr th,
					table.table tr td {
						border-color: #e9e9e9;
						padding: 12px 15px;
						vertical-align: middle;
					}

					table.table tr th:first-child {
						width: 60px;
					}

					table.table tr th:last-child {
						width: 100px;
					}

					table.table-striped tbody tr:nth-of-type(odd) {
						background-color: #fcfcfc;
					}

					table.table-striped.table-hover tbody tr:hover {
						background: #f5f5f5;
					}

					table.table th i {
						font-size: 13px;
						margin: 0 5px;
						cursor: pointer;
					}

					table.table td:last-child i {
						opacity: 0.9;
						font-size: 22px;
						margin: 0 5px;
					}

					table.table td a {
						font-weight: bold;
						color: #566787;
						display: inline-block;
						text-decoration: none;
						outline: none !important;
					}

					table.table td a:hover {
						color: #2196F3;
					}

					table.table td a.edit {
						color: #FFC107;
					}

					table.table td a.delete {
						color: #F44336;
					}

					table.table td i {
						font-size: 19px;
					}

					table.table .avatar {
						border-radius: 50%;
						vertical-align: middle;
						margin-right: 10px;
					}

					.pagination {
						float: right;
						margin: 0 0 5px;
					}

					.pagination li a {
						border: none;
						font-size: 13px;
						min-width: 30px;
						min-height: 30px;
						color: #999;
						margin: 0 2px;
						line-height: 30px;
						border-radius: 2px !important;
						text-align: center;
						padding: 0 6px;
					}

					.pagination li a:hover {
						color: #666;
					}

					.pagination li.active a,
					.pagination li.active a.page-link {
						background: #03A9F4;
					}

					.pagination li.active a:hover {
						background: #0397d6;
					}

					.pagination li.disabled i {
						color: #ccc;
					}

					.pagination li i {
						font-size: 16px;
						padding-top: 6px
					}

					.hint-text {
						float: left;
						margin-top: 10px;
						font-size: 13px;
					}

					/* Custom checkbox */
					.custom-checkbox {
						position: relative;
					}

					.custom-checkbox input[type="checkbox"] {
						opacity: 0;
						position: absolute;
						margin: 5px 0 0 3px;
						z-index: 9;
					}

					.custom-checkbox label:before {
						width: 18px;
						height: 18px;
					}

					.custom-checkbox label:before {
						content: '';
						margin-right: 10px;
						display: inline-block;
						vertical-align: text-top;
						background: white;
						border: 1px solid #bbb;
						border-radius: 2px;
						box-sizing: border-box;
						z-index: 2;
					}

					.custom-checkbox input[type="checkbox"]:checked+label:after {
						content: '';
						position: absolute;
						left: 6px;
						top: 3px;
						width: 6px;
						height: 11px;
						border: solid #000;
						border-width: 0 3px 3px 0;
						transform: inherit;
						z-index: 3;
						transform: rotateZ(45deg);
					}

					.custom-checkbox input[type="checkbox"]:checked+label:before {
						border-color: #03A9F4;
						background: #03A9F4;
					}

					.custom-checkbox input[type="checkbox"]:checked+label:after {
						border-color: #fff;
					}

					.custom-checkbox input[type="checkbox"]:disabled+label:before {
						color: #b8b8b8;
						cursor: auto;
						box-shadow: none;
						background: #ddd;
					}

					/* Modal styles */
					.modal .modal-dialog {
						max-width: 400px;
					}

					.modal .modal-header,
					.modal .modal-body,
					.modal .modal-footer {
						padding: 20px 30px;
					}

					.modal .modal-content {
						border-radius: 3px;
					}

					.modal .modal-footer {
						background: #ecf0f1;
						border-radius: 0 0 3px 3px;
					}

					.modal .modal-title {
						display: inline-block;
					}

					.modal .form-control {
						border-radius: 2px;
						box-shadow: none;
						border-color: #dddddd;
					}

					.modal textarea.form-control {
						resize: vertical;
					}

					.modal .btn {
						border-radius: 2px;
						min-width: 100px;
					}

					.modal form label {
						font-weight: normal;
					}
				</style>
				<div class="col-sm-6">


				</div>
				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
				<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
			</div>
		</div>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>total</th>
					<th>delivery charges</th>
					<th>order datetime</th>
					<th>status</th>
					<th>View</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if ($result->num_rows > 0) {
					foreach ($result as $row) {
				?>

						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['total']; ?></td>
							<td><?php echo $row['delivery_charges']; ?></td>
							<td><?php echo $row['order_date_time']; ?></td>
							<td><?php echo $row['status']; ?></td>
							<td><a href="order_details.php?id=<?php echo $row['id']; ?>">View Details</a></td>
						</tr>

				<?php
					}
				}
				?>
			</tbody>
		</table>
	</div>
</div>