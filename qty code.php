<form action="add-to-cart.php" method="get" class="display-flex">
								<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
							    <div class="qtyminus">-</div>
							    <input type="text" name="quantity" value="1" class="qty">
							    <div class="qtyplus">+</div>





								<?php 
session_start();
include 'navs2.php';
include 'config.php';

$id = $_GET['id'];


$query = "SELECT * FROM products where id='$id' ";
$result = $conn->query($query);
if($result->num_rows > 0){
    foreach($result as $row){
        $p_name = $row['p_name'];
        $p_price = $row['p_price'];
        $p_tax = $row['p_tax'];
        $p_qty = $row['p_qty'];
        $img_upload = $row['img_upload'];
?>


