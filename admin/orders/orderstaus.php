<?php
// Step 1: Connect to the database
include 'config.php';

// Step 2: Get the ID from request parameters
$id = $_GET["id"];

// Step 3: Update the status in the database
$status = "delivered"; // Set the status as "delivered"
$sql = "UPDATE orders SET status = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $status, $id);
$stmt->execute();

// Step 4: Redirect back to the list of records or show a confirmation message
header("Location: ordersindex.php");
exit();
?>
