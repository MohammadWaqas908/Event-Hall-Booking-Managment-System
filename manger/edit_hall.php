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

<body>
	<div class="container">
        <h2 class="heading">Edit Hall Record</h2> 
        <hr>  
        <div class="standardForm">
        <?php
          if (isset($_GET['edit'])) {
            $Id=$_GET['edit'];
            $q = "SELECT * FROM halls WHERE ID='$Id'";
            $r = mysqli_query($conn,$q);
            $row = mysqli_fetch_array($r);
            $newId = $row ['ID'];
            
          }
          if (isset($_POST['update'])) {
            $id1 = $newId;
            $hname=$_POST['hname'];
            $hsize=$_POST['hsize'];
            $etype=$_POST['etype'];
            $hrent=$_POST['hrent'];
            $hlocation=$_POST['hlocation'];
            $minimum=$_POST['minimum'];
            
            $uqry = "UPDATE halls SET Hall_name='$hname', Hall_size='$hsize', Event_type='$etype', Hall_rent='$hrent', Hall_location='$hlocation', Minimum='$minimum' WHERE ID='$id1'";
            $urun = mysqli_query($conn,$uqry);
            if ($urun) {
              echo "<script>alert('Record updated Successfully')</script>";
              echo "<script>location.replace('manager_dash.php')</script>";
            }else{
              echo "<script>alert('Record not updated')</script>";
              echo "<script>location.replace('manager_dash.php')</script>";
            }
          }
          if (isset($_POST['delete'])) {
            $dqry="DELETE FROM halls WHERE ID='$newId'";
            $drun=mysqli_query($conn,$dqry);
            if ($drun) {
              echo '<script language="javascript">';
              echo 'alert("Record Deleted")';
              echo '</script>';
              echo "<script>location.replace('manager_dash.php')</script>";
            }else{
              echo '<script language="javascript">';
              echo 'alert("Record not Deleted")';  
              echo '</script>';
              echo "<script>location.replace('manager_dash.php')</script>";
            }
          }
        ?>
        <?php 
        if (isset($_GET['edit'])) {
            $id=$_GET['edit'];
            $qry = "SELECT * FROM halls WHERE ID='$id'";
            $run = mysqli_query($conn,$qry);
            while ($row = mysqli_fetch_array($run)) {
        ?>
        <form method="post" action="">

          <div class="form-group">
                <label for="inputID4">ID</label>
                <input type="text" class="form-control" id="inputFullName4" name="newid" value="<?php echo $row ['ID']; ?>"  disabled="">
            </div>

          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputHallName4">Hall Name</label>
                  <input type="text" class="form-control" name="hname" id="inputHallName4" value="<?php echo $row ['Hall_name']; ?>">
              </div>
              <div class="form-group col-md-6">
                  <label for="inputHallSize4">Hall Size</label>
                  <input type="number" class="form-control" name="hsize" id="inputHallSize4" value="<?php echo $row ['Hall_size']; ?>">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputEventType4">Event Type</label>
                  <input type="text" class="form-control" name="etype" id="inputEventType4" value="<?php echo $row ['Event_type']; ?>">
              </div>
              <div class="form-group col-md-6">
                  <label for="inputHallRent4">Hall Rent</label>
                  <input type="number" class="form-control" name="hrent" id="inputHallRent4" value="<?php echo $row ['Hall_rent']; ?>">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputHallLocation4">Hall Location</label>
                  <input type="text" class="form-control" name="hlocation" id="inputHallLocation4" value="<?php echo $row ['Hall_location']; ?>">
              </div>
              <div class="form-group col-md-6">
                  <label for="inputMinimumPerson4">Minimum Person</label>
                  <input type="number" class="form-control" name="minimum" id="inputMinimumPerson4" value="<?php echo $row ['Minimum']; ?>">
              </div>
            </div>
             
           
            <div class="standardBtn">
            <button type="submit" class="btn btn-success" name="update">Update</button>
            <button type="submit" class="btn btn-danger" style="margin-left:75px; " name="delete">Delete</button>
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