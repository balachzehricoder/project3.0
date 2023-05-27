<?php
// Retrieve order data from the database based on $order_id
// Replace this code with your database query or logic to fetch order details

$product_id = $_GET['id']; // Assuming you are passing the order ID as a query parameter

// Connect to your database
include 'config.php';
if (!$conn) {
  echo die("conn failed" . mysqli_connect_errno());
}

// Fetch the order data from the database
$sql = "SELECT * FROM ORDERS WHERE order_id = '$product_id'";
$result = $conn->query($sql);

// Check if the order exists
if ($result->num_rows > 0) {
  $order = $result->fetch_assoc();

  // Retrieve the order details
  $order_number = $order['order_number'];
  $date = $order['date'];
  $terms = $order['terms'];

  // Retrieve the items associated with the order
  $items = array();
  $itemSql = "SELECT * FROM ORDER_ITEMS WHERE order_id = '$product_id'";
  $itemResult = $conn->query($itemSql);
  while ($item = $itemResult->fetch_assoc()) {
    $items[] = $item;
  }

  // Retrieve the subtotal, tax, shipping, and total
  $subtotal = $order['subtotal'];
  $tax = $order['tax'];
  $shipping = $order['shipping'];
  $total = $order['total'];
} else {
  // Handle case where order does not exist
  echo "Order not found.";
  exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Invoice</title>
  <link rel="stylesheet" href="style.scss">
</head>
<body>
  <header>
    <h1>Invoice</h1>
    <address>
      <p>John Doe</p>
      <p>123 Main Street</p>
      <p>Anytown, CA 12345</p>
      <p>(123) 456-7890</p>
    </address>
  </header>
  <article>
    <h1>Recipient</h1>
    <address>
      <p>Jane Doe</p>
      <p>456 Elm Street</p>
      <p>Anytown, CA 54321</p>
      <p>(555) 678-9012</p>
    </address>
    <table class="meta">
      <tr>
        <th>Invoice Number</th>
        <td><?php echo $order_number; ?></td>
      </tr>
      <tr>
        <th>Date</th>
        <td><?php echo $date; ?></td>
      </tr>
      <tr>
        <th>Terms</th>
        <td><?php echo $terms; ?></td>
      </tr>
    </table>
    <table class="items">
      <thead>
        <tr>
          <th>Item</th>
          <th>Description</th>
          <th>Quantity</th>
          <th>Unit Price</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($items as $item) { ?>
          <tr>
            <td><?php echo $item['item']; ?></td>
            <td><?php echo $item['description']; ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td><?php echo $item['unit_price']; ?></td>
            <td><?php echo $item['total']; ?></td>
          </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="4">Subtotal</th>
          <td><?php echo $subtotal; ?></td>
        </tr>
        <tr>
          <th colspan="4">Tax</th>
          <td><?php echo $tax; ?></td>
        </tr>
        <tr>
          <th colspan="4">Shipping</th>
          <td><?php echo $shipping; ?></td>
        </tr>
        <tr>
          <th colspan="4">Total</th>
          <td><?php echo $total; ?></td>
        </tr>
      </tfoot>
    </table>
    <p>Payment due within 30 days of invoice date.</p>
  </article>
</body>
</html>
