<?php
@session_start();
include("includes/db.php");
?>

<div>

<form method="post" action="">

<table width="800" align="center" bgcolor="#7ecoee">

<tr align="center">
    <td colspan="5"><h2>Login to buy</h2></td>
</tr>
<tr>
    <td align="right"> Email:  </td>
	<td colspan="5"><input type="text" name="email" placeholder="enter email" /></td>
</tr>
<tr>
    <td align="right">password:</td>
	<td colspan="5"><input type="password" name="pass" placeholder="enter password" /></td>
</tr>
<tr align="center">
  <td colspan="3"><a href="checkout.php?forgot_pass">Forgot password?</a></td>
</tr>
<tr align="center">
   <td colspan="5"><input type="submit" name="login" value="Login" /></td>
</tr>

</table>
<h2 style="float:left;padding;5px;text-decoration:none;"><a style="text-decoration:none;" href="customer_register.php">New register</a><h2>

</form>

</div>


 <?php
    if(isset($_POST['login'])){
		$customer_email=$_POST['email'];
		$customer_pass=$_POST['pass'];
		$sel_customer="select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
		$run_customer=mysqli_query($con,$sel_customer);
		if(mysqli_num_rows($run_customer)>0){
			$_SESSION['customer_email']=$customer_email;
			echo "<script>window.open('indexa.php','_self')</script>";
		}
		else{
			echo "<script>alert('incorrect password or email')</script>";
		}
	}



?>