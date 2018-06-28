<?php
session_start();
if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else{
	

?>
<?php

include("includes/db.php");

?>

<html>
    <head>
	      <title>Inserting products</title>
		  <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
		  <script>
		        tinymce.init({sel
ector:'textarea'});
			</script>	
	</head>
<body bgcolor="skyblue">

<form action="insert_product.php" method="post"enctype="multipart/form-data">

<table align="center" width="795" border="2" bgcolor="orange">

    <tr align="center">
	
	    <td colspan="8"><h2>Insert new post here</h2></td>
	
	</tr>
	
	<tr>
	      
		  
	    <td align="right"><b>Product Title</b></td>
		<td><input type="text" name="product_title" size="60" required/></td>  
	
	</tr>
	
	<tr>
	
	    <td align="right"><b>Product category</b></td>
		<td>
		<select name="products_cat">
		
		<option>Select a category</option>

		<?php
		
		$get_cats="SELECT * FROM categories";
	
	$run_cats=mysqli_query($con,$get_cats);
	
	while($row_cats=mysqli_fetch_array($run_cats)){
		
		$cat_id=$row_cats['cat_id'];
		
		$cat_title=$row_cats['cat_title'];
		
		echo "<option value='$cat_id'>$cat_title</option>"; 
	}
		
		?>

		
		</select>
		</td>
	
	</tr>
	
	<tr>
	
	    <td align="right"><b>Product brand</b></td>
		<td>
		
		<select name="product_brand">
		
		<option>Select a Brand</option>

		<?php
		
		$get_brands="SELECT * FROM brands";
	
	$run_brands=mysqli_query($con,$get_brands);
	
	while($row_brands=mysqli_fetch_array($run_brands)){
		
		$brand_id=$row_brands['brand_id'];
		
		$brand_title=$row_brands['brand_title'];
		
		echo "<option value='$brand_id'>$brand_title</option>"; 
	}
		
		?>

		
		</select>
		
		</td>
	
	</tr>
	
	<tr>
	
	    <td align="right"><b>Product image</b></td>
		<td><input type="file" name="product_image" required /></td>
	
	</tr>
	
	<tr>
	
	    <td align="right"><b>Product price</b></td>
		<td><input type="text" name="product_price" required /></td>
	
	</tr>
	
	<tr>
	
	    <td align="right"><b>Product description</b></td>
		<td><textarea name="product_desc" cols="20" rows="10" required/></textarea></td>
	
	</tr>
	
	<tr>
	
	    <td align="right"><b>Product keywords</b></td>
		<td><input type="text" name="product_keywords"required/></td>
	
	</tr>
	<tr align="center">
	
		<td colspan="8"><input type="submit" name="insert_post" value="insert now" /></td>
	
	</tr>
	
</table>

</form>

</body>


</html>	

<?php

if(isset($_POST['insert_post'])){
	
	//to get text from form
	
	$products_cat=$_POST['products_cat'];
	$product_brand=$_POST['product_brand'];
	$product_title=$_POST['product_title'];
	$product_price=$_POST['product_price'];
	$product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];

   //to get image from form

	$product_image=$_FILES['product_image']['name'];
	$product_image_tmp=$_FILES['product_image']['tmp_name'];

	move_uploaded_file($product_image_tmp,"product_images/$product_image");
	
    $insert_product="INSERT INTO products (products_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) VALUES ('$products_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";	
   
   $insert_pro=mysqli_query($con,$insert_product);
   
   if($insert_pro){
	   
	   echo "<script>alert('product has been inserted!')</script>";
	   echo " <script>window.open('index.php?insert_product','_self')</script>";
   }
   else{
	   echo "error:".$insert_product."<br>".mysqli_error($con);
   }
   
}





?>
<?php } ?>