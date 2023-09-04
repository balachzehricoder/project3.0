<?php include 'config.php';  ?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Bootstrap style --> 
<link rel="icon" href="logo.png">

<link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  <head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->
	
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
  
<?php include 'navandside.php'; ?>

<!-- Include the navbar from navs2.php -->

<!-- Display the products for the selected category using Bootstrap cards -->
<div class="span9">
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
                    <li class="col-2">
                        <div class="thumbnail product">
                            <a href="full_page.php?id=<?php echo $product_id; ?>"><img class="img" src="<?php echo $img_upload; ?>" alt=""/></a>
                            <div class="caption">
                                <h5><?php echo $escaped_p_name; ?></h5>
                                <h5>  pkr  <?php echo $p_price; ?></h5>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<body>