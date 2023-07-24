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


?>