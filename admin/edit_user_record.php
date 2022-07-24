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
  <title>Edit Users Status</title>
</head>

<body>
	<div class="container">
    <h2 class="heading">Edit Users Status</h2>  
    <hr>  

      <div class="standardForm">
        <?php
          if (isset($_GET['edit'])) {
            $Id=$_GET['edit'];
            $q = "SELECT * FROM register_tbl WHERE ID='$Id'";
            $r = mysqli_query($conn,$q);
            $row = mysqli_fetch_array($r);
            $newId = $row ['ID'];
            
          }
          if (isset($_POST['update'])) {
            $id1 = $newId;
            $newstatus = $_POST['newstatus'];
            
            $uqry = "UPDATE register_tbl SET Status='$newstatus' WHERE ID='$id1'";
            $urun = mysqli_query($conn,$uqry);
            if ($urun) {
              echo '<script language="javascript">';
              echo 'alert("Record updated")';
              echo '</script>';
              if ($newstatus == "Manager") {
                echo "<script>location.replace('reg_manager.php')</script>";
              }else{
                echo "<script>location.replace('reg_user.php')</script>";
              }
            }else{
              echo "<script>alert('Record not updated')</script>";
              echo "<script>location.replace('reg_user.php')</script>";
            }
          }


          if (isset($_POST['delete'])) {
            $ddqry="DELETE FROM register_tbl WHERE ID='$newId'";
            $drrun=mysqli_query($conn,$ddqry);
            if ($drrun) {
              echo "<script>alert('User Record Deleted')</script>";
               if ($newstatus == "Manager") {
                echo "<script>location.replace('reg_manager.php')</script>";
              }else{
                echo "<script>location.replace('reg_user.php')</script>";
              }
            }
            else{
              echo "<script>alert('User Record Not Deleted')</script>";
              echo "<script>location.replace('reg_user.php')</script>";
            }
          }
        
        ?>
        <?php 
        if (isset($_GET['edit'])) {
            $id=$_GET['edit'];
            $qry = "SELECT * FROM register_tbl WHERE ID='$id'";
            $run = mysqli_query($conn,$qry);
            while ($row = mysqli_fetch_array($run)) {
        ?>
        <form method="post" action="">
          <div class="form-group">
                <label for="inputID4">ID</label>
                <input type="text" class="form-control" id="inputFullName4" name="newid" value="<?php echo $row ['ID']; ?>"  disabled="">
            </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputFirstName4">First Name</label>
                  <input type="text" class="form-control" name="fname" id="inputFirstName4" value="<?php echo $row ['F_name']; ?>" disabled="">
              </div>
              <div class="form-group col-md-6">
                  <label for="inputLastName4">Last Name</label>
                  <input type="text" class="form-control" name="lname" id="inputLastName4" value="<?php echo $row ['L_name']; ?>" disabled="">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputcnic4">CNIC</label>
                  <input type="text" class="form-control" name="gender" id="inputcnic4" value="<?php echo $row ['Cnic']; ?>" disabled="">
              </div>
              <div class="form-group col-md-6">
                  <label for="inputAddress4">Address</label>
                  <input type="text" class="form-control" name="address" id="inputaddress4" value="<?php echo $row ['Address']; ?>" disabled="">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputContactNo4">Contact No</label>
                  <input type="text" class="form-control" name="contact_no" id="inputContactNo4" value="<?php echo $row ['Contact_no']; ?>" disabled="">
              </div>
              <div class="form-group col-md-6">
                  <label for="inputEmailAddress4">Email Address</label>
                  <input type="text" class="form-control" name="email_address" id="inputEmail_Address4" value="<?php echo $row ['Email_address']; ?>" disabled="">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputUsername4">Username</label>
                  <input type="text" class="form-control" name="username" id="inputUsername4" value="<?php echo $row ['Username']; ?>" disabled="">
              </div>
              <div class="form-group col-md-6">
                  <label for="inputStatus">Status</label>
                  <?php
                    $o1status = $row ['Status'];
                    if ($o1status == "User") {
                      ?>
                      <select id="inputStatus" name="newstatus" class="form-control">
                        <option value="User" selected="">User</option>
                        <option value="Manager">Manager</option>
                      </select>
                    <?php
                    }
                    ?>
                    <?php 
                    $o2status = $row ['Status'];
                    if ($o2status == "Manager") {
                      ?>
                      <select id="inputStatus" name="newstatus" class="form-control">
                        <option value="User">User</option>
                        <option value="Manager" selected="">Manager</option>
                      </select>
                    <?php
                    }
                    ?>
              </div>
            </div>
            <div class="standardBtn">
              <button type="submit" class="btn btn-primary" name="update">Update</button>
            <button type="submit" class="btn btn-danger" style="margin-left:75px; " name="delete">Delete</button>
            </div>
            

          </form>
          <?php
            }
          }
          ?>
      </div>  

	</div>
    <?php include '../footer.php'; ?>

</body>
</html>
<?php
}
?>