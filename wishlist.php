<?php
include 'config.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Insert the product into the user's wishlist
        $insert_query = "INSERT INTO wishlist (user_id, product_id) VALUES ($user_id, $product_id)";
        mysqli_query($conn, $insert_query);

        // Redirect back to the main page
        header("Location: category.php");
        exit();
    } else {
        // Check if the wishlist cookie is already set
        $wishlist = isset($_COOKIE['wishlist']) ? unserialize($_COOKIE['wishlist']) : array();

        // Add the product ID to the wishlist array
        if (!in_array($product_id, $wishlist)) {
            $wishlist[] = $product_id;
            // Store the updated wishlist array in the cookie
            setcookie('wishlist', serialize($wishlist), time() + (3600 * 24 * 30), '/');

            // Redirect back to the main page
            header("Location: category.php");
            exit();
        }
    }
}
?>