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
   		<h4 class="heading">Edit Extra feture Record </h4>
   		<hr>			

			
			<div class="standardForm" style="margin-left:411px;">
				<?php
					if (isset($_GET['edit'])) {
						$Id=$_GET['edit'];
						$q = "SELECT * FROM feature_tbl WHERE ID='$Id'";
						$r = mysqli_query($conn,$q);
						$row = mysqli_fetch_array($r);
						$newId = $row ['ID'];
						
					}
					if (isset($_POST['update'])) {
						$id1 = $newId;
            $fname=$_POST['fname'];
            $fprice=$_POST['fprice'];
						
						$uqry = "UPDATE feature_tbl SET Feature_Name='$fname', Feature_Price='$fprice' WHERE ID='$id1'";
						$urun = mysqli_query($conn,$uqry);
						if ($urun) {
							echo "<script>alert('Record Updated')</script>";
							echo "<script>location.replace('extra.php')</script>";
						}else{
							echo "<script>alert('Record Not Updated')</script>";
							echo "<script>location.replace('extra.php')</script>";
						}
					}
          if (isset($_POST['delete'])) {
            $dqry="DELETE FROM feature_tbl WHERE ID='$newId'";
            $drun=mysqli_query($conn,$dqry);
            if ($drun) {
              echo "<script>alert('Record Deleted')</script>";
              echo "<script>location.replace('extra.php')</script>";
            }else{
              echo "<script>alert('Record Not Deleted')</script>";
              echo "<script>location.replace('extra.php')</script>";
            }
          }
				?>
				<?php 
        if (isset($_GET['edit'])) {
						$id=$_GET['edit'];
						$qry = "SELECT * FROM feature_tbl WHERE ID='$id'";
						$run = mysqli_query($conn,$qry);
						while ($row = mysqli_fetch_array($run)) {
				?>
				<form method="post" action="">
					<div class="form-group">
      					<label for="inputID4">ID</label>
      					<input type="text" class="form-control" id="inputFullName4" name="newid" value="<?php echo $row ['ID']; ?>"  disabled="">
    				</div>
    				<div class="form-group">
      						<label for="inputFeatureName4">Feature Name</label>
      						<input type="text" class="form-control" name="fname" id="inputFeatureName4" value="<?php echo $row ['Feature_Name']; ?>">
    					</div>
    						<div class="form-group">
      						<label for="inputFeaturePrice4">Feature Price</label>
      						<input type="number" class="form-control" name="fprice" id="inputFeaturePrice4" value="<?php echo $row ['Feature_Price']; ?>">
    					</div>
					
  					<button type="submit" class="btn btn-success" name="update">Update</button>
                  <button type="submit" class="btn btn-danger" name="delete">Delete</button>
  				</form>
  				<?php
  					}
  				}
  				?>
		</div>


	</div>
	  <?php include '../footer.php'; ?>

</html>
<?php
}
?>