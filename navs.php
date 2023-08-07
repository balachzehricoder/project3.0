<?php
include 'config.php';
include 'funcation.php'
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-/hJutKnHBS4PYXLEq8y3mZg38iaEmNcN6T/UDqfn53dSp91CnhIfF1LJ/CoXgmniEa0O8vbAbB3SyNxQaQo1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    </style>
    <style>
        /* Add your mobile-friendly styles here */
        @media (max-width: 767px) {
            .logo img {
                max-width: 100px;
            }

            .menu-area {
                text-align: center;
            }

            .menu-area .navbar {
                justify-content: center;
            }

            .search-bar-top {
                display: none;
            }

            .cat-nav-head .col-lg-3 {
                display: none;
            }

            .right-bar {
                text-align: center;
            }

            .right-bar .shopping li {
                margin-right: 15px;
            }

            .right-bar .single-icon {
                margin-right: 15px;
            }

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



</head>

<body class="js">

    <!-- End Preloader -->


    <!-- Header -->
    <header class="header shop">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-12">
                        <!-- Top Left -->
                        <div class="top-left">
                            <ul class="list-main">
                                <li class="ti-headphone-alt"> +92331-33450-84</li>
                                <li class="ti-email"> support@Phonesell.com</li>
                            </ul>
                        </div>
                        <!--/ End Top Left -->
                    </div>
                    <div class="col-lg-7 col-md-12 col-12">
                        <!-- Top Right -->
                        <div class="right-content">
                            <ul class="list-main">

                                <li><i ></i> <a class="ti-user" href="#">My account</a></li>
                                <div class="sinlge-bar shopping">
                                  <a href="cart.php" class="ti-bag" >
                                               
                                </div>






                                <?php
                                //   $cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                                //   echo $cart_count;


                                if (isset($_SESSION['cart_details']['cart_total_qty'])) {
                                    print_r($_SESSION['cart_details']['cart_total_qty']);
                                } else {
                                    print_r(0);
                                }
                                ?>

                                </i> </a>
                                </li>
                                <?php
                                if (!isset($_SESSION["user_id"])) {

                                    exit();
                                }





                                ?>
                                </a>
                            </ul>
                        </div>
                        <!-- End Top Right -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <div class="middle-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-12">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.php"><img src="images/logo.png" alt="logo"></a>
                        </div>
                        <!--/ End Logo -->
                        <!-- Search Form -->
                        <div class="search-top">
                            <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                            <!-- Search Form -->
                            <div class="search-top">
                                <form action="search.php" method="get" class="search-form">
                                    <input type="text" placeholder="Search here..." name="q">
                                    <a href="search.php"><button value="search" type="submit"><i class="ti-search"></i></button></a>
                                </form>
                            </div>
                            <!--/ End Search Form -->
                        </div>
                        <!--/ End Search Form -->
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-12">
                        <div class="search-bar-top">
                            <div class="search-bar">
                            


                                <form method="get" action="search.php">
                                    <input name="q" placeholder="Search Products Here....." type="search">
                                    <button class="btnn"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                 
                                </script>
                    <div class="col-lg-2 col-md-3 col-12">
                        <div class="right-bar">
                            <!-- Search Form -->




                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Header Inner -->
        <div class="header-inner">
            <div class="container">
                <div class="cat-nav-head">
                    <div class="row">
                        <div class="col-lg-3">

                        </div>
                        <div class="col-lg-9 col-12">
                            <div class="menu-area">
                                <!-- Main Menu -->
                                <nav class="navbar navbar-expand-lg">
                                    <div class="navbar-collapse">
                                        <div class="nav-inner">
                                            <ul class="nav main-menu menu navbar-nav">
                                                <li class="active"><a href="#">Home</a></li>
                                                <li><a href="contact.html">Contact Us</a></li>
                                                <li><a href="#">About us</a></li>
                                                <li><a href="#">privecy policy</a></li>
                                                <li> <select id="categorySelect">
                                    <li><option selected="selected"><p style="color: white;" >All Category</p></option>
                                    <?php
                                    $categories = getAllCategories();
                                    foreach ($categories as $category) {
                                        echo '<option select="select"' . $category['id'] . '">' . $category['name'] . '</option>';
                                    }
                                    ?>
                                </select>

                                <script>
                                    document.getElementById("categorySelect").addEventListener("change", function() {
                                        var selectedValue = this.value;
                                        if (selectedValue !== '') {
                                            window.location.href = 'category.php?id=' + selectedValue;
                                        }
                                    });
                                </script>
</li>



                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                                <!--/ End Main Menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
    <!--/ End Header -->


    <!-- /End Single Banner  -->
    </div>
    </div>





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