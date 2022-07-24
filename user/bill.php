<?php
session_start();
if (empty($_SESSION['uID'])) {
  echo '<script language="javascript">';
  echo 'alert("Please login to continue")';  
  echo '</script>';
  echo "<script>location.replace('../login.php')</script>";
}else{
include ('userHeader.php');
$uname=$_SESSION['Username'];
$hname=$_SESSION['Hallname'];
$etype=$_SESSION['Eventtype'];
$nop=$_SESSION['Nop'];
$menu=$_SESSION['Menu'];
$stime=$_SESSION['Stime'];
$etime=$_SESSION['Etime'];
$feature=$_SESSION['Feature'];
$bdate=$_SESSION['Bdate'];
$total=$_SESSION['Totalbill'];
?>
<!DOCTYPE html>
<html>

<body>
	<div class="container">
	<h2 class="heading">Check Your Bill</h2>
    <hr width="700px">
        <div class="billTable">
            <table class="table table-bordered table-hover">
            <tr>
                <th>Username</th>
                <th><?php echo $uname; ?></th>
            </tr>    
            <tr>
                <th>Hall Name</th>
                <th><?php echo $hname; ?>
            </tr>
            <tr> 
                <th>Event Type</th>
                <th><?php echo $etype; ?>
            </tr>
            <tr>
                <th>Number of Person</th>
                <th><?php echo $nop; ?>
            </tr>
            <tr>
                <th>Food Menu</th>
                <th><?php echo $menu; ?>
            </tr>
            <tr>
                <th>Start Time</th>
                <th><?php echo $stime; ?>
            </tr>
            <tr>
                <th>End Time</th>
                <th><?php echo $etime; ?>
            </tr>
            <tr>
                <th>Extra Feature</th>
                <th><?php echo $feature; ?>
            </tr>
            <tr>    
                <th>Booking Date</th>
                <th><?php echo $bdate; ?>
            </tr>
            <tr style="background-color:#414042; color:white;">    
                <th>Total bill</th>
                <th><?php echo $total; ?>
            </tr>
        </table>  
        <a href="#" class="btn btn-warning" onclick="window.print()">Print Bill</a> 
        </div>
       
	</div>
    <?php include '../footer.php'; ?>
</body>
</html>
<?php
}
?>