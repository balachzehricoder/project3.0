<?php  include 'config.php';   include 'funcation.php'; ?>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong> </strong></div>
	<div class="span6">
	<div class="pull-right">
		<a href="product_summary.html"><span class="">Fr</span></a>
		<a href="product_summary.html"><span class="">Es</span></a>
		<a href="wishlist.php"><span class="btn btn-mini btn-primary" data-bs-toggle="tooltip" title="wishlist"><i class="icon-heart icon-white"></i> <?php
					//   $cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
					//   echo $cart_count;
				  

					if(isset($_SESSION['wish_details']['wish_total_qty']))
					{
						print_r($_SESSION['wish_details']['wish_total_qty']);
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
    <a class="brand" href="index.php"><img style="height: 50px;" src="phonesell.com_logo.png" alt="Bootsshop"/></a>
    <form class="form-inline navbar-search" method="get" action="search.php">
        <input type="text"  class="srchTxt" name="q" placeholder="Search products">
       <a href="search.php"> <input type="submit" value="Search"> ></li></a>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="special_offer.html">Specials Offer</a></li>
	 <li class=""><a href="normal.html">Delivery</a></li>
	 <li class=""><a href="contact.html">Contact</a></li>
	 <li class="">
	 <a href="logout.php" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-danger">Logout</span></a>
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
	<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="product_summary.html"><img src="themes/images/ico-cart.png" alt="cart"><?php
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