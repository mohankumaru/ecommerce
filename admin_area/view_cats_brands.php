<?php
session_start();
if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else{
	

?>
<table width="795" align="center" bgcolor="pink">

 <tr align="center">
    <td colspan="6"><h2>View all Categories and Brands here</h2></td>
 
 </tr>
 
 <tr align="center" bgcolor="white">
    <th>Category ID</th>
	    <th>Categories</th>
		    
				    <th>Edit</th>
					    <th>Delete</th>
 </tr>

<?php
include("includes/db.php");
$get_pro="select * from categories";
$run_pro=mysqli_query($con,$get_pro);

$i=0;
while($row_pro=mysqli_fetch_array($run_pro)){
	$pro_id=$row_pro['cat_id'];
	$pro_title=$row_pro['cat_title'];
	$i++;


?>
<tr>
    <td><?php echo $pro_id; ?></td>
	 <td><?php echo $pro_title; ?></td>
	 <td><a href="index.php?edit_cat=<?php echo $pro_id;?>">Edit</a></td>
		 <td><a href="delete_cat.php?delete_cat=<?php echo $pro_id;?>">Delete</a></td>
	    
</tr>
<?php } ?>




</table>

<br><br>


<table width="795" align="center" bgcolor="pink">

 <tr align="center">
    <td colspan="6"><h2>View all Categories and Brands here</h2></td>
 
 </tr>
 
 <tr align="center" bgcolor="white">
    <th>Brand ID</th>
	    <th>Brands</th>
		    
				    <th>Edit</th>
					    <th>Delete</th>
 </tr>

<?php
include("includes/db.php");
$get_pro="select * from brands";
$run_pro=mysqli_query($con,$get_pro);

$i=0;
while($row_pro=mysqli_fetch_array($run_pro)){
	$pro_id1=$row_pro['brand_id'];
	$pro_title1=$row_pro['brand_title'];
	$i++;


?>
<tr>
    <td><?php echo $pro_id1; ?></td>
	 <td><?php echo $pro_title1; ?></td>
	 <td><a href="index.php?edit_brand=<?php echo $pro_id1;?>">Edit</a></td>
		 <td><a href="delete_brand.php?delete_brand=<?php echo $pro_id1;?>">Delete</a></td>
	    
</tr>
<?php } ?>




</table>
<?php } ?>
