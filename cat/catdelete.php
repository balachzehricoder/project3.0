<?php
function deleteCategory($categoryId) {
    // Connect to the database
   include 'config.php';
    // Prepare and execute the DELETE query
    $stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();

    // Close the connection
    $stmt->close();
    $conn->close();
}

?>