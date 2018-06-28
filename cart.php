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
				 <li class="active"><a href="index.php">home</a></li>
				  <li><a href="all_products.php">all products</a></li>
				   
				    <li><a href="#">sign up</a></li>
					 
					  <li><a href="#">contact us</a></li>
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
				
				<b style="color:#87ceeb">Shopping Cart-</b>Total Items: <?php total_items(); ?>,Total price:<?php total_price(); ?> <a style="color:#87ceeb;" href="indexa.php">Back to shop</a>
				
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
		 <form action="" method="post" enctype="multipart/form-data">
		 
		 <table align="center" width="800" bgcolor="#87ceff">
		 

		 
		 <tr align="center">
		     <th>Remove</th>
			  <th>Product(s)</th>
			   <th>Quantity</th>
			    <th>Total Price</th>
		 </tr>
		 
		 <?php
		 
		 $total=0;
	
	global $con;
	
	$ip=getIp();
	$customer_email=$_SESSION['customer_email'];
	
	$sel_price="select * from cart where customer_email='$customer_email'";
	
	$run_price=mysqli_query($con,$sel_price);
	
	while($p_price=mysqli_fetch_array($run_price)){
		
		$pro_id=$p_price['p_id'];
		
		$pro_price="select * from products where products_id='$pro_id'";
		
		$run_pro_price=mysqli_query($con,$pro_price);
		
		while($pp_price=mysqli_fetch_array($run_pro_price)){
			
			$product_price=array($pp_price['product_price']);
			
			$product_title=$pp_price['product_title'];
			
			$product_image=$pp_price['product_image'];
			
			$single_price=$pp_price['product_price'];
			
			$values=array_sum($product_price);
			
			$total+=$values;
		
		 
		 ?>
		 
		 <tr align="center">
		    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" /></td>
			 <td><?php echo $product_title; ?><br>
			 <img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60" />
			 </td>
			  <td><input type="text" size="3" name="qty" value="" /></td>
			  <?php
			  global $con;
			    if(isset($_POST['update_cart'])){
					
					$customer_email=$_SESSION['customer_email'];
					$qty=$_POST['qty'];
					$update_qty="update cart set qty='$qty' where customer_email='$customer_email'";
					$run_qty=mysqli_query($con,$update_qty);
					
					
					$total=$total*$qty;
					
				}
			  
			  
			  ?>
			   <td><?php echo "$".$single_price; ?></td>
		 </tr>
		 
		 
		 
	<?php } } ?>
	<tr align="right">
		     <td colspan="5"><b>Sub Total:</b></td>
			 <td><?php echo "$".$total; ?></td>
		 </tr>
		 
		 <tr align="center">
		     <td colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td>
			 <td><input type="submit" name="continue_shopping" value="Continue Shopping"/></td>
			 <td><button><a href="checkout.php" style="text-decoration:none;color:black">Checkout</a></button></td>
		 </tr>
		 
		 </table>
		 
		 </form>
		 <?php
		 function updatecart(){
		 global $con;
		 $ip=getIp();
		 $customer_email=$_SESSION['customer_email'];
		    if(isset($_POST['update_cart'])){
				foreach($_POST['remove'] as $remove_id){
					$delete_product="delete from cart where p_id='$remove_id' and customer_email='$customer_email'";
					$run_delete=mysqli_query($con,$delete_product);
					if($run_delete){
						echo " <script>window.open('cart.php','_self')</script>";
					}
				}
			}
			if(isset($_POST['continue_shopping'])){
				echo "<script>window.open('indexa.php','_self')</script>";
			}
		 
		 }
		 echo @$up_cart=updatecart();
		 
		 ?>
		 
		 </div>
	  
	     </div>
		 </div>
		 
	     <div id="footer"><h2 style="text-align:center;padding-top:30px;">&copy; 2017 by www.MKU.com</h2></div>

      </div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>	 
</html>