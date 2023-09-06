<?php
session_start();
include 'config.php';

$id = $_GET["id"];
$query = "SELECT od.id, o.user_id, u.full_name, p.img_upload, p.p_name, od.product_id, od.price, od.qty
FROM order_details od
JOIN orders o ON od.order_id = o.id
JOIN users u ON o.user_id = u.id
JOIN products p ON od.product_id = p.id
WHERE od.order_id = ?";



$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Order Details</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/20034a5f5a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="phonesell.com_logo.png">
</head>
<body>
  <a href="user_orders.php">order details</a>     <a href="profile.php">back</a>


    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Order Details</h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['p_name']; ?></td>
                                <td><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['full_name']; ?></td>
                                <td><img height="50px" src="<?php echo $row['img_upload']; ?>" alt="User Image" class="img"></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['qty']; ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
