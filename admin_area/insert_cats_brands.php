<?php
include("includes/db.php");
if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else{

?>

<form action="insert_cat_brand.php" method="post"enctype="multipart/form-data">

<table align="center" width="795" border="2" bgcolor="orange">

    <tr align="center">
	
	    <td colspan="8"><h2>Insert new brand</h2></td>
	
	</tr>
	
	
	<tr>
	
	    
		<td>Product brand:<input type="text" name="products_brand" required /></td>
	
	</tr>
	
	
	<tr align="center">
	
		<td colspan="8"><input type="submit" name="insert_post" value="insert now" /></td>
	
	</tr>
	
</table>

</form>




<?php

if(isset($_POST['insert_post'])){
	
	//to get text from form
	
	$products_cat=$_POST['products_brand'];
	
	
    $insert_product="INSERT INTO brands (brand_title) VALUES ('$products_cat')";	
   
   $insert_pro=mysqli_query($con,$insert_product);
   
   if($insert_pro){
	   
	   echo "<script>alert('New brand has been inserted!')</script>";
	   echo " <script>window.open('index.php?insert_cats_brands','_self')</script>";
   }
   else{
	   echo "error:".$insert_product."<br>".mysqli_error($con);
   }
   
}





?>
<?php } ?>