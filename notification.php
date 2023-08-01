<?php
// Set the appropriate headers for server-sent events
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header('Connection: keep-alive');

// Your database connection and other necessary includes
include 'config.php';
include 'funcation.php';

// Function to fetch new orders from the database (implement as per your database schema)
function getNewOrders($conn) {
    // Query to fetch new orders with status 'new'
    $query = "SELECT * FROM orders WHERE status = 'new'";
    // Execute the query
    $result = mysqli_query($conn, $query);
    // Fetch the results as an array of associative arrays
    $newOrders = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $newOrders;
}

// Send notification to the admin panel for new orders
function sendNewOrderNotification($order) {
    $data = json_encode($order);
    echo "data: $data\n\n";
    flush();
}

// Set an initial ping to keep the connection alive
echo ":\n\n";
flush();

// Infinite loop to listen for new orders and send notifications
while (true) {
    $newOrders = getNewOrders($conn); // Assuming you have $conn as your database connection variable
    if (!empty($newOrders)) {
        foreach ($newOrders as $order) {
            sendNewOrderNotification($order);
        }
    }
    // Sleep for a while to avoid continuous checks
    sleep(5); // You can adjust the interval (in seconds) as per your requirements
}
?>
