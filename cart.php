<?php
session_start();

// Check if the cart is empty.
if (empty($_SESSION['cart'])) {
  echo 'Your cart is empty.';
}

// Get the cart contents.
$cart = $_SESSION['cart'];

// Display the cart contents.
foreach ($cart as $product_id => $product) {
  echo '<li>
    <h3>' . $product['name'] . '</h3>
    <p>' . $product['price'] . '</p>
    <img src="' . $product['image'] . '">
    <p><a href="remove.php?product_id=' . $product_id . '">Remove</a></p>
  </li>';
}

// Display the total price.
echo '<p>Total: ' . number_format(array_sum(array_column($cart, 'price')), 2) . '</p>';
?>

<a href="index.php">Return back to home</a>
