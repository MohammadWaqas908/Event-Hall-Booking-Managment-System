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
	<meta charset="utf-8">
	<title>Edit Hall Timing</title>
</head>

<body>
			
	<div class="container">
    	<h2 class="heading">Update Hall Timing</h2>
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
          			  $stime=$_POST['stime'];
          			  $etime=$_POST['etime'];						
						$uqry = "UPDATE halls SET S_time='$stime', E_Time='$etime' WHERE ID='$id1'";
						$urun = mysqli_query($conn,$uqry);
						if ($urun) {
							echo '<script language="javascript">';
							echo 'alert("Hall Timing updated")';
							echo '</script>';
							echo "<script>location.replace('hall_timing.php')</script>";
						}else{
							echo '<script language="javascript">';
							echo 'alert("Hall Timing still not updated")';  
							echo '</script>';
							echo "<script>location.replace('hall_timing.php')</script>";
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
      						<input type="text" class="form-control" name="hname" id="inputHallName4" value="<?php echo $row ['Hall_name']; ?>" disabled="">
    					</div>
    					<div class="form-group col-md-6">
      						<label for="inputHallSize4">Hall Size</label>
      						<input type="text" class="form-control" name="hsize" id="inputHallSize4" value="<?php echo $row ['Hall_size']; ?>" disabled="">
    					</div>
  					</div>

  					<div class="form-row">

             	  <div class="form-group col-md-6">
                  <label for="inputHallRent4">Hall Rent</label>
                  <input type="number" class="form-control" name="hrent" id="inputHallRent4" value="<?php echo $row ['Hall_rent']; ?>" disabled="">
                   </div>

    					<div class="form-group col-md-6">
      						<label for="inputHallLocation4">Hall Location</label>
      						<input type="text" class="form-control" name="hlocation" id="inputHallLocation4" value="<?php echo $row ['Hall_location']; ?>" disabled="">
    					</div>
  					</div>

            <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputOpenTime4">Open Time</label>
                  <input type="time" class="form-control" name="stime"id="inputOpenTime4" value="<?php echo $row ['S_time']; ?>">
              </div>
              <div class="form-group col-md-6">
                  <label for="inputClosingTime4">Closing Time</label>
                  <input type="time" class="form-control" name="etime" id="inputClosingTime4" value="<?php echo $row ['E_Time']; ?>">
              </div>
            </div>
  				
  				<div class="standardBtn"> 
  			<button type="submit" class="btn btn-primary" name="update">Update</button>
  			<button type="reset" class="btn btn-danger" style="margin-left:75px; " name="delete">Delete</button>

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