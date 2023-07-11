<?php

session_start();

// if not logged in cant see this page
if (!isset($_SESSION["user_id"])) {
  header("Location: login.php");
  exit();
}


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
              <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
              <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
              <li class="nav-item"><a href="#" class="nav-link">About</a></li>
              <li class="nav-item"><a href="#" class="nav-link">Privecy Policy</a></li>

              <!-- <li> <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping">



					<?php
          $cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
          echo $cart_count;


          // print_r($_SESSION['cart_details']['cart_total_qty']);
          ?>
				   
				  </i>     </a>
                  </li>
				  <a href="logout.php"><button type="button" class="btn btn-danger">LOG OUT</button></a>

				  -->
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


    // emails

    header("Location: invoice.php?order_id=" . $order_id);
    exit;
  } else {
    echo "Error: $sql <br> " . $conn->error;
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
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12 col-sm-12  cart">
        <h1 class="empty">Your Cart</h1>
        <table class="table">
          <thead>
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($cart as $product_id => $product) { ?>
              <tr>
                <td><img class="img" src="<?php echo $product['image']; ?>" alt="Sorry, it is not available yet"></td>
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
        <br><br><br>
        <h3 class="total">Total: <?php echo $_SESSION['cart_details']['cart_total_price']; ?></h3>
      </div>
     
        <!-- <form action="" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Phone</label>
            <input type="phone" name="phone" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Payment</label>
            <br>
            <select name="payment" id="">
              <optgroup>
                <option value="visa">Visa</option>
                <option value="master card">Master Card</option>
                <option value="online banking">Online Banking</option>
                <option value="cash on delivery">Cash on Delivery</option>
              </optgroup>
            </select>
          </div>



        </form> -->

        <form action="" method="POST">
          <button type="submit" class="btn btn-danger" name="submit">Checkout</button>
        </form>
        <!-- <a href="config_cart.php?product_id=<?php echo $product_id; ?>" type="submit" name="submit" class="btn btn-danger">checkout</a> -->

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>