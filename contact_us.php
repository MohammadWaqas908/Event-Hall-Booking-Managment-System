<?php
session_start();
include ('connection.php');
include ('header.php');
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$msg=$_POST['msg'];
	$qry = "INSERT INTO contactus_tbl(Name,Email,Message) VALUES('$name','$email','$msg')";
	$run = mysqli_query($conn,$qry);
	if ($run) {
		echo '<script language="javascript">';
		echo 'alert("Your Message is submited successfully")';  
		echo '</script>';
		echo "<script>location.replace('index.php')</script>";
	}else{
		echo '<script language="javascript">';
		echo 'alert("Your Message is not submited")';  
		echo '</script>';
		echo "<script>location.replace('index.php')</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
</head>
<body>
	<div class="main_container">
		<div class="contact_us">
			<div class="main-form-div">
				<div class="heading_div">
					<h2 class="heading">Contact Us:-</h2>			
				</div>
				<div class="form_div fluid-container">
					<form method="post" action="">
						<div class="form-group">
      						<label for="inputName4">Name</label>
      						<input type="text" class="form-control" name="name" id="inputname4" placeholder="Name">
 	   					</div>
  						<div class="form-group">
    						<label for="inputContactno.Email">Contact no./Email</label>
    						<input type="text" class="form-control" name="email" id="inputContactno.Email" placeholder="Contact No. or Email">
  						</div>
  						<div class="form-group">
    						<label for="inputMessage">Message</label>
    						<textarea class="form-control" rows="5" name="msg" id="Message" placeholder="Enter your message"></textarea>
  						</div>
  						<button type="submit" class="btn btn-success" name="submit">Submit</button>
  						<button type="reset" class="btn btn-danger" name="clr">Clear</button>
  					</form>
				</div>
			</div>
		</div>



		<div class="footer">
				
		</div>
	</div>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<?php include ('footer.php');?>
</body>
</html>
