<?php

function getCategoryById($categoryId) {
    // Connect to the database
    include 'config.php';
    // Prepare and execute the SELECT query
    $stmt = $conn->prepare("SELECT * FROM categories WHERE id = ?");
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    // Close the connection
    $stmt->close();
    $conn->close();

    return $result;
}





?>