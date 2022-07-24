<?php
session_start();
if (empty($_SESSION['uID'])) {
  echo '<script language="javascript">';
  echo 'alert("Please login to continue")';  
  echo '</script>';
  echo "<script>location.replace('../login.php')</script>";
}else{
include ('adminHeader.php');
if (isset($_POST['userBtn'])) {
  header("location:reg_user.php");
}
if (isset($_POST['managerBtn'])) {
  header("location:reg_manager.php");
}
if (isset($_POST['bookingBtn'])) {
  header("location:booking.php");
}
?>
<!DOCTYPE html>
<html>

<body>
  <div class="container">
    
    <div class="adminBtn">
      <form method="post">
   <button class=" btn btn-success btn-lg" type="submit" name="userBtn">User</button>
   <button class=" btn btn-warning btn-lg" type="submit" name="managerBtn">Manager</button><button class=" btn btn-primary btn-lg" type="submit" name="bookingBtn">Booking</button>
      </form>
    </div>


  </div>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
?>