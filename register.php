<?php
include ('header.php');

// save data into variables
	if (isset($_POST['submit'])) {
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$cnic=$_POST['cnic'];
    	$address=$_POST['address'];
	  	$contact_no=$_POST['contact_no'];
	  	$email=$_POST['email'];
	  	$uname=$_POST['uname'];
	  	$pass=$_POST['pass'];
	  	$status="User";
	  	$sqry="SELECT * FROM register_tbl WHERE Username='$uname'";
    	$srun=mysqli_query($conn,$sqry);
      $IsUser = mysqli_num_rows($srun);

     if (!is_numeric($cnic)) {
        echo "<script>alert('Enter your CNIC no like: 3320211223217')</script>";
       }
      elseif (!is_numeric($contact_no)) {
       echo "<script>alert('Enter your contact no like:03123456789 ')</script>";
        }
       elseif ($IsUser==1) {
        echo "<script>alert('Username already exist, Use another Username')</script>";
       }
      else{
      	// InsertDataDb
          $Query="INSERT INTO register_tbl(F_name, L_name, Cnic, Profile_pic, Address, Contact_no, Email_address, Username, Password, Status) VALUES ('$fname','$lname','$cnic','pic','$address','$contact_no','$email','$uname','$pass','$status')";
          
          // isDataSave
          $run=mysqli_query($conn,$Query);
           if ($run) {
          echo "<script>alert('Profile Created Successfully')</script>";
          echo "<script>location.replace('login.php')</script>";
            }
          
          else{
           echo "<script>alert('Profile not created,Try Again!')</script>";
           }           
         
          }
          
      

  }
?>


<!DOCTYPE html>
<html>
<body>
	<div class="main_container">
	
		<div class="frm_heading">
			<h3 class="heading">Registration Panel</h3>
		</div>

		<div class="fluid-container reg_form">
			<form method="post" action="" enctype="multipart/form-data">
  			
        	<!-- firstLastname -->
          <div class="form-row">
    				<div class="form-group col-md-6">
      					<label for="inputFirstName4">First Name</label>
      					<input type="text" name="fname" minlength="3" placeholder="Enter your first name" class="form-control" id="inputFirstName4" required="">
    				</div>
    				<div class="form-group col-md-6">
      					<label for="inputLastName4">Last Name</label>
      					<input type="text" name="lname" minlength="3" placeholder="Enter your last name" class="form-control" id="inputLastName4" required="">
    				</div>
  				</div>

          <!-- CNIC&Contact -->
  				<div class="form-row">
    				<div class="form-group col-md-6">
      					<label for="inputCnic">CNIC No</label>
      					<input type="text" name="cnic" minlength="13" maxlength="13" placeholder="Enter your cnic no" class="form-control" id="inputFirstName4" required="">
    				</div>
            <div class="form-group col-md-6">
                <label for="inputContactNo4">Contact No.</label>
                <input type="text"  placeholder="Enter your contact no" minlength="11" maxlength="11" name="contact_no" class="form-control" id="inputContactNo4" required="">
            </div>
  				</div>

          <!-- AddressEmail -->
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="Email4">Email</label>
                <input type="email" name="email" placeholder="Enter your eamil" class="form-control" id="inputEmail4" required="">
            </div>
          <div class="form-group col-md-6">
            <label for="inputAddress">Address</label>
            <input type="text" name="address" minlength="3" class="form-control" id="inputAddress" placeholder="Enter your Address" required="">
          </div>
        </div>

  				<!-- UserNamePassword -->
  				<div class="form-row">
    				<div class="form-group col-md-6">
      					<label for="inputUsername4">Username</label>
      					<input type="text"  name="uname" minlength="3" placeholder="Enter your Username" class="form-control" id="inputUsername4" required="">
    				</div>
    				<div class="form-group col-md-6">
      					<label for="inputPassword4">Password</label>
      					<input type="password" name="pass" minlength="3" placeholder="Enter your Password" class="form-control" id="inputPassword4" required="">
    				</div>
  				</div>

          <!-- submitClearBtn -->
        <div class="standardBtn">
          <button class="btn btn-primary"  name="submit" type="submit">Submit</button>
          <button class="btn btn-danger" type="reset">Clear</button>
        </div>

			</form>

		</div>
	</div>
  <?php include ('footer.php');?>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>