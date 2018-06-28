<?php
session_start();
if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else{
	

?>

<!DOCTYPE>

<html>
    <head>
	
	  <title>Admin here</title>
	  <link type="text/css" rel="stylesheet"
href="styles/style.css">
	  </head>
	  
	  <body>
	  
	  <div class="main_wrapper">
	  
	  <div id="header">
	  </div>
	  
	  <div id="right">
	  
	     <h2 style="text-align=center">Manage Content</h2>
	     <a href="index.php?insert_product">Insert product</a>
		  <a href="index.php?view_products">View products</a>
		   <a href="index.php?insert_cat">Insert new categories</a>
		    <a href="index.php?view_cats">View all categories</a>
			 <a href="index.php?insert_brand">Insert new brands</a>
			  <a href="index.php?view_brands">View all brands</a>
			   <a href="index.php?view_customers">view customers</a>
			    <a href="index.php?view_orders">view orders</a>
				<a href="index.php?view_payments">View payments</a>
				<a href="logout.php">Admin logout</a>
	  </div>
	  <div id="left">
	  
	  <?php
	  if(isset($_GET['insert_product'])){
		  include("insert_product.php");
	  }
	   if(isset($_GET['view_products'])){
		  include("view_products.php");
	  }
	  if(isset($_GET['edit_pro'])){
		  include("edit_pro.php");
	  }
	  if(isset($_GET['insert_cat'])){
		  include("insert_cat_brand.php");
	  }
	  if(isset($_GET['insert_brand'])){
		  include("insert_cats_brands.php");
	  }
	  if(isset($_GET['view_cats'])){
		  include("view_cats_brands.php");
	  }
	  if(isset($_GET['view_brands'])){
		  include("view_cats_brands.php");
	  }
	  if(isset($_GET['edit_cat'])){
		  include("edit_cat.php");
	  }
	  if(isset($_GET['edit_brand'])){
		  include("edit_brand.php");
	  }
	  if(isset($_GET['view_customers'])){
		  include("view_customers.php");
	  }

	  
	  ?>
	  
	  </div>
	  
	  </div>
	  
	  </body>

</html>	  
	  
<?php } ?>  