<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<style>
  .empty{
    color: red; align-items: center; font: 200;font-variant-caps: petite-caps;font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;font-weight: bold;
  }
  .img{
    height: 50px;
  }
</style>
<?php
session_start();

// Check if the cart is empty.
if (empty($_SESSION['cart'])) {
  echo '<center><h1 class="empty">Your Cart is Empty.</h1></center>';
  echo '<br>';
  echo '<center><a class="btn btn-danger" href="index.php">Return to home</a></center>';
  exit;
}

$cart = $_SESSION['cart'];

$insert = false;
if (isset($_POST['submit'])) {
  include 'config.php';
  if (!$conn) {
    echo die("conn failed" . mysqli_connect_errno());
  }

  foreach ($cart as $product_id => $product) {
    $name = $product['name'];
    $price = $product['price'];
    $qty = $product['quantity'];
    $total = $product['price'] * $product['quantity'];

    $sql = "INSERT INTO ORDERS (name, price, qty, total) VALUES ('$name', '$price', '$qty', '$total')";

    if ($conn->query($sql) == true) {
      $insert = true;
    } else {
      echo "Error: $sql <br> $conn->error";
    }
  }

  $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th>img</th>
      <th>Name</th>
      <th>Price</th>
      <th>Qty</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cart as $product_id => $product) { ?>
    <tr>
      <td><img class="img" src="<?php echo $product['image']; ?>" alt="sorry it avaliable yet"></td>
      <td><?php echo $product['name']; ?></td>
      <td><?php echo $product['price']; ?></td>
      <td><?php echo $product['quantity']; ?></td>
      <td>
        <a class="btn btn-danger" href="remove.php?product_id=<?php echo $product_id; ?>">Remove</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<form action="" method="post">
  <a  class="btn btn-danger"  type="submit" name="submit" href="order_config.php?product_id=<?php echo $product_id; ?>">Check</a>

</form>

<br><br><br>
<h3 class="total">Total: <?php echo $_SESSION['cart_details']['cart_total_price']; ?></h3>
</body>
</html>
