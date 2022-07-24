<?php
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Event Hall Booking Management System</title>
</head>
<body >

		<div class="halls" style="margin-top: 5px;">
    <?php
        $qry="SELECT * FROM halls";
    		$run=mysqli_query($conn,$qry);
    		while ($row = mysqli_fetch_array($run)) {
    	?>
    	<div class="card" style="width: 20rem;">
        <img src="././manger/img/<?php echo $row ['Hall_image']; ?>" class="card-img-top" alt="..." height="230px">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row ['Hall_name']; ?></h5>
          <p class="card-text">This Hall is design for <?php echo $row ['Event_type']; ?> with size of <?php echo $row ['Hall_size']; ?> square feet and rent: <?php echo $row ['Hall_rent']; ?> Minimum Person required is <?php echo $row ['Minimum']; ?> Timing:<?php echo $row ['S_time']; ?>AM to <?php echo $row ['E_Time']; ?>PM City: <?php echo $row ['City']; ?> Location: <?php echo $row ['Hall_location']; ?></p>
          <a href="login.php" name="" class="btn btn-primary">Book Now</a>
        </div>
    </div>
		<?php
		}
		?>
    </div>		
		
	</div>

  
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
  