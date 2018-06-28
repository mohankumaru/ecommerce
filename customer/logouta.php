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
		 <div style="height:50px;width:auto;background:#63b8ff;color:white;">
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

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>	 
</html>