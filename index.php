<?php include 'config.php'; include 'navs.html';?>

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
    </style>
<div class="container ">
    <div class="row">
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

  
<div class="col-md-6" >
<div class="card main" style="width: 18rem;">
  <img src="<?php echo $img_upload ?>" class="card-img-top" alt="...">
  <div class="card-body">
    
    <p class="card-text"> name:   <?php echo $p_name ?></p>
        <p class="card-text">price: <?php echo $p_price ?>  Rp</p>
        <p class="card-text">qty: <?php echo $p_qty ?></p>
  
       
 
<?php 
    }
}
?>
</div>
</div>
</div>
    </div></div></body></html>

