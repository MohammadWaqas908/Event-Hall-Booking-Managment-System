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
	<div class="main_container">
		      <h2 class="heading">Update Hall Timing</h2>

    <div class="standardTable" style="margin-top:-100px;">
      <table class="table table-bordered" align="center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Hall_Name</th>
                <th scope="col">Hall_Size</th>
                <th scope="col">Hall_Rent</th>
                <th scope="col">Hall_Location</th>
                <th scope="col">Open Time</th>
                <th scope="col">Closing Time</th>
                <th scope="col">Edit</th>
            </tr>
        <?php
          $qry = "SELECT * FROM halls";
          $run = mysqli_query($conn,$qry);
          while ($row = mysqli_fetch_array($run)) 
          {
        ?>  
            <tr>
                <td><?php echo $row ['ID']; ?></td>
                <td><?php echo $row ['Hall_name']; ?></td>
                <td><?php echo $row ['Hall_size']; ?></td>
                <td><?php echo $row ['Hall_rent']; ?></td>
                <td><?php echo $row ['Hall_location']; ?></td>
                <td><?php echo $row ['S_time']; ?></td>
                <td><?php echo $row ['E_Time']; ?></td>
                <td><a href="edit_hall_timing.php?edit=<?php echo $row ['ID']; ?>">Edit</a></td>
            </tr>
        <?php
          echo "<br>";
          }
        ?>
        </table>
    </div>


    <div class="footer">
        
    </div>
	</div>
<script type="text/javascript" src="././bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
?>