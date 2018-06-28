<?php
session_start();
if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else{
	

?>
<?php
include("includes/db.php");
if(isset($_GET['edit_brand'])){
	$brand_id=$_GET['edit_brand'];
	$get_brand="select * from brands where brand_id='$brand_id'";
	$run_brand=mysqli_query($con,$get_brand);
	$row_brand=mysqli_fetch_array($run_brand);
	$brand_id=$row_brand['brand_id'];
	$brand_title=$row_brand['brand_title'];
}

?>

<form action="" method="post"enctype="multipart/form-data">

<table align="center" width="795" border="2" bgcolor="orange">

    <tr align="center">
	
	    <td colspan="8"><h2>Update brand</h2></td>
	
	</tr>
	
	
	<tr>
	
	    
		<td>Product brand:<input type="text" name="products_brand" value="<?php echo $brand_title; ?>" /></td>
	
	</tr>
	
	
	<tr align="center">
	
		<td colspan="8"><input type="submit" name="update_post" value="update now" /></td>
	
	</tr>
	
</table>

</form>




<?php

if(isset($_POST['update_post'])){
	
	//to get text from form
	$update_id=$brand_id;
	
	$products_brand=$_POST['products_brand'];
	
	
    $update_brand="update brands set brand_title='$products_brand' where brand_id='$update_id'";	
   
   $insert_pro=mysqli_query($con,$update_brand);
   
   if($insert_pro){
	   
	   echo "<script>alert(' brand has been updated!')</script>";
	   echo " <script>window.open('index.php?insert_cat_brand','_self')</script>";
   }
   
}





?>
<?php } ?>




