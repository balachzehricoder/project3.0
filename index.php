<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>Eshop</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- StyleSheet -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
    <!-- Slicknav -->
    <!-- <link rel="stylesheet" href="css/slicknav.min.css"> -->

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <style>
        .product-wrapper {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            /* To ensure cards wrap to the next line if there are too many */
            justify-content: space-between;
            /* To evenly space the cards */
        }

        /* Optional: Add some margin to the cards for spacing */
        .single-product {
            margin-bottom: 20px;
        }

        .img {
            height: 350px;
        }

        /* Responsive Styles */
        @media screen and (max-width: 767px) {
            .product-wrapper {
                justify-content: center;
            }

            .single-product {
                width: 100%;
                max-width: 250px;
                margin: 0 10px;
            }

            .img {
                height: auto;
            }
        }
    </style>
</head>

<body class="js">

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- End Preloader  -->

    <!-- Header -->
    <?php
    include 'navs.php'
    ?>
    <!-- End Small Banner -->

    <!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>phonesell.com</h2>
                    </div>
                </div>
            </div>
            <div class="row product-wrapper">
                <?php
                $query = "SELECT * FROM products";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    foreach ($result as $row) {
                        $p_name = $row['p_name'];
                        $p_price = $row['p_price'];
                        $p_tax = $row['p_tax'];
                        $p_qty = $row['p_qty'];
                        $img_upload = $row['img_upload'];

                        $p_price = number_format($p_price);

                ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img img" src="<?php echo $img_upload ?>" alt="<?php echo $p_name ?>">
                                    <!-- <img class="hover-img img" src="<?php echo $img_upload ?>" alt="<?php echo $p_name ?>"> -->
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <!-- <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=""></i><span></span></a>
                                        <a title="Wishlist" href="#"><i class=""></i><span></span></a>
                                        <a href="add-to-cart.php?id=<?php echo $row['id']; ?>"><i class=""></i><span</span></a> -->
                                    </div>
                                  
                                </div>
                            </div>
                            <br>
                            <div class="product-action-2">
                                        <a class="btn btn-danger" title="Add to cart" href="add-to-cart.php?id=<?php echo $row['id']; ?>">Add to cart</a>
                                    </div>
                            <div class="product-content">
                                <h3><a href="product-details.html"><?php echo $p_name ?></a></h3>
                                <div class="product-price">
                                    <span>Rs<?php echo $p_price ?></span>
                                </div>
                            </div>
                        </div>

                <?php }
                } ?>
            </div>
            <!-- End Product Wrapper -->
        </div>
        <!-- End Container -->
    </div>
    <!-- End Product Area -->

    <!-- Start Footer Area -->
    <?php include 'footer.php' ?>
    <!-- /End Footer Area -->

    <!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <!-- Popper JS -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Color JS -->
    <script src="js/colors.js"></script>
    <!-- Slicknav JS -->
    <!-- <script src="js/slicknav.min.js"></script> -->
    <!-- Owl Carousel JS -->
    <script src="js/owl-carousel.js"></script>
    <!-- Magnific Popup JS -->
    <script src="js/magnific-popup.js"></script>
    <!-- Waypoints JS -->
    <script src="js/waypoints.min.js"></script>
    <!-- Countdown JS -->
    <script src="js/finalcountdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="js/nicesellect.js"></script>
    <!-- Flex Slider JS -->
    <script src="js/flex-slider.js"></script>
    <!-- ScrollUp JS -->
    <script src="js/scrollup.js"></script>
    <!-- Onepage Nav JS -->
    <script src="js/onepage-nav.min.js"></script>
    <!-- Easing JS -->
    <script src="js/easing.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
</body>

</html>
