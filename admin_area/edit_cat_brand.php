<?php
session_start();
if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else{
	

?>
<?php

include("includes/db.php");

if(isset($_GET['edit_cat_brand'])){
	$get_id=$_GET['edit_cat_brand'];
	$get_pro="select * from categories where cat_id='$get_id'";
$run_pro=mysqli_query($con,$get_pro);
$row_pro=mysqli_fetch_array($run_pro);
	$pro_id=$row_pro['cat_id'];
	$pro_title=$row_pro['cat_title'];


}

?>



<form action=" " method="post"enctype="multipart/form-data">

<table align="center" width="795" border="2" bgcolor="orange">

    <tr align="center">
	
	    <td colspan="8"><h2>Edit category</h2></td>
	
	</tr>
	
	
	<tr>
	
	    
		<td>Product category:<input type="text" name="cat_title"  value="<?php echo $pro_title; ?>" /></td>
	
	</tr>
	
	
	<tr align="center">
	
		<td colspan="8"><input type="submit" name="update_post" value="update now" /></td>
	
	</tr>
	
</table>

</form>




<?php

if(isset($_POST['update_post'])){
	
	//to get text from form
	
	$products_cat=$_POST['cat_title'];
	$products_id=$_POST['cat_id'];
	
    $update_product="update categories set cat_title='$products_cat'";
   
   $insert_pro=mysqli_query($con,$update_product);
   
   if($insert_pro){
	   
	   echo "<script>alert(' category has been updated!')</script>";
	   echo " <script>window.open('index.php?insert_cat_brand','_self')</script>";
   }
   else{
	   echo "error:".$insert_product."<br>".mysqli_error($con);
   }
   
}





?>





<?php

include("includes/db.php");

if(isset($_GET['edit_cat_brand'])){
	$get_id1=$_GET['edit_cat_brand'];
	$get_pro1="select * from brands where brand_id='$get_id1'";
$run_pro1=mysqli_query($con,$get_pro1);
$row_pro1=mysqli_fetch_array($run_pro1);
	$pro_id1=$row_pro1['brand_id'];
	$pro_title1=$row_pro1['brand_title'];


}

?>



<form action=" " method="post"enctype="multipart/form-data">

<table align="center" width="795" border="2" bgcolor="orange">

    <tr align="center">
	
	    <td colspan="8"><h2>Edit category</h2></td>
	
	</tr>
	
	
	<tr>
	
	    
		<td>Product brand:<input type="text" name="brand_title"  value="<?php echo $pro_title1; ?>" /></td>
	
	</tr>
	
	
	<tr align="center">
	
		<td colspan="8"><input type="submit" name="update_post" value="update now" /></td>
	
	</tr>
	
</table>

</form>




<?php

if(isset($_POST['update_post'])){
	
	//to get text from form
	
	$products_cat1=$_POST['brand_title'];
	$products_id1=$_POST['brand_id'];
	
    $update_product="update brands set brand_title='$products_cat1'";
   
   $insert_pro=mysqli_query($con,$update_product);
   
   if($insert_pro){
	   
	   echo "<script>alert(' Brand has been updated!')</script>";
	   echo " <script>window.open('index.php?insert_cat_brand','_self')</script>";
   }
   else{
	   echo "error:".$insert_product."<br>".mysqli_error($con);
   }
   
}





?>
<?php } ?>



