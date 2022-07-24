
<!-- database Connection -->
<?php include '../connection.php'; ?>

<!DOCTYPE html>
<html>


<!-- headStart -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--CSS-->
	<link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="../bootstrap/css/myStyle.css">
	<!--Javascript-->
  	<script type="text/javascript" src="../bootstrap/jquery/jquery-3.5.1.slim.min.js"></script>
  	<script type="text/javascript" src="../bootstrap/jquery/popper.min.js"></script>
  <style type="text/css">
    li{
      font-weight:bold;
    }
  </style>
</head>
<!-- headEnd -->

<body>
	<div class="main_container">

		<!-- title div -->
		<div class="title_heading">
			<h1>Event Hall Booking Managment System</h1>
		</div>

		<!-- nav menu  -->
		<div class="navbar_div" style="margin-bottom: 50px;">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
  				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
  				</button>
  				
  				<div class="collapse navbar-collapse" id="navbarNavDropdown">
    				
    			 <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="manager_dash.php">Home<span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item">
                  <a class="nav-link" href="manage_halls.php">Manage Halls</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="hall_booking.php">Hall Booking</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="hall_timing.php">Hall Timing</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="food_menu.php">Manage Food Menu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="extra.php">Exta Feature</a>
                </li>
            </ul>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ml-auto logout">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Logout
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../logout.php">Logout</a>
                    </div>
                  </li>
              </ul>
            </div>
  				</div>
			</nav>
		</div>
		<!-- nav menu end -->
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>