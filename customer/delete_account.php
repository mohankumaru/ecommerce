
<h2 style="text-align:center;">DO yo really wanna delete your account</h2>
<form action="" method="post">
<br>
<input type="submit" name="yes" value="yes" />
<input type="submit" name="no" value="no" />

</form>
<?php
include("includes/db.php");
$user=$_SESSION['customer_email'];
if(isset($_POST['yes'])){
	$delete_customer="delete from customers where customer_email='$user'";
	$run_customer=mysqli_query($con,$delete_customer);
	echo "<script>alert('account deleted successfully')</script>";
	echo "<script>window.open('../index.php','_self')</script>";
}
if(isset($_POST['no'])){
	echo "<script>alert('thank you')</script>";
	echo "<script>window.open('my_account.php','_self')</script>";
}

?>