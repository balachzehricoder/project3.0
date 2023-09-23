<?php  
include 'config.php';   
include 'funcation.php'; 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


//funcation of wishlist count



include 'config.php';
$id = $_SESSION["user_id"];
$query = "SELECT * FROM users where id='$id'";


function getWishlistItemCountForUser($user_id) {
    include 'config.php';
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to get wishlist item count for a specific user
    $sql = "SELECT COUNT(*) AS wishlist_count FROM wishlist WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $wishlistCount = $row["wishlist_count"];
    } else {
        $wishlistCount = 0;
    }

    $stmt->close();
    $conn->close();

    return $wishlistCount;


}


?>
<link rel="shortcut icon" data-bs-toggle="tooltip" title="Home" href="logo.png">
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6"><strong> </strong></div>
	<div class="span6">
	<div class="pull-right">
		<a href="profile.php"><span class="btn btn-mini btn-primary" data-bs-toggle="tooltip" title="user managment"><i class="icon-user icon-white"></i> 
		<a href="wishlistview.php"><span class="btn btn-mini btn-primary" data-bs-toggle="tooltip" title="wishlist"><i class="icon-heart icon-white"></i> <?php


// Replace '123' with the actual user ID

$user_id = $id;

$wishlistCount = getWishlistItemCountForUser($user_id);

echo $wishlistCount ;
?>



		<a href="cart.php"><span class="btn btn-mini btn-primary" data-bs-toggle="tooltip" title="cart"><i class="icon-shopping-cart icon-white"></i>  <?php
					//   $cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
					//   echo $cart_count;
				  

					if(isset($_SESSION['cart_details']['cart_total_qty']))
					{
						print_r($_SESSION['cart_details']['cart_total_qty']);
					}
					else
					{
						print_r(0);
					}
					?>
				   
				  </i>     </a>
                  </li>
				  <?php 
				  if (!isset($_SESSION["user_id"])) {

					exit();
				  }
				  

				  
		  
				 
				 ?>  Itemes in your cart </span> </a> 
	</div>
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>

  <div class="navbar-inner">
    <a class="brand" href="index.php"><img style="height: 50px;" src="logo.png" alt="Bootsshop"/></a>
    <form class="form-inline navbar-search" method="get" action="search.php">
        <input type="text"  class="srchTxt" name="q" placeholder="Search products">
       <a href="search.php"><input type="submit" data-bs-toggle="tooltip" title="Search product"  value="search"></li></a>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="privecypolicy.php">privercy policy</a></li>
	 <li class=""><a href="aboutus.php">about us</a></li>
	 <li class=""><a href="contact.php">Contact</a></li>
	 <li class="">
	 <a href="logout.php"  style="padding-right:0"><span class="btn btn-large btn-danger" data-bs-toggle="tooltip" title="Logout">Logout</span></a>
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login Block</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm">
			  <div class="control-group">								
				<input type="text" id="inputEmail" placeholder="Email">
			  </div>
			  <div class="control-group">
				<input type="password" id="inputPassword" placeholder="Password">
			  </div>
			  <div class="control-group">
				<label class="checkbox">
				<input type="checkbox"> Remember me
				</label>
			  </div>
			</form>		
			<button type="submit" class="btn btn-success">Sign in</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>
	</div>
	</li>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->

<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div style="height: 100vh;" id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="cart.php"><img src="themes/images/ico-cart.png" alt="cart"><?php
					//   $cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
					//   echo $cart_count;
				  

					if(isset($_SESSION['cart_details']['cart_total_qty']))
					{
						print_r($_SESSION['cart_details']['cart_total_qty']);
					}
					else
					{
						print_r(0);
					}
					?>
				   
				  </i>     </a>
                  </li>
				  <?php 
				  if (!isset($_SESSION["user_id"])) {

					exit();
				  }
				  

				  
		  
				 
				 ?>Items in your cart  <span class="badge badge-warning pull-right"></span></a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu open"><a> catigroy</a>
				<ul>
				<?php
          $categories = getAllCategories();

         foreach ($categories as $category) {
             echo '<li><a class="active" href="category.php?id=' . $category['id'] . '">' . $category['name'] . '</a></li>';
         }
        ?>
				</ul>
			</li>
			
		</ul>
		<br/>

		<form method="get" action="range.php">
    <label for="minPrice">Min Price:</label>
    <input type="number" id="minPrice" name="minPrice" min="0">
    <label for="maxPrice">Max Price:</label>
    <input type="number" id="maxPrice" name="maxPrice" min="0">
	<br>
    <input type="submit" class="btn btn-primery" value="Filter">
</form>

		 
	</div>