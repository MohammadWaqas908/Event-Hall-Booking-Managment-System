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
  <title>Event Hall Booking Managment System</title>
</head>
<body>
	<div class="main_container">
		
    

    <div class="halls" style="margin-top: 5px;">
    	<?php
    		$qry="SELECT * FROM halls";
    		$run=mysqli_query($conn,$qry);
    		while ($row = mysqli_fetch_array($run)) {
    	?>
    	<div class="card" style="width:20rem;">
  			<img src="././img/<?php echo $row ['Hall_image']; ?>" class="card-img-top" alt="..." height="230px">
  			<div class="card-body">
    			<h5 class="card-title"><?php echo $row ['Hall_name']; ?></h5>
    			<p class="card-text">This Hall is design for <?php echo $row ['Event_type']; ?> with size of <?php echo $row ['Hall_size']; ?> square feet and rent: <?php echo $row ['Hall_rent']; ?> Minimum Person required is <?php echo $row ['Minimum']; ?> Timing:<?php echo $row ['S_time']; ?>AM to <?php echo $row ['E_Time']; ?>PM City: <?php echo $row ['City']; ?> Location: <?php echo $row ['Hall_location']; ?></p>
			    <a href="edit_hall.php?edit=<?php echo $row ['ID']; ?>" name="" class="btn btn-primary">Edit</a>
  			</div>
		</div>
		<?php
		}
		?>
    </div>

	</div>
</body>
</html>
<?php
}
?>