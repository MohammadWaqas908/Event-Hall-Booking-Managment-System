<?php
session_start();
if (empty($_SESSION['uID'])) {
  echo '<script language="javascript">';
  echo 'alert("Please login to continue")';  
  echo '</script>';
  echo "<script>location.replace('../login.php')</script>";
}else{
include ('userHeader.php');
$active_uname=$_SESSION['Username'];
$book_status="Active";
$hall_name="";
$event_type="";
$bqry="SELECT * FROM booking_tbl WHERE Username='$active_uname' AND Booking='$book_status'";
$brun=mysqli_query($conn,$bqry);
if (mysqli_num_rows($brun)==1) {
  $brow = mysqli_fetch_array($brun);
  $hall_name=$brow ['Hall_name'];
  $event_type=$brow ['Event_type'];
}

if (isset($_POST['Rate'])) {
  $stars=$_POST['stars'];
  $description=$_POST['Description'];
  $iqry="INSERT INTO hall_rating_tbl(Username,Hall_name,Event_type,Rating,Description) VALUES('$active_uname','$hall_name','$event_type','$stars','$description')";
  $irun=mysqli_query($conn,$iqry);
  if ($irun) {
    if ($irun) {
          echo "<script>alert('Thanks For Your important feedback')</script>";
          echo "<script>location.replace('user_dash.php')</script>";
    }else{
        echo "<script>alert('Your Feedback is not added please check the data')</script>";
          echo "<script>location.replace('user_dash.php')</script>";
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>FeedBack</title>
  <link rel="stylesheet" href="dist/bootstrap-stars.css">
  <style type="text/css">
    @font-face {
        font-family: 'Glyphicons Halflings';
        src:url('js/glyphicons-halflings-regular.woff') format('woff');
    }
  </style> 
</head>

<body>
  <div class="container">

  <h2 class="heading">Give Your Important Feedback</h2>
  <hr width="700px">

             <div class="feedbackDiv">
               <form method="post">
             
              <div class="form-group">
                <label style="font-weight:bold; ">Username: </label>
                <label for="inputUsername" style="font-size: 20px">
                <?php echo $active_uname; ?></label>
              </div>


              <div class="form-group">
                <label style="font-weight:bold;">Hall Name: </label>
                <label for="inputUsername" style="font-size: 20px">
                <?php echo  $hall_name; ?></label>
              </div>


              <div class="form-group">
                <label for="inputEventType" style="font-size: 20px; font-weight: bolder;">Event Type: </label>
                <label for="inputEventType" style="font-size: 20px"><?php echo $event_type; ?></label>
              </div>
              <div class="form-group stars">
                <label for="inputRatingStar" style="font-size: 20px; font-weight: bolder;">Rate The Hall You have Booked: </label>
                <select class="form-control" id="example-bootstrap" name="stars" autocomplete="off">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
              
              <div class="form-group">
                <label for="inputDescription" style="font-size: 20px; font-weight: bolder;">Description:</label>
                <textarea class="form-control" rows="5" cols="7" id="comment" name="Description" placeholder="Enter some decription about hall" required=""></textarea>
              </div>

              <button type="submit" name="Rate" class="btn btn-success">Rate</button>
              <button type="reset" class="btn btn-danger">Clear</button>
            </form>
             </div>
             
  </div>
  <!-- endMainDIv -->
  

  <!--For Five Star Rating system-->
  <script src="js/1.11.2.jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="dist/jquery.barrating.min.js"></script>
    <script src="js/Star_Rating.js"></script>
    <?php include '../footer.php'; ?>
</body>
</html>
<?php
}
?>