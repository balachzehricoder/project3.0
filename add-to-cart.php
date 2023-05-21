<?php
session_start();
include 'config.php';

// Check if the product ID is provided.
if (!isset($_GET['id'])) {
  echo 'Product ID not specified.';
  exit;
}

// Retrieve the product ID.
$product_id = $_GET['id'];

// Check if the product exists in the database.
$query = "SELECT * FROM products WHERE id = '$product_id'";
$result = $conn->query($query);

if ($result->num_rows === 0) {
  echo 'Product not found.';
  exit;
}

// Retrieve the product details.
$product = $result->fetch_assoc();
$p_name = $product['p_name'];
$p_price = $product['p_price'];
$p_qty = $product['p_qty'];

$img_upload = $product['img_upload'];


// Add the product to the cart.
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}

if (!isset($_SESSION['cart'][$product_id])) {
  $_SESSION['cart'][$product_id] = array(
    'name' => $p_name,
    'price' => $p_price,
    'quantity' => 1,
    'image' => $img_upload

  );
} else {
  $_SESSION['cart'][$product_id]['quantity']++;
}

// Redirect the user back to the main page.
header('Location: index.php');
?>
