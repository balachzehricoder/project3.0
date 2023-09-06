<?php
session_start();
include 'config.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION["user_id"];
$query = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    foreach ($result as $row) {
        $full_name = $row['full_name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>user management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="phonesell.com_logo.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/20034a5f5a.js" crossorigin="anonymous"></script>
</head>
<body>
<a href="user_orders.php">order details</a>     <a href="index.php">back</a>


<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-12">
                    <h2>Manage <b>User</b></h2>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                    </span>
                </th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                        <label for="checkbox1"></label>
                    </span>
                </td>
                <td><?php echo $id ?></td>
                <td><?php echo $full_name ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $address ?></td>
                <td><?php echo $phone ?></td>
                <td>
                    <a href="profileedit.php?id=<?php echo $id; ?>">Edit Profile</a>
                </td>
            </tr>
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
