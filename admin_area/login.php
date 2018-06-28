<?php
@session_start();
include("includes/db.php");
?>

<div>

<form method="post" action="">

<table width="500" align="center" bgcolor="skyblue">

<tr align="center">
    <td colspan="5"><h2>Login to controll</h2></td>
</tr>
<tr>
    <td align="right"> Email:  </td>
	<td><input type="text" name="email" placeholder="enter email" /></td>
</tr>
<tr>
    <td align="right">password:</td>
	<td><input type="password" name="pass" placeholder="enter password" /></td>
</tr>
<tr align="center">
  <td colspan="3"><a href="checkout.php?forgot_pass">Forgot password?</a></td>
</tr>
<tr align="center">
   <td colspan="5"><input type="submit" name="login" value="Login" /></td>
</tr>

</table>


</form>

</div>


 <?php
    if(isset($_POST['login'])){
		$admin_email=$_POST['email'];
		$admin_pass=$_POST['pass'];
		$sel_admin="select * from admins where user_email='$admin_email' AND user_pass='$admin_pass'";
		$run_admin=mysqli_query($con,$sel_admin);
		if(mysqli_num_rows($run_admin)>0){
			$_SESSION['user_email']=$admin_email;
			echo "<script>window.open('index.php','_self')</script>";
		}
		else{
			echo "<script>alert('incorrect password or email')</script>";
		}
	}



?>