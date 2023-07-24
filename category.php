<?php
// category.php
session_start();

// Check if the category ID parameter is set in the URL
if (isset($_GET['id'])) {
    // Get the category ID from the URL
    $category_id = $_GET['id'];

    // Connect to the database (Replace "hostname", "username", "password", and "database_name" with your actual database credentials)
    include 'config.php';
    // Check the connection
    // ...

    // Fetch the category details from the database
    $category_query = "SELECT * FROM categories WHERE id = ?";
    $stmt = $conn->prepare($category_query);
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $category = $result->fetch_assoc();

    // Fetch the products for the selected category from the database
    $products_query = "SELECT * FROM products WHERE category_id = ?";
    $stmt = $conn->prepare($products_query);
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
} else {
    // If the category ID parameter is not set, redirect to the index.php or any other desired page
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $category['name']; ?> Products</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        .card {
            margin: 20px;
        }
    </style>
</head>
<body>
    <!-- Include the navbar from navs2.php -->
    <?php include 'navs2.php'; ?>

    <!-- Display the products for the selected category using Bootstrap cards -->
    <div class="container mt-4">
        <h1><?php echo $category['name']; ?> Products</h1>
        <div class="row">
            <?php while ($product = $result->fetch_assoc()) { ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="<?php echo $product['img_upload']; ?>" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['p_name']; ?></h5>
                            <p class="card-text">Price: <?php echo $product['p_price']; ?> Rp</p>
                            <p class="card-text">Stock: <?php echo $product['p_qty']; ?></p>
                            <a href="add-to-cart.php?id=<?php echo $product['id']; ?>" class="btn btn-danger">Add to Cart</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Bootstrap JS (Make sure to include jQuery and Popper.js before this) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
