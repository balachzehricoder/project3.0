<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phonesell.com</title>

    <!-- Include Bootstrap and other stylesheets -->
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen" />
    <link href="themes/css/base.css" rel="stylesheet" media="screen" />
    <link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet" />

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="icon" href="logo.png">

    <style>
        .img {
            height: 100px;
        }
    </style>
</head>
<body>

<!-- Include the navbar from navandside.php -->
<?php include 'navandside.php'; ?>

<!-- Display the products for the selected category using Bootstrap cards -->
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="well well-small">
                <h4>Our Products</h4>
                <ul class="thumbnails product">
                    <?php
                    $query = "SELECT * FROM products";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        foreach ($result as $row) {
                            $p_name = $row['p_name'];
                            $p_price = number_format($row['p_price']); // Format the price
                            $img_upload = $row['img_upload'];
                            $product_id = $row['id']; // Assuming the ID field is named 'id'

                            // Escape output for security
                            $escaped_p_name = htmlspecialchars($p_name, ENT_QUOTES, 'UTF-8');
                            ?>
                            <li class="col-md-3 col-sm-6 col-xm-6 col-lg-3 ">
                                <div class="thumbnail product">
                                    <a href="full_page.php?id=<?php echo $product_id; ?>"><img class="img" src="<?php echo $img_upload; ?>" alt="" /></a>
                                    <div class="caption">
                                        <h5><?php echo $escaped_p_name; ?></h5>
                                        <h5> Rs <?php echo $p_price; ?></h5>
                                        <h4 style="text-align:center">
                                            <a class="btn" href="wishlist.php?id=<?php echo $product_id; ?>"><i class="icon-heart"></i></a>
                                            <a class="btn  " href="add-to-cart.php?id=<?php echo $product_id; ?>">Add to <i class="icon-shopping-cart"></i></a>
                                           
                                            


                                        </h4>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                    }



                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- Include Bootstrap and other JavaScript libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
