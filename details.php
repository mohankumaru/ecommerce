 


<?php

include("functions/functions.php");

?>

<?php

$con=mysqli_connect("localhost","root","","ecomerce");

?>

 <!DOCTYPE>
 <html>
     <head>
	     <title> my online store</title>
		 <link type="text/css" rel="stylesheet"
href="styles/styles.css">
	 </head>

<body>

      <div class="main_wrapper">

	     <div class="header_wrapper">
		 
		 <img id="logo" src="images/logo (4).jpg" />
		 <img id="banner" src="images/logo (4).jpg" />
		 
		 </div>
		 
		 
		 <div class="menubar">
		      
			     <ul id="menu">
				 <li><a href="index.php">home</li>
				  <li><a href="all_products.php">all products</li>
				   <li><a href="my_account.php">my account</li>
				    <li><a href="customer_register.php">sign up</li>
					 <li><a href="cart.php">shopping cart</li>
					  <li><a href="#">contact us</li>
					  </ul>
				<div id="form">
                     <form method="get" action="results.php" enctype="multipart/form-data">
                          <input type="text" name="user_query" placeholder="search a product" />
						  <input type="button" name="search" value="search" />
					 </form>


                </div>				
			  
		 
		 </div>
	  
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
		 <div style="height:50px;width:800px;background:black;color:white;">
	            <span style="float:right;font-size:18px;padding:5px;line-height:40px;">
				
				Welcone guest!<b style="color:yellow">Shopping Cart-</b>Total Items,Total price: <a href="cart.php" style="color:yellow;">Go to Cart</a>
				
				
				</span>	 
		 </div>
		
		 <div id="products_box">
		 <?php
		 if(isset($_GET['pro_id'])){ 
		 
		 $product_id=$_GET['pro_id'];
		 
		 $get_pro="SELECT * FROM products where product_id='$product_id'";
	
	/*$run_pro=mysqli_query($con,$get_pro);*/
	
	while($row_pro = mysqli_fetch_array(mysqli_query($con,$get_pro))){
		
		$pro_id=$row_pro['products_id'];
		$pro_title=$row_pro['product_title'];
		$pro_price=$row_pro['product_price'];
		$pro_image=$row_pro['product_image'];
		$pro_desc=$row_pro['product_desc'];
		
		echo"
		<div id='single_product'>
		<h3>$pro_title</h3>
		<img src='admin_area/product_images/$pro_image' width='400px' height='300px' />
		<p><b> $ $pro_price</b></p>
		<a href='index.php' style='float:left;'>Go back</a>
		<a href='index.php?pro_id=$pro_id'><button style='float:right;'>Add to cart</button></a>
		</div>
		";
		
	}
		 }
	?>
		 
		 </div>
	  
	     </div>
		 </div>
		 
	     <div id="footer"><h2 style="text-align:center;padding-top:30px;">&copy; 2017 by www.MKU.com</h2></div>

      </div>



</body>	 
</html>