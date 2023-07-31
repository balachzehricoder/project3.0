<?php
        include 'navs1.php';
        ?>


<br>


<style>
    .edit{
        font: bolder;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-display: unset;
        color: red;
        text-align: center;
        font-size: xx-large;
        font-variant: initial;
        font-variant-position: super;
        text-decoration: double;
        text-shadow: 3cm;
        text-decoration-color: red;
        font-language-override: initial;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Display the products -->
<div class="container">
    <div class="row">
        <?php
        include 'config.php';
        include 'funcation.php';

        // Check if the search query is set and not empty
        if (isset($_GET['q']) && !empty($_GET['q'])) {
            // Perform the search
            $search_query = $_GET['q'];
            $products = searchProducts($search_query);

            // Check if the products array is empty after search
            if (empty($products)) {
                echo '<div class="col-12 edit"><p class="text-danger">No products found for the search query: </p></div>';
            }
        } else {
            // Fetch all products
        }

        foreach ($products as $product) {
            // Display product details (you can use Bootstrap cards or any other format here)
        ?>
            <a href="full_page.php?id=<?php echo $product['id']; ?>">
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card main" style="width: 18rem;">
                        <img src="<?php echo $product['img_upload']; ?>" class="card-img-top carimg" alt="Product Image">
                        <div class="card-body">
                            <p class="card-title text">Name: <?php echo $product['p_name']; ?></p>
                            <p class="card-text text">Price: <?php echo $product['p_price']; ?> Rp</p>
                            <a href="add-to-cart.php?id=<?php echo $product['id']; ?>" class="btn btn-danger">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </a>
        <?php
        }
        ?>
    </div>
</div>
