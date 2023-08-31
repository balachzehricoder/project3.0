<?php  
session_start();
include 'config.php';




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    	
<!-- Bootstrap style --> 
<link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<style>
    .img{
        height: 100px;
    }
</style>
<?php include 'navandside.php' ?>


  <div class="span9">
                    <div class="well well-small">
                        <h4>Latest Products</h4>
                        <ul class="thumbnails product"> <?php
        include 'config.php';

        // Check if the search query is set and not empty
        if (isset($_GET['q']) && !empty($_GET['q'])) {
            // Perform the search
            $search_query = $_GET['q'];
            $products = searchProducts($search_query);

            // Check if the products array is empty after search
            if (empty($products)) {
                echo '<center><div class="col-12 edit"><h1 class="text-danger">No products found for the search query: </h1></div></center';
            }
        } else {
            // Fetch all products
        }
        ?>
  <div class="span9">
        <div class="well well-small">
            <h4></h4>
            <ul class="thumbnails product">
                <?php
        foreach ($products as $product) {
?>


            <li class="col-2">
			 <div class="thumbnail product">
                                            <a href="product_details.html"><img class="img"  src="<?php echo $product["img_upload"]; ?>" alt=""/></a>
                                            <div class="caption">
                                                <h5><?php echo $product["p_name"]; ?></h5>
                                                <h5>Rs <?php echo $product["p_price"]; ?></h5>
                                                <h4 style="text-align:center">
                                                    <a class="btn" href="product_details.html"> <i class="icon-heart"></i></a>
                                                    <a class="btn" href="add-to-cart.php?id=<?php echo $row['id']; ?>">Add to <i class="icon-shopping-cart"></i></a>
                                                    
                                                </h4>
                                            </div>
                                        </div>
                                    </li>

                            <?php
                                }
                            
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>






















</body>
</html>