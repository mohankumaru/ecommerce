<?php
session_start();
if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else{
	

?>
<?php
include("includes/db.php");
if(isset($_GET['delete_cat'])){
$delete_id=$_GET['delete_cat'];
$delete_pro="delete from categories where cat_id='$delete_id'";
$run_delete=mysqli_query($con,$delete_pro);
if(run_delete){
	echo"<script>alert('Category has been deleted')</script>";
	echo"<script>window.open('index.php?view_cats_brands','_self')</script>";
}
}

<?php } ?>
