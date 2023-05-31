<?php
session_start();
include 'config.php';
include 'navs2.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<body>
    <style>
        .main{border: 0;}
.carimg{
    height: 400px;
}
.text{
    color: black;
}
    </style>

<div class="container-fluid pt-5 mt-5">
    <div class="row px-xl-5 pb-3">
        <?php 
        $query = "SELECT * FROM products";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            foreach($result as $row){
                $p_name = $row['p_name'];
                $p_price = $row['p_price'];
                $p_tax = $row['p_tax'];
                $p_qty = $row['p_qty'];
                $img_upload = $row['img_upload'];
        ?>

       <a href="full_page.php?id=<?php echo $row['id']; ?>" >
 <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card main" style="width: 18rem;">
                <img src="<?php echo $img_upload ?>" class="card-img-top carimg" alt="...">
                <div class="card-body">
                    <p class="card-title text">name: <?php echo $p_name ?></p>
                    <p class="card-text text">price: <?php echo $p_price ?>  Rp</p>
                    <a href="add-to-cart.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Add to Cart</a>
                </div>
            </div>
        </div>
        
        <?php 
            }
        }
        ?>
    </div>
</div>
</a>
</body>
</html>
<!-- echo '<li>
    <h3>' . $product['name'] . '</h3>
    <p>' . $product['price'] . '</p>
    <img src="' . $product['image'] . '">
    <p><a href="remove.php?product_id=' . $product_id . '">Remove</a></p>
  </li>'; -->




