 <?php
session_start();
include("functions/functions.php");

?>
 <!DOCTYPE>
 <html>
     <head>
	     <title> my online store</title>
		 <meta charset="utf-8">
	<meta name="viewpoint" content="width-device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
		 <link type="text/css" rel="stylesheet"
href="../styles/stylings.css">
	 </head>

<body>

      <div class="main_wrapper">

	     <div class="header_wrapper">
		 
		<a href="index.php"><img id="logo" src="images/logo (4).jpg" /></a>
		 <img id="banner" src="images/logo (4).jpg" />
		 
		 </div>
		 
		 
		  
		<nav class="navbar navbar-default">
	     <div class="container-fluid">
		 
		      <div class="navbar-header">
			       <a href="#" class="navbar-brand">MY STORE</a>
			  </div>
			  
			  <div>
			  
			      
			     <ul class="nav navbar-nav">
				 <li class="active"><a href="../indexa.php">home</a></li>
				  <li><a href="../all_products.php">all products</a></li>
				   
				    <li><a href="#">sign up</a></li>
					 
					  <li><a href="#">contact us</a></li>
					  </ul>
					  
			  
			  </div>
		 
		 </div>
	 </nav>
	 
	  
	     <div class="content_wrapper">
	  
	     <div id="sidebar">
		 
		 <div id="sidebar_title">My Account:</div>
					   
					   <ul id="cats">
					   
					   <?php
					      $user= $_SESSION['customer_email'];
						   $get_img="select * from customers where customer_email='$user'";
						   $run_img=mysqli_query($con,$get_img);
						   $row_img=mysqli_fetch_array($run_img);
						   $c_image=$row_img['customer_image'];
						   $c_name=$row_img['customer_name'];
						   echo "<img src='customer_images/$c_image' width='150' height='150' />";
					
					   
					   
					   ?>
					  
					       <li><a href="my_account.php?my_orders">My Orders</a></li>
						    <li><a href="my_account.php?edit_account">Edit Account</a></li>
							 <li><a href="my_account.php?change_pass">Change Password</a></li>
							  <li><a href="my_account.php?delete_account">Delete Account</a></li>
							  <li><a href="../index.php">Logout</a></li>
					     
					   </ul>
					   
					   
		 
		 </div>
		 
		 
	  
	     <div id="content_area">
		 <?php cart(); ?>
		 <div style="height:50px;width:auto;background:#63b8ff;color:white;">
	            <span style="float:right;font-size:15px;padding:5px;line-height:40px;">
				
				<?php
				if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>".$_SESSION['customer_email'];
				}
				
				
				?>
				
				
				
				
				<?php
				  if(!isset($_SESSION['customer_email'])){
					  echo "<a href='checkout.php' style='color:white;'>Login</a>";
				  }
				  else{
					 echo "<a href='../index.php' style='color:white;'>Logout</a>"; 
				  }
				
				
				?>
				
				
				</span>	 
		 </div>
		
		
		
		 <div id="products_box">
		 
		 <?php
		 if(!isset($_GET['my_orders'])){
			 if(!isset($_GET['edit_account'])){
				 if(!isset($_GET['change_pass'])){
					 if(!isset($_GET['delete_account'])){
						 
			echo "
			<h2>Welcome: $c_name:</h2>
			<b>you can view your orders here <a href='my_account.php?my_orders'>orders</a>";
		 }
		 }
		 }
		 }
		 ?>
		 <?php
		 if(isset($_GET['edit_account'])){
			 include("edit_account.php");
		 }
		 if(isset($_GET['change_pass'])){
			 include("change_pass.php");
		 }
		 if(isset($_GET['delete_account'])){
			 include("delete_account.php");
		 }
		 
		 
		 ?>
		 </div>
	  
	     </div>
		 </div>
		 
	     <div id="footer"><h2 style="text-align:center;padding-top:30px;">&copy; 2017 by www.MKU.com</h2></div>

      </div>

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>	 
</html>