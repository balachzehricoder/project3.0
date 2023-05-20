<?php
session_start();
// Get the product ID from the URL.
$product_id = $_GET['product_id'];

// Remove the product from the cart.
unset($_SESSION['cart'][$product_id]);

// Redirect the user to the cart page.
header('Location: cart.php');

?>