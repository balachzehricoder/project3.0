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

if (isset($_GET['quantity'])) {
  $p_qty = $_GET['quantity'];
}

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
$img_upload = $product['img_upload'];

// Add the product to the wishlist.
if (!isset($_SESSION['wish'])) {
  $_SESSION['wish'] = array();
}

if (!isset($_SESSION['wish'][$product_id])) {
  $_SESSION['wish'][$product_id] = array(
    'name' => $p_name,
    'price' => $p_price,
    'quantity' => isset($p_qty) ? $p_qty : 1,
    'image' => $img_upload,
    'price_total' => $p_price * (isset($p_qty) ? $p_qty : 1)
  );
} else {
  if (isset($p_qty)) {
    $_SESSION['wish'][$product_id]['quantity'] = $p_qty;
  } else {
    $_SESSION['wish'][$product_id]['quantity']++;
  }
  $_SESSION['wish'][$product_id]['price_total'] = $p_price * $_SESSION['wish'][$product_id]['quantity'];
}

// Calculate wishlist totals.
$_SESSION['wish_details']['wish_total_price'] = 0;
$_SESSION['wish_details']['wish_total_qty'] = 0;

foreach ($_SESSION['wish'] as $prod_id => $prod) {
  $_SESSION['wish_details']['wish_total_price'] += $prod['price_total'];
  $_SESSION['wish_details']['wish_total_qty'] += $prod['quantity'];
}

// Redirect the user back to the main page.
header('Location: category.php');
?>
