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
	<title>Booking Request Hall</title>
</head>
<body>
	<div class="main_container">

    <div class="standardTable table-responsive" style="margin-top:-140px; ">
      <table class="table table-bordered">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Hall Name</th>
                <th scope="col">Event Type</th>
                <th scope="col">NOP</th>
                <th scope="col">FoodMenu</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Extra</th>
                <th scope="col">Booking Date</th>
                <th scope="col">Total bill</th>
                <th scope="col">Booking</th>
                <th scope="col">Action</th>
            </tr>
        <?php
          $active_user=$_SESSION['Username'];
          $qry = "SELECT * FROM booking_tbl WHERE Username = '$active_user'";
          $run = mysqli_query($conn,$qry);
          while ($row = mysqli_fetch_array($run)) 
          {
        ?>  
            <tr>
                <td><?php echo $row ['ID']; ?></td>
                <td><?php echo $row ['Username']; ?></td>
                <td><?php echo $row ['Hall_name']; ?></td>
                <td><?php echo $row ['Event_type']; ?></td>
                <td><?php echo $row ['Nop']; ?></td>
                <td><?php
                  $menu = $row ['Menu'];
                  $emenu=explode(" ",$menu);
                  foreach ($emenu as $exmenu) {
                    echo $exmenu;
                    echo "<br>";
                  } 
                ?></td>                
                <td><?php echo $row ['Stime']; ?></td>
                <td><?php echo $row ['Etime']; ?></td>
                <td><?php
                 $extra = $row ['Extra'];
                 $eextra=explode(" ",$extra);
                 foreach ($eextra as $Exextra) {
                    echo $Exextra;
                    echo "<br>";
                  }
                 ?></td>
                <td><?php echo $row ['Booking_date']; ?></td>
                <td><?php echo $row ['Total_bill']; ?></td>
                <td><?php echo $row ['Booking']; ?></td>
                <td style="font-weight:bold; text-align:center; color:white; "><a href="edit_hall_request.php?edit=<?php echo $row ['ID']; ?>">Edit</a></td>
            </tr>
        <?php
          echo "<br>";
          }
        ?>
        </table>
    </div>

	</div>
<script type="text/javascript" src="././bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
?>