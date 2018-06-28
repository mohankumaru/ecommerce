 <?php
session_start();
include("functions/functions.php");
include("includes/db.php");
?>
 <!DOCTYPE>
 <html>
     <head>
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
				 <li class="active"><a href="index.php">home</a></li>
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
		 <div style="height:50px;width:1079px;background:black;color:white;">
	            <span style="float:right;font-size:18px;padding:5px;line-height:40px;">
				
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
		
		<form action="customer_register.php" method="post" enctype="multipart/form-data">
		
		<table align="center" width="850">
		     <tr align="center">
			      <td colspan="5"><h2>Create an account</h2></td>
			 </tr>
			 <tr>
			      <td align="right">Customer Name:</td>
				  <td><input type="text" name="c_name" required/></td>
			 </tr>
			 <tr>
			      <td align="right">Customer Email:</td>
				  <td><input type="text" name="c_email" required/></td>
			 </tr>
			 <tr>
			      <td align="right">Customer Password:</td>
				  <td><input type="password" name="c_pass" required/></td>
			 </tr>
			 			 <tr>
			      <td align="right">Customer Image:</td>
				  <td><input type="file" name="c_image" required /></td>
			 </tr>
			 <tr>
			      <td align="right">Customer Country:</td>
				  <td>
				  <select name="c_country" required>
				     <option>Select a Country</option>
					 <option>India</option>
					 <option>United states</option>
					 <option>U K</option>
					 <option>japan</option>
					 <option>srilanka</option>
					 <option>Bangladesh</option>
					 <option>china</option>
					 <option>France</option>
					 <option>U A E</option>
					 <option>Spain</option>
					 <option>Mexico</option>
				  <select>
				  </td>
			 </tr>
			 <tr>
			      <td align="right">Customer city:</td>
				  <td><input type="text" name="c_city"required/></td>
			 </tr>
			 <tr>
			      <td align="right">Customer contact:</td>
				  <td><input type="text" name="c_contact" required/></td>
			 </tr>
			 <tr>
			      <td align="right">Customer Address:</td>
				  <td><textarea cols="20" rows="5" name="c_address" required></textarea></td>
			 </tr>
			 			 <tr align="center">
			      
				  <td colspan="5"><input type="submit" name="register" value="Create Account" /></td>
			 </tr>
			 
			 
		</table>
		
		
		</form>
		
		 
	  
	     </div>
		 </div>
		 
	     <div id="footer"><h2 style="text-align:center;padding-top:30px;">&copy; 2017 by www.MKU.com</h2></div>

      </div>



</body>	 
</html>

<?php
if(isset($_POST['register'])){
	$ip=getIp();
	$c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_pass=$_POST['c_pass'];
	$c_image=$_FILES['c_image']['name'];
	$c_image_tmp=$_FILES['c_image']['tmp_name'];
	$c_country=$_POST['c_country'];
	$c_city=$_POST['c_city'];
	$c_contact=$_POST['c_contact'];
	$c_address=$_POST['c_address'];
	
	move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
	
	$insert_c="insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image)
	values('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
	
	$run_c=mysqli_query($con,$insert_c);
	
	$sel_cart="select * from cart where ip_add='$ip'";
	$run_cart=mysqli_query($con,$sel_cart);
	$check_cart=mysqli_num_rows($run_cart);
	if($check_cart==0){
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('Account created succsessfully')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";	
	}
	else{
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('Account created succsessfully')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";	
		
	}
}



?>