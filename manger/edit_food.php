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
	<title>Edit Food Menu</title>
</head>
<body>
	<div class="container">
		<h2 class="heading">Edit Food Menu Record</h2>
		<hr>			

			<div class="standardForm" style="margin-left:411px;">
				
				<?php
					if (isset($_GET['edit'])) {
						$Id=$_GET['edit'];
						$q = "SELECT * FROM food_tbl WHERE ID='$Id'";
						$r = mysqli_query($conn,$q);
						$row = mysqli_fetch_array($r);
						$newId = $row ['ID'];
					}

					if (isset($_POST['update'])) {
						$id1 = $newId;
            			$fname=$_POST['fname'];
            			$fprice=$_POST['fprice'];
						$uqry = "UPDATE food_tbl SET Food_Name='$fname', Food_Price='$fprice' WHERE ID='$id1'";
						$urun = mysqli_query($conn,$uqry);
						if ($urun) {
						 echo "<script>alert('Food Menu Updated')</script>";
					     echo "<script>location.replace('food_menu.php')</script>";
						}else{
						 echo "<script>alert('Record not updated')</script>";
						 echo "<script>location.replace('food_menu.php')</script>";
						}
					}


         			 if (isset($_POST['delete'])) {
           			 $dqry="DELETE FROM food_tbl WHERE ID='$newId'";
           			 $drun=mysqli_query($conn,$dqry);
           			 if ($drun) {
           			 echo "<script>alert('Food Record Deleted')</script>";
             		 echo "<script>location.replace('food_menu.php')</script>";
            }else{
            	  echo "<script>alert('Food Record not Deleted')</script>";
                   echo "<script>location.replace('food_menu.php')</script>";
            }
          }
				?>
				<?php 
        if (isset($_GET['edit'])) {
						$id=$_GET['edit'];
						$qry = "SELECT * FROM food_tbl WHERE ID='$id'";
						$run = mysqli_query($conn,$qry);
						while ($row = mysqli_fetch_array($run)) { ?>

				<form method="post" action="">

					<div class="form-group">
      					<label for="inputID4">ID</label>
      					<input type="text" class="form-control" id="inputFullName4" name="newid" value="<?php echo $row ['ID']; ?>"  disabled="">
    				</div>
    				<div class="form-group">
      						<label for="inputFoodName4">Food Name</label>
      						<input type="text" class="form-control" name="fname" id="inputFoodName4" value="<?php echo $row ['Food_Name']; ?>">
    					</div>
    				<div class="form-group">
      						<label for="inputFoodPrice4">Food Price</label>
      						<input type="number" class="form-control" name="fprice" id="inputFoodPrice4" value="<?php echo $row ['Food_Price']; ?>">
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


	</div>
	  <?php include '../footer.php'; ?>

</body>
</html>
<?php
}
?>