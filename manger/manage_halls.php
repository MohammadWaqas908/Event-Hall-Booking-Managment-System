<?php
session_start();
if (empty($_SESSION['uID'])) {
  echo '<script language="javascript">';
  echo 'alert("Please login to continue")';  
  echo '</script>';
  echo "<script>location.replace('../login.php')</script>";
}else{
include ('managerHeader.php');
if (isset($_POST['submit'])) {
    $hname=$_POST['hname'];
    $hsize=$_POST['hsize'];
    $etype=$_POST['etype'];
    $hrent=$_POST['hrent'];
    $hcity=$_POST['hcity'];
    $hlocation=$_POST['hlocation'];
    /*Uploading images*/
    $UploadFileDir = './img/';
    $fileName = $_FILES['himage']['name'];
    $fileTmpPath = $_FILES['himage']['tmp_name'];
    $dest_path = $UploadFileDir . $fileName;
    move_uploaded_file($fileTmpPath, $dest_path);
    
    $mperson=$_POST['mperson'];
    $stime=$_POST['stime'];
    $etime=$_POST['etime'];
    $Query="INSERT INTO halls(Hall_name, Hall_size, Event_type, Hall_rent, City, Hall_location, Hall_image, Minimum, S_time, E_time) VALUES ('$hname','$hsize','$etype','$hrent','$hcity','$hlocation','$fileName','$mperson','$stime','$etime')";
      $run=mysqli_query($conn,$Query);
      if ($run) {
          echo "<script>alert('Hall Added Successfully')</script>";
           echo "<script>location.replace('manager_dash.php')</script>";
      }else{
          echo "<script>alert('Hall still not added check the data')</script>";
      }
    }
  
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add New Hall</title>
</head>

<body>
	<div class="container">
	      <h3 class="heading">Add New Hall</h3>
        <hr>
        <div class="standardForm">
           <form method="post" action="" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputHallName4">Hall Name</label>
                <input type="text" name="hname" minlength="3" placeholder="Enter Hall name" class="form-control" id="inputHallNameName4" required="">
            </div>
            <div class="form-group col-md-6">
                <label for="inputHallSize4">Hall Size</label>
                <input type="number" name="hsize" minlength="3" placeholder="Enter hall size in square feet" class="form-control" id="inputHallSize4" required="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEventType">Event Type</label>
                <input type="text" name="etype" class="form-control" id="inputEventType" placeholder="Enter Event Type" required="">
            </div>
            <div class="form-group col-md-6">
                <label for="inputHallRent">Hall Rent</label>
                <input type="text" name="hrent" class="form-control" id="inputHallRent" placeholder="Enter Hall Rent" required="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputHallCity">Hall City</label>
              <input type="text" name="hcity" minlength="3" class="form-control" id="inputHallCity" placeholder="Enter city like Layyah" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputHallLocation">Hall Location</label>
              <input type="text" name="hlocation" minlength="3" class="form-control" id="inputHallLocation" placeholder="Enter Hall Location" required="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputContactNo4">Hall image</label>
              <div class="custom-file">
                <input type="file" class="up"  name="himage" required="" style="margin-left:20px; ">
              </div>
            </div>
            <div class="form-group col-md-6">
                <label for="MinimumPerson4">Minimum Person</label>
                <input type="number" name="mperson" placeholder="Enter minimum no. of person" class="form-control" id="inputMinimumPerson4" required="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputHallAvailability4">Hall Availability</label>
                <input type="time"  name="stime" class="form-control" id="inputHallAvailability4" required="">
            </div>
            <div class="form-group col-md-6">
                <br>
                <input type="time"  name="etime" class="form-control" style="margin-top: 8px;" id="inputHallAvailability4" required="">
            </div>

               <!-- submitClearBtn -->
        <div class="standardBtn">
          <button class="btn btn-primary"  name="submit" type="submit">Submit</button>
          <button class="btn btn-danger" style="margin-left:75px; " type="reset">Clear</button>
        </div>
      </form>
        </div>
	</div>

  </div>
    <?php include '../footer.php'; ?>

</body>
</html>
<?php
}
?>