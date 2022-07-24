<?php
session_start();
include ('userHeader.php');
$_SESSION['srun']="";
if (empty($_SESSION['uID'])) {
  echo '<script language="javascript">';
  echo 'alert("Please login to continue")';  
  echo '</script>';
  echo "<script>location.replace('../login.php')</script>";
}else{
if (isset($_POST['submit'])) {
	$select=$_POST['hallSearch'];
	$value=$_POST['description'];
	if ($select=="Event_type") {
		$qry="SELECT * FROM halls WHERE Event_type='$value'";
		$result=mysqli_query($conn,$qry);
	}
	if ($select=="City") {
		$qry="SELECT * FROM halls WHERE City='$value'";
		$result=mysqli_query($conn,$qry);
		}
	if ($select=="Hall_size") {
		$qry="SELECT * FROM halls WHERE Hall_size<='$value'";
		$result=mysqli_query($conn,$qry);
	}
	if ($select=="Hall_rent") {
		$qry="SELECT * FROM halls WHERE Hall_rent<='$value'";
		$result=mysqli_query($conn,$qry);
	}
	if ($select=="Minimum") {
		$qry="SELECT * FROM halls WHERE Minimum<='$value'";
		$result=mysqli_query($conn,$qry);
	}
	$_SESSION['srun']=$result;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
</head>
<body>

	<!-- searchBar -->
     <div class="container">
      <form method="post" action="">
      	<div class="row searchBar">
            <div class="col-md-5">
               <select id="inputslect" name="hallSearch" class="form-control" required="">
    					<option value="Event_type">Event_type</option>
    					<option value="City">Hall_City</option>
    					<option value="Hall_size">Hall_size</option>
    					<option value="Hall_rent">Hall_price</option>
    					<option value="Minimum">Minimum_No._of_Person</option>
  					</select>
           		 </div>
            <div class="col-md-5">
                <input type="text" name="description" minlength="1" placeholder="Type for search..." class="form-control" id="inputdescription4" required="">
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger" name="submit" type="submit">Search</button>
            </div>
          </div>
      </form>  
    </div>
    <!-- SearchBarEnd -->


    <div class="halls" style="margin-top: 5px;">
      <?php
    		$sr=$_SESSION['srun'];
    		if(!(empty($sr))){
				$res=$sr;
    		}else{
        $qry="SELECT * FROM halls";
				$res=mysqli_query($conn,$qry);
    		}
    		while ($row = mysqli_fetch_array($res)) {
          
    	?>
    	<div class="card">
  			<img src="../manger/img/<?php echo $row ['Hall_image']; ?>" class="card-img-top" alt="..." height="240px">
  			<div class="card-body">
    			<h5 class="card-title"><?php echo $row ['Hall_name']; ?></h5>
    			<p class="card-text">This Hall is design for <?php echo $row ['Event_type']; ?> with size of <?php echo $row ['Hall_size']; ?> square feet and rent: <?php echo $row ['Hall_rent']; ?> Minimum Person required is <?php echo $row ['Minimum']; ?> Timing:<?php echo $row ['S_time']; ?>AM to <?php echo $row ['E_Time']; ?>PM City: <?php echo $row ['City']; ?> Location: <?php echo $row ['Hall_location']; ?></p>
			    <a href="book_Detail.php?edit=<?php echo $row ['ID']; ?>" name="" class="btn btn-primary">Book Now</a>
  			</div>
		</div>
		<?php
    }
		?>
    </div>


    <div class="footer">
        
    </div>
	</div>
  
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
?>