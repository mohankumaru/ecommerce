
<?php
session_start();
if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else{
	

?>
<?php
include("includes/db.php");
if(isset($_GET['edit_cat'])){
	$cat_id=$_GET['edit_cat'];
	$get_cat="select * from categories where cat_id='$cat_id'";
	$run_cat=mysqli_query($con,$get_cat);
	$row_cat=mysqli_fetch_array($run_cat);
	$cat_id=$row_cat['cat_id'];
	$cat_title=$row_cat['cat_title'];
}

?>

<form action="" method="post"enctype="multipart/form-data">

<table align="center" width="795" border="2" bgcolor="orange">

    <tr align="center">
	
	    <td colspan="8"><h2>Update category</h2></td>
	
	</tr>
	
	
	<tr>
	
	    
		<td>Product category:<input type="text" name="products_cat" value="<?php echo $cat_title; ?>" /></td>
	
	</tr>
	
	
	<tr align="center">
	
		<td colspan="8"><input type="submit" name="update_post" value="update now" /></td>
	
	</tr>
	
</table>

</form>




<?php

if(isset($_POST['update_post'])){
	
	//to get text from form
	$update_id=$cat_id;
	
	$products_cat=$_POST['products_cat'];
	
	
    $update_cat="update categories set cat_title='$products_cat' where cat_id='$update_id'";	
   
   $insert_pro=mysqli_query($con,$update_cat);
   
   if($insert_pro){
	   
	   echo "<script>alert(' category has been updated!')</script>";
	   echo " <script>window.open('index.php?insert_cat_brand','_self')</script>";
   }
   else{
	   echo "error:".$insert_product."<br>".mysqli_error($con);
   }
   
}





?>
<?php } ?>




