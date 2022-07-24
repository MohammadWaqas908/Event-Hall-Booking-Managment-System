<?php
session_start();
include ('userHeader.php');
if (empty($_SESSION['uID'])) {
  echo '<script language="javascript">';
  echo 'alert("Please login to continue")';  
  echo '</script>';
  echo "<script>location.replace('../login.php')</script>";
}else{
$active_user=$_SESSION['uID'];
$_SESSION['Hallname']="";
$_SESSION['Eventtype']="";
$_SESSION['Nop']=0;
$_SESSION['Menu']="";
$_SESSION['Stime']=0;
$_SESSION['Etime']=0;
$_SESSION['Feature']="";
$_SESSION['Bdate']=0;
$_SESSION['Totalbill']=0;
$suqry="SELECT Username FROM register_tbl WHERE ID='$active_user'";
$surun=mysqli_query($conn,$suqry);
$surow = mysqli_fetch_array($surun);
$Username = $surow ['Username'];
$ftotal=0;
$eftotal=0;
$nop=1;
$total=0;
if (isset($_GET['edit'])) {
  $Id=$_GET['edit'];
  $q = "SELECT * FROM halls WHERE ID='$Id'";
  $r = mysqli_query($conn,$q);
  $row = mysqli_fetch_array($r);
  $newId = $row ['ID'];
  $csnop=$row['Minimum'];
  $cstime=$row['S_time'];
  $cetime=$row['E_Time'];
}
//$record
$hname=$row ['Hall_name'];
$etype=$row ['Event_type'];
//
if (isset($_POST['bill'])) {
$hname=$row ['Hall_name'];
$etype=$row ['Event_type'];
$nop=$_POST['mperson'];
$menu=implode(",",$_POST['menu']);
$emenu=explode(",",$menu);
foreach ($emenu as $exmenu) {
  $fpqry="SELECT * FROM food_tbl WHERE Food_Name='$exmenu'";
  $fprun=mysqli_query($conn,$fpqry);
  $fprow = mysqli_fetch_array($fprun);
  $amount= $fprow ['Food_Price'];
  $ftotal=$ftotal+$amount;                
}  
$ftotal=$ftotal*$nop;
$stime=$_POST['stime'];
$etime=$_POST['etime'];
$feature=implode(" ",$_POST['feature']);
$efeature=explode(" ",$feature);
foreach ($efeature as $exfeature) {
  $efpqry="SELECT * FROM feature_tbl WHERE Feature_Name='$exfeature'";
  $efprun=mysqli_query($conn,$efpqry);
  $efprow = mysqli_fetch_array($efprun);
  $efamount= $efprow ['Feature_Price'];
  $eftotal=$eftotal+$efamount;
}
$bdate=$_POST['bdate'];
$Hall_rent=$row ['Hall_rent'];
$total=$Hall_rent+$ftotal+$eftotal;
$_SESSION['Hallname']=$hname;
$_SESSION['Eventtype']=$etype;
$_SESSION['Nop']=$nop;
$_SESSION['Menu']=$menu;
$_SESSION['Stime']=$stime;
$_SESSION['Etime']=$etime;
$_SESSION['Feature']=$feature;
$_SESSION['Bdate']=$bdate;
$_SESSION['Totalbill']=$total;
  echo '<script language="javascript">';
  echo 'alert("You can Check Your Bill but Your hall is not booked yet \nplease if you want to book the hall please click on :Book Now:");';  
  echo '</script>';
  echo "<script>location.replace('bill.php')</script>";
}
if (isset($_POST['book'])) {
  $uname=$Username;
  $nop=$_POST['mperson'];
  if ($nop<$csnop) {
    echo '<script language="javascript">';
    echo 'alert("Sorry The number of person you have entered is less then\n the required minimum no. of person");'; 
    echo '</script>';
    echo "<script>location.replace('user_dash.php')</script>";
  }
  $menu=implode(",",$_POST['menu']);
  $emenu=explode(",",$menu);
  foreach ($emenu as $exmenu) {
    $fpqry="SELECT * FROM food_tbl WHERE Food_Name='$exmenu'";
    $fprun=mysqli_query($conn,$fpqry);
    $fprow = mysqli_fetch_array($fprun);
    $amount= $fprow ['Food_Price'];
    $ftotal=$ftotal+$amount;                
  }  
  $ftotal=$ftotal*$nop;
  $stime=$_POST['stime'];
  $etime=$_POST['etime'];
  if (!(($cstime<$stime) && ($cetime>$etime)) ) {
    echo '<script language="javascript">';
    echo 'alert("Sorry this time hall is closed");';  
    echo '</script>';
    echo "<script>location.replace('user_dash.php')</script>";
  }
  $feature=implode(" ",$_POST['feature']);
  $efeature=explode(" ",$feature);
  foreach ($efeature as $exfeature) {
    $efpqry="SELECT * FROM feature_tbl WHERE Feature_Name='$exfeature'";
    $efprun=mysqli_query($conn,$efpqry);
    $efprow = mysqli_fetch_array($efprun);
    $efamount= $efprow ['Feature_Price'];
    $eftotal=$eftotal+$efamount;
  }
  $bdate=$_POST['bdate'];
  $Hall_rent=$row ['Hall_rent'];
  $total=$Hall_rent+$ftotal+$eftotal;

  $booking="Pending";
  $booking1="Active";
  $bcqry="SELECT * FROM booking_tbl WHERE Hall_name='$hname' AND Booking='$booking1' AND Stime>='$stime' AND Etime>='$etime' AND Booking_date='$bdate'";
  $bcrun=mysqli_query($conn,$bcqry);
  if (!$bcrun) {
    echo '<script language="javascript">';
    echo 'alert("Sorry this hall is booked at that day and at that time you given");';  
    echo '</script>';
    echo "<script>location.replace('user_dash.php')</script>";
  }else{
    $iqry="INSERT INTO booking_tbl(Username,Hall_name,Event_type,Nop,Menu,Stime,Etime,Extra,Booking_date,Total_bill,Booking) VALUES('$uname','$hname','$etype','$nop','$menu','$stime','$etime','$feature','$bdate','$total','$booking')";
    $irun=mysqli_query($conn,$iqry);
    if ($irun) {
      echo '<script language="javascript">';
      echo 'alert("Hall Booking Request is send to the Manager");';  
      echo '</script>';
      echo "<script>location.replace('booking_request.php')</script>";
    }else{
      echo '<script language="javascript">';
      echo 'alert("Hall Booking Request is not send to the Manager");';  
      echo '</script>';
      echo "<script>location.replace('booking_request.php')</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Hall Details</title>
</head>
<body>

  <div class="container-fluid">
    <?php
      if (isset($_GET['edit'])) {
            $id=$_GET['edit'];
            $qry = "SELECT * FROM halls WHERE ID='$id'";
            $run = mysqli_query($conn,$qry);
            while ($row = mysqli_fetch_array($run)) {
      ?>

  <!-- Row1 ImgandDetails -->
  <div class="row">
   <!-- Hall Image -->
         <div class="col-md-6">
              <div class="hallImg">
                  <img src="../manger/img/<?php echo $row ['Hall_image']; ?>" class="card-img-top" alt="..." height="400px" width="300px">
              </div>
          </div>
    <!-- Hall Image End  -->
    <!-- hall details -->
    <div class="col-md-5 halldetailHeading">
     <form method="post" action="">
            <!-- heading -->
             <h3><?php  echo $row ['Hall_name']; ?></h3>
              <hr>
              <!-- halltype -->
              <div class="row">
                <label class="col-md-4">Hall Type :</label>
                <h5 class="col-md-4"><?php  echo $row ['Event_type']; ?></h5>
              </div>
              <!-- hall rent -->
               <div class="row">
                <label class="col-md-4">Hall Rent :</label>
                <h5 class="col-md-4"><?php  echo $row ['Hall_rent']; ?></h5>
              </div>
              <!-- minperson -->
               <div class="row">
                <label class="col-md-4">Min Persons :</label>
                <h5 class="col-md-4"><?php  echo $row ['Minimum']; ?></h5>
              </div>
               <!-- enter persons -->
              <div class="row">
                 <label for="No.ofPersons4" class="col-md-4">No. of Persons :</label>
                 <input type="text" class="form-control col-md-4" name="mperson" minlength="1" placeholder="Maximum Persons" id="No.ofPersons4" required="">
              </div>
                 <!-- foodMenuList -->
               <div class="row" style="margin-top:10px; ">
                 <label for="No.ofPersons4" class="col-md-4">Select Food :</label>
                  <select id="inputselected_Menu" class=" form-control col-md-4"  name="menu[]" class="form-control" required="">
                      <?php
                        $sfqry="SELECT * FROM food_tbl";
                        $sfrun=mysqli_query($conn,$sfqry);
                        while ($sfrow = mysqli_fetch_array($sfrun)) {
                        ?>
                        <option value="<?php echo $sfrow ['Food_Name']; ?>"><?php echo $sfrow ['Food_Name']; ?></option>
                        <?php
                        } 
                       ?>
                </select>
              </div>
               <!-- extraFeatureList -->
               <div class="row" style="margin-top:10px;">
                 <label for="No.ofPersons4" class="col-md-4">Extra Feature :</label>
                 <select id="inputselected_feature" class="form-control col-md-4" name="feature[]" required="" class="form-control">
                      <?php
                        $seqry="SELECT * FROM feature_tbl";
                        $serun=mysqli_query($conn,$seqry);
                        while ($serow = mysqli_fetch_array($serun)) {
                        ?>
                        <option value="<?php echo $serow ['Feature_Name']; ?>"><?php echo $serow ['Feature_Name']; ?></option>
                        <?php
                        } 
                         ?>
                </select>
              </div>
               <!-- booking Date -->
               <div class="row" style="margin-top:10px;">
                 <label class="col-md-4">Booking Date :</label>
                 <input type="date" class="form-control col-md-4" min="<?php echo $today = date("Y-m-d");?>" name="bdate" id="inputBookFor4">
              </div>
              <!-- start time -->
                <div class="row" style="margin-top:10px;">
                 <label class="col-md-4">Start Time :</label>
                <input type="time" class="form-control col-md-4" name="stime" id="StartTime4" required="">
              </div>
                <!-- endTime  -->
                <div class="row" style="margin-top:10px;">
                 <label for="No.ofPersons4" class="col-md-4">End Time :</label>
               <input type="time" class="form-control col-md-4" name="etime" id="inputEndTime4" required="">
              </div>
              <!-- buttons -->
              <div class="row" style="margin-top:33px; margin-left:50px;  " >
     <button type="submit" class="btn btn-success col-md-3" name="book">Book Now</button>
       <button type="reset" class="btn btn-danger col-md-3" name="clr">Clear</button>
        <button type="submit" class="btn btn-primary col-md-3" name="bill">Bill</button>
              </div>
     </form>
    </div>
<!-- hallDetialsDiv -->

    
  </div>
  <!-- row1 end -->
      <!-- row2 -->
      <div class="row">
        <!-- extra featur price -->
        <div class="col-md-3" style="margin-top:-180px; ">
        <h4 style="margin-left:20px; ">Extra Feature Price</h4>
              <?php
              }
                  $eqry="SELECT * FROM feature_tbl";
                 $erun=mysqli_query($conn,$eqry);
                while ($erow = mysqli_fetch_array($erun)) {?>
              <ul>
               <li style="font-size:20px; margin-bottom:-13px;  "><?php  echo $erow ['Feature_Name']; ?>:<b> Rs <?php  echo $erow ['Feature_Price'] ?></b></li>
             </ul> 
              <?php
                  }
                  ?>
              </div>
              <!-- food menu -->
               <div class="col-md-3" style="margin-top:-180px; ">
               <h4 style="margin-left:20px; ">Food Menu Price</h4>
              <?php
              }
                   $fqry="SELECT * FROM food_tbl";
                  $frun=mysqli_query($conn,$fqry);
                  while ($frow = mysqli_fetch_array($frun)) {?>
                 
              <ul>
               <li style="font-size:20px; margin-bottom:-13px;  "><?php  echo $frow ['Food_Name']; ?>:<b> Rs <?php  echo $frow ['Food_Price']; ?></b></li>
             </ul> 
              <?php
                  }
                  ?>
              </div>
        </div>

              <!-- empty grid -->
        <div class="col-md-5"></div> 
      </div>  
        <!-- row2 end -->

  </div>
  <!-- mainDiv end -->

  <?php include '../footer.php'; ?>
   
</body>
</html>
<?php 
}
?>