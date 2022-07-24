<?php
session_start();
if (empty($_SESSION['uID'])) {
  echo '<script language="javascript">';
  echo 'alert("Please login to continue")';  
  echo '</script>';
  echo "<script>location.replace('../login.php')</script>";
}else{
include ('managerHeader.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hall Booking Request</title>
</head>
<body>
	<div class="container">
          <h2 class="heading">Hall Booking Request</h2>
          <hr>

            <div class="standardForm">
        <?php
          if (isset($_GET['edit'])) {
            $Id=$_GET['edit'];
            $q = "SELECT * FROM booking_tbl WHERE ID='$Id'";
            $r = mysqli_query($conn,$q);
            $row = mysqli_fetch_array($r);
            $newId = $row ['ID'];
          }
          if (isset($_POST['update'])) {
            $id1 = $newId;
            $newbooking = $_POST['newbooking'];
            
            $uqry = "UPDATE booking_tbl SET Booking='$newbooking' WHERE ID='$id1'";
            $urun = mysqli_query($conn,$uqry);
            if ($urun) {
              echo "<script>alert('Record updated')</script>";
              echo "<script>location.replace('hall_booking.php')</script>";
              }else{
               echo "<script>alert('Record still Not updated')</script>";
              echo "<script>location.replace('hall_booking.php')</script>";
              }
            }
        ?>
        <?php 
        if (isset($_GET['edit'])) {
            $id=$_GET['edit'];
            $qry = "SELECT * FROM booking_tbl WHERE ID='$id'";
            $run = mysqli_query($conn,$qry);
            while ($row = mysqli_fetch_array($run)) {
        ?>
        <form method="post" action="">
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputID4">ID</label>
                  <input type="text" class="form-control" id="inputID4" name="newid" value="<?php echo $row ['ID']; ?>"  disabled="">
              </div>
              <div class="form-group col-md-6">
                  <label for="inputHallName4">Hall Name</label>
                  <input type="text" class="form-control" name="hname" id="inputHallName4" value="<?php echo $row ['Hall_name']; ?>" disabled="">
              </div>
            </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputMaxPersons4">Max Persons</label>
                  <input type="text" class="form-control" name="nop" id="inputMaxPersons4" value="<?php echo $row ['Nop']; ?>" disabled="">
              </div>
              <div class="form-group col-md-6">
                  <label for="inputFoodMenu4">Food Menu</label>
                  <input type="text" class="form-control" name="menu" id="inputFoodMenu4" value="<?php echo $row ['Menu']; ?>" disabled="">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputStartTime4">Start Time</label>
                  <input type="text" class="form-control" name="stime" id="inputStartTime4" value="<?php echo $row ['Stime']; ?>" disabled="">
              </div>
              <div class="form-group col-md-6">
                  <label for="inputEndTime4">End Time</label>
                  <input type="text" class="form-control" name="etime" id="inputaddress4" value="<?php echo $row ['Etime']; ?>" disabled="">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputExtraFeature4">Extra Feature</label>
                  <input type="text" class="form-control" name="extra" id="inputExtraFeature4" value="<?php echo $row ['Extra']; ?>" disabled="">
              </div>
              <div class="form-group col-md-6">
                  <label for="inputBookingDate4">Booking Date</label>
                  <input type="text" class="form-control" name="Booking_date" id="inputBookingDate4" value="<?php echo $row ['Booking_date']; ?>" disabled="">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputTotalBill4">Total Bill</label>
                  <input type="text" class="form-control" name="totalbill" id="inputTotalBill4" value="<?php echo $row ['Total_bill']; ?>" disabled="">
              </div>
              <div class="form-group col-md-6">
                  <label for="inputBookingStatus">Booking Status</label>
                  <?php
                    $o1status = $row ['Booking'];
                    if ($o1status == "Pending") {
                      ?>
                      <select id="inputBooking" name="newbooking" class="form-control">
                        <option value="Pending" selected="">Pending</option>
                        <option value="Active">Active</option>
                        <option value="Past">Past</option>
                      </select>
                    <?php
                    }
                    ?>
                    <?php 
                    $o2status = $row ['Booking'];
                    if ($o2status == "Active") {
                      ?>
                      <select id="inputBooking" name="newbooking" class="form-control">
                        <option value="Pending">Pending</option>
                        <option value="Active" selected="">Active</option>
                        <option value="Past">Past</option>
                      </select>
                    <?php
                    }
                    ?>
                    <?php 
                    $o2status = $row ['Booking'];
                    if ($o2status == "Past") {
                      ?>
                      <select id="inputBooking" name="newbooking" class="form-control">
                        <option value="Pending">Pending</option>
                        <option value="Active">Active</option>
                        <option value="Past" selected="">Past</option>
                      </select>
                    <?php
                    }
                    ?>
              </div>
            </div>
            <div class="standardBtn">
              <button type="submit" class="btn btn-primary" name="update">Update</button>
              <button class="btn btn-danger" style="margin-left:75px;" type="reset">Clear</button>
            </div>
          </form>
          <?php
            }
          }
          ?>
      </div>


	</div>
    <?php include '../footer.php'; ?>

</body>
</html>
<?php
}
?>