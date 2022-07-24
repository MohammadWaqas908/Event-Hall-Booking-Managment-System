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
		
   

    <div class="main_table_div">
      <div class="heading">
        <h2 align="center">Hall Booking Request</h2>
        <hr>
      </div>
      <div class="standardTable" style="margin-top:-400px; ">
      <table class="table table-bordered table-hover">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Hall_name</th>
                <th scope="col">Event_Type</th>
                <th scope="col">Nop</th>
                <th scope="col">Food_Menu</th>
                <th scope="col">Start_Time</th>
                <th scope="col">End_Time</th>
                <th scope="col">Extra</th>
                <th scope="col">Booking_Date</th>
                <th scope="col">Total_bill</th>
                <th scope="col">Booking</th>
                <th scope="col">Edit</th>
            </tr>
        <?php
          $qry = "SELECT * FROM booking_tbl";
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
                <td><a href="edit_hall_booking.php?edit=<?php echo $row ['ID'];?>">Edit</a></td>
            </tr>
        <?php
          echo "<br>";
          }
        ?>
        </table>
        </div>
    </div>


  
	</div>

</body>
</html>
<?php
}
?>