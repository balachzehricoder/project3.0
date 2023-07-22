<?php
function updateCategory($categoryId, $name, $description) {
    // Connect to the database
include 'config.php';
    // Prepare and execute the UPDATE query
    $stmt = $conn->prepare("UPDATE categories SET name = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $description, $categoryId);
    $stmt->execute();

    // Close the connection
    $stmt->close();
    $conn->close();
}

?>