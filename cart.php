<style>.img{height: 40px;}</style>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<body>
<?php
session_start();

// Check if the cart is empty.
if (empty($_SESSION['cart'])) {
  echo 'Your cart is empty.';
  header("Location: index.php");
  exit;
}

$cart = $_SESSION['cart'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Cart</title>
  <!-- Add your CSS stylesheets if needed -->
</head>
<body>
<?php foreach ($cart as $product_id => $product) { ?>
  <div class="col-12">
<img class="img" src="<?php echo $product['image'] ?>" alt="">
    <input type="text" disabled value="<?php echo $product['name']  ?>">
    <input type="text" disabled value="<?php echo $product['price']  ?>">
    <!-- <input type="text"  value="<?php echo $product['qty']  ?>"> -->
    <!-- <input type="text" value="<?php echo $product['tax'] ?>"> -->
<a class="btn btn-danger" href="remove.php?product_id=<?php echo $product_id; ?>">Remove</a>



  </div>


    
      <?php } ?>
    </tbody>
  </table>

  <!-- <p>Total: $<?php echo number_format(array_sum(array_column($cart, 'price')), 2); ?></p> -->
<!-- 
  <a href="checkout.php">Checkout</a>
  <a href="index.php">Return to Home</a> -->
</body>
</html>
