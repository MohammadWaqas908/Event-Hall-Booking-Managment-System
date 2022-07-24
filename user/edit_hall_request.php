<?php
session_start();
if (empty($_SESSION['uID'])) {
  echo '<script language="javascript">';
  echo 'alert("Please login to continue")';  
  echo '</script>';
  echo "<script>location.replace('../login.php')</script>";
}else{
include ('userHeader.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Booking Record</title>
</head>

<body>
  <div class="container">

    <h3 class="heading"> Edit Booking Records</h3>
    <hr width="700px">
    <!-- EditBooking -->
    <div class="standardForm">
      <?php
          if (isset($_GET['edit'])) {
            $Id=$_GET['edit'];
            $q = "SELECT * FROM booking_tbl WHERE ID='$Id'";
            $r = mysqli_query($conn,$q);
            $row1 = mysqli_fetch_array($r);
            $newId = $row1 ['ID'];
            
          }
          if (isset($_POST['update'])) {
            $id1 = $newId;
            $nop=$_POST['nop'];
            $stime=$_POST['stime'];
            $etime=$_POST['etime'];
            $bdate=$_POST['bdate'];
            $uqry = "UPDATE booking_tbl SET Nop='$nop', Stime='$stime', Etime='$etime', Booking='Pending' WHERE ID='$id1'";
            $urun = mysqli_query($conn,$uqry);
            if ($urun) {
              echo "<script>alert('Record updated')</script>";
              echo "<script>location.replace('booking_request.php')</script>";
            }else{
              echo "<script>alert('Record not updated')</script>";
              echo "<script>location.replace('booking_request.php')</script>";
            }
          }
          if (isset($_POST['delete'])) {
            $dqry="DELETE FROM booking_tbl WHERE ID='$newId'";
            $drun=mysqli_query($conn,$dqry);
            if ($drun) {
             echo "<script>alert('Record Deleted')</script>";
              echo "<script>location.replace('booking_request.php')</script>";
            }else{
              echo "<script>alert('Record not Deleted')</script>";
              echo "<script>location.replace('booking_request.php')</script>";
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
        <!-- edit form -->
        <div class="fluid-container reg_form">
      <form method="post" action="" enctype="multipart/form-data">
        
          <!-- firstLastname -->
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputFirstName4">Booking ID:</label>
                <input type="text" class="form-control" name="id" id="inputHallName4" value="<?php echo $row ['ID']; ?>" disabled="">
            </div>
            <div class="form-group col-md-6">
                <label for="inputLastName4">Hall Name:</label>
                <input type="text" class="form-control" name="hname" id="inputHallName4" value="<?php echo $row ['Hall_name']; ?>" disabled="">
            </div>
          </div>

          <!-- CNIC&Contact -->
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCnic">Event Type:</label>
               <input type="text" class="form-control" name="etype" id="inputEventType4" value="<?php echo $row ['Event_type']; ?>" disabled="">
            </div>
            <div class="form-group col-md-6">
                <label for="inputContactNo4">Total Person: </label>
                <input type="number" class="form-control" name="nop" id="inputnop4" value="<?php echo $row ['Nop']; ?>">
            </div>
          </div>

          <!-- AddressEmail -->
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="Email4">Food Menu:</label>
                <input type="text" class="form-control" name="menu" id="inputMenu4" value="<?php echo $row ['Menu']; ?>" disabled="">
            </div>
          <div class="form-group col-md-6">
            <label for="inputAddress">Extra Feature:</label>
            <input type="text" class="form-control" name="extra" id="inputExtra4" value="<?php echo $row ['Extra']; ?>" disabled="">
          </div>
        </div>

          <!-- UserNamePassword -->
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputUsername4">Start Time:</label>
                <input type="time" class="form-control" name="stime" id="inputStart time4" value="<?php echo $row ['Stime']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">End Time:</label>
                <input type="time" class="form-control" name="etime" id="inputEndtime4" value="<?php echo $row ['Etime']; ?>">
            </div>
          </div>

             <!-- UserNamePassword -->
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputUsername4">Booking Date:</label>
                <input type="date" class="form-control" name="bdate" id="inputHallRent4" value="<?php echo $row ['Booking_date']; ?>" min="" >
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Total Bill:</label>
                <input type="text" class="form-control" name="tbill" id="inputTotalBill4" value="<?php echo $row ['Total_bill']; ?>" disabled="">
            </div>
          </div>

          <!-- submitClearBtn -->
        <div class="standardBtn">
            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <button type="submit" class="btn btn-danger"  name="delete">Delete</button>
        </div>

      </form>
        <?php
            }
          }
          ?>
    </div>
    <!-- editBooking End -->

  </div>
  
</div>
 <?php include '../footer.php'; ?>
</body>
</html>
<?php
}
?>