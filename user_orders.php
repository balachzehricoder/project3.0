<?php


session_start();
include 'config.php';




?>

<?php


$user_id = $_SESSION["user_id"];

$query = "SELECT * FROM orders where user_id='$user_id' ";
$result = $conn->query($query);

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
    <link rel="icon" href="logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
<a href="user_orders.php">order details</a>     <a href="profile.php">back</a>


<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-md-6">
                    <h2>order <b>history</b></h2>
                </div>
                <div class="col-md-6">
                    <!-- Add any additional content for this column if needed -->
                </div>
            </div>
        </div>
        <div class="table-responsive">
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
</div>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
