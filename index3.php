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
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		 <link type="text/css" rel="stylesheet"
href="styles/mku1.css">
	 </head>

<body>

      <div class="main_wrapper">

	     <div class="header_wrapper">
		 
		<a href="index.php"><img id="logo" src="images/logo3.png" /></a>
		 
		 <div class="container banner">
<div class="row">
<div id="mycarousel" class="carousel slide" data-ride="carousel" data-interval="2000">

  <ol class="carousel-indicators">
  <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
  <li data-target="#mycarousel" data-slide-to="1"></li>
  <li data-target="#mycarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
      <div class="item active ">
	  <img src="images/a1.jpeg">
	 
	  </div>
	  <div class="item">
	  <img src="images/a3.jpeg">
	  
	  </div>
	  <div class="item">
	  <img src="images/a4.jpeg">
	  
	  </div>
  </div>
  
  
</div>
</div>
</div>
		 
		 
		 </div>
		 
		 
		<nav class="navbar navbar-default">
	     <div class="container-fluid">
		 
		      <div class="navbar-header">
			       <a href="#" class="navbar-brand">MY STORE</a>
			  </div>
			  
			  <div>
			  
			      
			     <ul class="nav navbar-nav">
				 <li class="active"><a href="index3.php">home</a></li>
				  <li><a href="all_products.php">all products</a></li>
				   
				    <li><a href="customer_register.php">sign up</a></li>
					 
					  <li><a href="about.php">contact us</a></li>
					  </ul>
					  <div id="form">
                     <form method="get" action="results.php" enctype="multipart/form-data">
                          <input type="text" name="user_query" placeholder="search a product" />
						  <input type="submit" name="search" value="search" />
					 </form>
			  
			  </div>
		 
		 </div>
	 </nav>
	 
	 
	
	 
	  
	     <div class="content_wrapper">
		 
		 
	  
	     <div id="sidebar">
		 
		 <div id="sidebar_title">Categories</div>
					   
					   <ul id="cats">
					       <?php getcats(); ?>
					     
					   </ul>
					   
					   <div id="sidebar_title">Brands</div>
					   
					   <ul id="cats">
					       <?php getbrands(); ?>
						   
					     
					   </ul>
		 
		 </div>
		 
		 
	  
	     <div id="content_area">
		 <?php cart(); ?>
		 <div style="height:50px;width:auto;background:#63B8FF;color:white;">
	            <span style="float:right;font-size:15px;padding:5px;line-height:40px;">
				
				<?php
				if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>".$_SESSION['customer_email'];
				}
				else{
					echo"<b>Welcome Guest</b>";
				}
				
				?>
				
				
				
				
				<?php
				  if(!isset($_SESSION['customer_email'])){
					  echo "<a href='checkout.php' style='color:white;'>Login</a>";
				  }
				  else{
					 echo "<a href='logout.php' style='color:white;'>Logout</a>"; 
				  }
				
				
				?>
				
				
				</span>	 
		 </div>
		
		
		
		 <div id="products_box">
		 <?php getpro(); ?>
		 <?php getcatpro(); ?>
		 <?php getBrandpro(); ?>
		 </div>
	  
	     </div>
		 </div>
		 
	     <div id="footer"><h2 style="text-align:center;padding-top:30px;">&copy; 2017 by www.MKU.com</h2></div>

      </div>
	  </div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>	 
</html>