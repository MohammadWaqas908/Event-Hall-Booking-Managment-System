<?php
session_start();
if (empty($_SESSION['uID'])) {
  echo '<script language="javascript">';
  echo 'alert("Please login to continue")';  
  echo '</script>';
  echo "<script>location.replace('../login.php')</script>";
}else{
include ('managerHeader.php');
if (isset($_POST['add'])) {
  $fname=$_POST['fname'];
  $fprice=$_POST['fprice'];
  $qry="INSERT INTO feature_tbl(Feature_Name, Feature_Price) VALUES('$fname','$fprice')";
  $run=mysqli_query($conn,$qry);
  if ($run) {
    echo "<script>alert('New Feature Added Successfully')</script>";

  }else{
        echo "<script>alert('New Feature still not added check query')</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Extra Features</title>
</head>
<body>
	<div class="container">

  <h2 class="heading">Add Extra Feature</h2> 
   <hr>

   <!-- AddExtraFeatureForm -->

   <div class="standardForm" style="margin-left:411px; ">
    <form method="post">
              <div class="form-group">
                <label for="inputFoodName">Feature Name</label>
                <input type="text" class="form-control" id="inputFeatureName" name="fname" placeholder="Enter Feature Name">
              </div>
              <div class="form-group">
                <label for="inputFeaturePrice">Feature Price</label>
                <input type="number" class="form-control" id="inputFeaturePrice" name="fprice" placeholder="Enter Feature Price">
              </div>
              <button type="submit" name="add" class="btn btn-primary">Add</button>
              <button type="reset" class="btn btn-danger">Clear</button>
          </form>
   </div>


    <!-- DisplayExtraFeatureList -->
      <br>
    <h2 class="heading">List of Extra Feature with Price</h2>
    <hr>
		
    <div class="standardTable" style="margin-top:-90px; text-align: center;">
          <table class="table table-bordered">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Feature Name</th>
                <th scope="col">Feature Price</th>
                <th scope="col">Manage</th>
            </tr>
        <?php
          $sqry = "SELECT * FROM feature_tbl";
          $srun = mysqli_query($conn,$sqry);
          while ($row = mysqli_fetch_array($srun)) 
          {
        ?>  
              <tr>
                <td><?php echo $row ['ID']; ?></td>
                <td><?php echo $row ['Feature_Name']; ?></td>
                <td><?php echo $row ['Feature_Price']; ?></td>
                <td><a href="edit_extra.php?edit=<?php echo $row ['ID']; ?>" name="" class="btn btn-danger btn-sm">Update/Delete</a></td>
              </tr>
        <?php
          echo "<br>";
          }
        ?>
        </table>
    </div>


 
	</div>
</body>
</html>
<?php
}
?>