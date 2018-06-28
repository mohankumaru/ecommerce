<?php
//getting the categories

$con=mysqli_connect("localhost","root","","ecomerce");
if(mysqli_connect_errno()){
	echo "failed to connect to mysql:".mysqli_connect_error();
}

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
 

function cart(){
	if(isset($_SESSION['customer_email'])){
	if(isset($_GET['add_cart'])){
		global $con;
		$ip=getIp();
		$customer_email=$_SESSION['customer_email'];
	$pro_id=$_GET['add_cart'];
$check_pro="select * from cart where customer_email='$customer_email' AND p_id='$pro_id'";	
$run_check=mysqli_query($con,$check_pro);
if(mysqli_num_rows($run_check)>0){
	echo "<script>window.open('indexa.php','self')</script>";
}
else{
	$insert_pro="insert into cart (p_id,customer_email) values('$pro_id','$customer_email')";
	$run_pro=mysqli_query($con,$insert_pro);
	echo "<script>window.open('indexa.php','self')</script>";
	}
	}
	}
}

function total_items(){
	
	if(isset($_GET['add_cart'])){
		global $con;
		$customer_email=$_SESSION['customer_email'];
		$ip=getIp();
		$get_items="select * from cart where customer_email='$customer_email'";
		$run_items=mysqli_query($con,$get_items);
		$count_items=mysqli_num_rows($run_items);
	}
		else{
			global $con;
			$ip=getIp();
			$customer_email=$_SESSION['customer_email'];
		$get_items="select * from cart where customer_email='$customer_email'";
		$run_items=mysqli_query($con,$get_items);
		$count_items=mysqli_num_rows($run_items);
			
		}
	echo $count_items;
	
}
 
function total_price(){
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
			
			$values=array_sum($product_price);
			
			$total+=$values;
		}
	}echo "$".$total;
	echo "<b>for one item,</b>";
	
	 if(isset($_POST['update_cart'])){
					
					$customer_email=$_SESSION['customer_email'];
					$qty=$_POST['qty'];
				    $update_qty="update cart set qty='$qty' where customer_email='$customer_email'";
					$run_qty=mysqli_query($con,$update_qty);
					
					$total=$total*$qty;
					echo "$".$total;
					
					
	 }
	
			   
					
				}
			  
			  
	


function getcats(){
	global $con;
	
	$get_cats="SELECT * FROM categories";
	
	$run_cats=mysqli_query($con,$get_cats);
	
	while($row_cats=mysqli_fetch_array($run_cats)){
		
		$cat_id=$row_cats['cat_id'];
		
		$cat_title=$row_cats['cat_title'];
		
		echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>"; 
	}
}


//getting brands

function getbrands(){
	global $con;
	
	$get_brands="SELECT * FROM brands";
	
	$run_brands=mysqli_query($con,$get_brands);
	
	while($row_brands=mysqli_fetch_array($run_brands)){
		
		$brand_id=$row_brands['brand_id'];
		
		$brand_title=$row_brands['brand_title'];
		
		echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>"; 
	}
}

function getpro(){
	echo"<h2 style='font-family:comic sans ms;margin-top:25px;'>TOP PRODUCTS</h2>";
	
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
	
	global $con;
	
	$get_pro="SELECT * FROM products ORDER by RAND() LIMIT 0,5";
	
	$run_pro=mysqli_query($con,$get_pro);
	
	while($row_pro=mysqli_fetch_array($run_pro)){
		
		$pro_id=$row_pro['products_id'];
		$pro_cat=$row_pro['products_cat'];
		$pro_brand=$row_pro['product_brand'];
		$pro_title=$row_pro['product_title'];
		$pro_price=$row_pro['product_price'];
		$pro_image=$row_pro['product_image'];
		if(isset($_SESSION['customer_email'])){
		echo"
		<div id='single_product'>
		<h3>$pro_title</h3>
		<img src='admin_area/product_images/$pro_image' width='180' height='180' />
		<p><b>price: $ $pro_price</b></p>
		<a href='detail.php?pro_id=$pro_id' style='float:left;'>Details</a>
		
		<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</button></a>
		
		</div>
		";
		}
		else{
			echo"
		<div id='single_product'>
		<h3>$pro_title</h3>
		<img src='admin_area/product_images/$pro_image' width='180' height='180' />
		<p><b>price: $ $pro_price</b></p>
		<a href='detail.php?pro_id=$pro_id' style='float:left;'>Details</a>
		
		
		</div>
		";
		}
		
	}
		}
	
}
}

function getcatpro(){
	
	if(isset($_GET['cat'])){
		$cat_id=$_GET['cat'];
		
	global $con;
	$get_cat_pro="SELECT * FROM products where products_cat='$cat_id'";
	
	$run_cat_pro=mysqli_query($con,$get_cat_pro);
	
	$count_cats=mysqli_num_rows($run_cat_pro);
	
	if($count_cats==0){
		echo "<h2>no products in this category</h2>";
	}
	
	while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
		
		$pro_id=$row_cat_pro['products_id'];
		$pro_cat=$row_cat_pro['products_cat'];
		$pro_brand=$row_cat_pro['product_brand'];
		$pro_title=$row_cat_pro['product_title'];
		$pro_price=$row_cat_pro['product_price'];
		$pro_image=$row_cat_pro['product_image'];
	if(isset($_SESSION['customer_email'])){
		echo"
		<div id='single_product'>
		<h3>$pro_title</h3>
		<img src='admin_area/product_images/$pro_image' width='180' height='180' />
		<p><b>price: $ $pro_price</b></p>
		<a href='detail.php?pro_id=$pro_id' style='float:left;'>Details</a>
		
		<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</button></a>
		
		</div>
		";
		}
		else{
			echo"
		<div id='single_product'>
		<h3>$pro_title</h3>
		<img src='admin_area/product_images/$pro_image' width='180' height='180' />
		<p><b>price: $ $pro_price</b></p>
		<a href='detail.php?pro_id=$pro_id' style='float:left;'>Details</a>
		
		
		</div>
		";
		}
		
		
	}
		
	
}
}

function getBrandpro(){
	
	if(isset($_GET['brand'])){
		$brand_id=$_GET['brand'];
		
	
	global $con;
	
	$get_brand_pro="SELECT * FROM products where product_brand='$brand_id'";
	
	$run_brand_pro=mysqli_query($con,$get_brand_pro);
	
	$count_brands=mysqli_num_rows($run_brand_pro);
	
	if($count_brands==0){
		echo "<h2>no products in this brand</h2>";
	}
	
	while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
		
		$pro_id=$row_brand_pro['products_id'];
		$pro_cat=$row_brand_pro['products_cat'];
		$pro_brand=$row_brand_pro['product_brand'];
		$pro_title=$row_brand_pro['product_title'];
		$pro_price=$row_brand_pro['product_price'];
		$pro_image=$row_brand_pro['product_image'];
	
		if(isset($_SESSION['customer_email'])){
		echo"
		<div id='single_product'>
		<h3>$pro_title</h3>
		<img src='admin_area/product_images/$pro_image' width='180' height='180' />
		<p><b>price: $ $pro_price</b></p>
		<a href='detail.php?pro_id=$pro_id' style='float:left;'>Details</a>
		
		<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</button></a>
		
		</div>
		";
		}
		else{
			echo"
		<div id='single_product'>
		<h3>$pro_title</h3>
		<img src='admin_area/product_images/$pro_image' width='180' height='180' />
		<p><b>price: $ $pro_price</b></p>
		<a href='detail.php?pro_id=$pro_id' style='float:left;'>Details</a>
		
		
		</div>
		";
		}
		
	}
		
	
}
}



function getpro1(){
	echo"<h2 style='font-family:comic sans ms;margin-top:25px;'>LATEST PRODUCTS</h2>";
	
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
	
	global $con;
	
	$get_pro="SELECT * FROM products where product_keywords like '%earphone%' ";
	
	$run_pro=mysqli_query($con,$get_pro);
	
	while($row_pro=mysqli_fetch_array($run_pro)){
		
		$pro_id=$row_pro['products_id'];
		$pro_cat=$row_pro['products_cat'];
		$pro_brand=$row_pro['product_brand'];
		$pro_title=$row_pro['product_title'];
		$pro_price=$row_pro['product_price'];
		$pro_image=$row_pro['product_image'];
		if(isset($_SESSION['customer_email'])){
		echo"
		<div id='single_product'>
		<h3>$pro_title</h3>
		<img src='admin_area/product_images/$pro_image' width='180' height='180' />
		<p><b>price: $ $pro_price</b></p>
		<a href='detail.php?pro_id=$pro_id' style='float:left;'>Details</a>
		
		<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</button></a>
		
		</div>
		";
		}
		else{
			echo"
		<div id='single_product'>
		<h3>$pro_title</h3>
		<img src='admin_area/product_images/$pro_image' width='180' height='180' />
		<p><b>price: $ $pro_price</b></p>
		<a href='detail.php?pro_id=$pro_id' style='float:left;'>Details</a>
		
		
		</div>
		";
		}
		
	}
		}
	
}
}

function getpro2(){
	 echo"<h2 style='font-family:comic sans ms;margin-top:25px;'>CUSTOMERS FAVOURITE</h2>";
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
	
	global $con;
	
	$get_pro="SELECT * FROM products where product_keywords like '%favourite%' ";
	
	$run_pro=mysqli_query($con,$get_pro);
	
	while($row_pro=mysqli_fetch_array($run_pro)){
		
		$pro_id=$row_pro['products_id'];
		$pro_cat=$row_pro['products_cat'];
		$pro_brand=$row_pro['product_brand'];
		$pro_title=$row_pro['product_title'];
		$pro_price=$row_pro['product_price'];
		$pro_image=$row_pro['product_image'];
		if(isset($_SESSION['customer_email'])){
		echo"
		<div id='single_product'>
		<h3>$pro_title</h3>
		<img src='admin_area/product_images/$pro_image' width='180' height='180' />
		<p><b>price: $ $pro_price</b></p>
		<a href='detail.php?pro_id=$pro_id' style='float:left;'>Details</a>
		
		<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</button></a>
		
		</div>
		";
		}
		else{
			echo"
		<div id='single_product'>
		<h3>$pro_title</h3>
		<img src='admin_area/product_images/$pro_image' width='180' height='180' />
		<p><b>price: $ $pro_price</b></p>
		<a href='detail.php?pro_id=$pro_id' style='float:left;'>Details</a>
		
		
		</div>
		";
		}
		
	}
		}
	
}
}




?>
