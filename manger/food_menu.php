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
    $qry="INSERT INTO food_tbl(Food_Name, Food_Price) VALUES('$fname','$fprice')";
    $run=mysqli_query($conn,$qry);
    if ($run) {
            echo "<script>alert('Food Menu Added Successfully')</script>";
    
    }else{
            echo "<script>alert('Food Menu still not added check query')</script>";
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Food Menu</title>
</head>

<body>
	<div class="container">
          <h2 class="heading">Add Food Menu</h2> 
          <hr>  

            <!-- Addform form  -->
            <div class="standardForm" style="margin-left:411px; ">
          <form method="post">
              <div class="form-group">
                <label for="inputFoodName">Food Name</label>
                <input type="text" class="form-control" id="inputFoodName" name="fname" placeholder="Enter Food Name">
              </div>
              <div class="form-group">
                <label for="inputFoodPrice">Food Price</label>
                <input type="number" class="form-control" id="inputFoodPrice" name="fprice" placeholder="Enter Food Price">
              </div>
              <button type="submit" name="add" class="btn btn-primary">Add</button>
              <button type="reset" class="btn btn-danger">Clear</button>
            </form>
          </div>
     

     <!-- DisplayListFoodMenu -->
    <br>
    <h2 class="heading">List of Food Menu</h2>
    <hr>

      <div class="standardTable" style="margin-top:-100px; text-align: center; ">
        <table class="table table-bordered">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Food Name</th>
                <th scope="col">Food Price</th>
                <th scope="col">Manage</th>
            </tr>
        <?php
          $sqry = "SELECT * FROM food_tbl";
          $srun = mysqli_query($conn,$sqry);
          while ($row = mysqli_fetch_array($srun)) 
          {
        ?>  
              <tr>
                <td><?php echo $row ['ID']; ?></td>
                <td><?php echo $row ['Food_Name']; ?></td>
                <td><?php echo $row ['Food_Price']; ?></td>
                <td><a href="edit_food.php?edit=<?php echo $row ['ID']; ?>" name="" class="btn btn-danger btn-sm">Update/Delete</a></td>
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