<?php
session_start();
if (empty($_SESSION['uID'])) {
  echo '<script language="javascript">';
  echo 'alert("Please login to continue")';  
  echo '</script>';
  echo "<script>location.replace('../login.php')</script>";
}else{
include ('adminHeader.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Bookig Details</title>
</head>

<body>
	<div class="main_container">
  <h2 class="heading">Bookig Details</h2>
  <hr>
	
  

    <div class="standardTable" style="margin-top:-400px; ">
      <table class="table table-bordered" width="20rem">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Hall Name</th>
                <th scope="col">Event Type</th>
                <th scope="col">Nop</th>
                <th scope="col">Food Menu</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Extra</th>
                <th scope="col">Booking Date</th>
                <th scope="col">Total Bill</th>
                <th scope="col">Booking</th>
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