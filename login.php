<?php
session_start();
include ('header.php');
if (isset($_POST['register'])) {
	header("Location: register.php");
}

if (isset($_POST['login'])) {
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];

	$qry = "SELECT * FROM register_tbl WHERE Username = '$uname' AND Password = '$pass'";
	$run = mysqli_query($conn,$qry);
	if ($run->num_rows>0) {
		$_SESSION['Username']="";
		$rows=$run->fetch_assoc();
		$_SESSION['uID']=$rows['ID'];
		$_SESSION['Username']=$rows['Username'];
		$_SESSION['uStatus']=$rows['Status'];
		$status=$_SESSION['uStatus'];
		if ($status=="User") {
			echo "<script>alert('Wellcome to User Dashboard!')</script>";
			echo "<script>location.replace('././user/user_dash.php')</script>";
		}elseif ($status=="Manager") {
			echo "<script>alert('Wellcome to Manager Dashboard!')</script>";
			echo "<script>location.replace('././manger/manager_dash.php')</script>";
		}elseif ($status=="Admin") {
			echo "<script>alert('Wellcome to Admin Dashboard!')</script>";
			echo "<script>location.replace('././admin/admin_dash.php')</script>";
		}
	}else{
		echo "<script>alert('Invalid Username or Password')</script>";
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>

	<div class="main_container">
		<div class="main-form-div">
			<div class="heading_div">
				<h2 class="heading">Login</h2>			
			</div>
			<div class="form_div fluid-container">
				<form method="post" action="">

					<!-- UsernameTB -->
					<div class="form-group">
      					<label for="inputUserName4">Username</label>
      					<input type="text" class="form-control" name="uname" id="inputUsername4" placeholder="Enter Username">
    				</div>
    				
    				<!-- PasswordTB -->
  					<div class="form-group">
    					<label for="inputPassword">Password</label>
    					<input type="password" class="form-control" name="pass" id="inputPassword" placeholder="Enter Password">
  					</div>
	  				<!-- SubitBtn -->
	  				<button type="submit" class="btn btn-primary" name="login">Login</button>
	  				<button type="submit" class="btn btn-success" name="register">SignUp</button>
  				</form>
			</div>
		</div> 
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
