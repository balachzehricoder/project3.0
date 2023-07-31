<?php
session_start();

// functions.php

function getAllCategories() {
    include 'config.php';
    $query = "SELECT * FROM categories";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return array();
    }
}


// funcation.php
// ...


// funcation.php
// ...

function searchProducts($search_query) {
    global $conn;

    // Prepare the search query
    $search_query = '%' . $search_query . '%';

    // Fetch products that match the search query
    $query = "SELECT * FROM products WHERE p_name LIKE ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $search_query);
    $stmt->execute();
    $result = $stmt->get_result();

    $products = array();
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // Close the statement
    $stmt->close();

    return $products;
}



?>