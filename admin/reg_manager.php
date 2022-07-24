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

<body>
  <div class="main_container">
   <h2 class="heading">Managers Details</h2>
   <hr>
    
    
    
    <div class="standardTable" style="margin-top:-50px; ">
      <table class="table table-bordered ">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First_Name</th>
                <th scope="col">Last_Name</th>
                <th scope="col">CNIC</th>
                <th scope="col">Profile_pic</th>
                <th scope="col">Address</th>
                <th scope="col">Contact_no</th>
                <th scope="col">Email_Address</th>
                <th scope="col">Username</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
            </tr>
        <?php
          $status = "User";
          $qry = "SELECT * FROM register_tbl WHERE Status != '$status' AND  Status != 'Admin'";
          $run = mysqli_query($conn,$qry);
          while ($row = mysqli_fetch_array($run)) 
          {
        ?>  
            <tr>
                <td><?php echo $row ['ID']; ?></td>
                <td><?php echo $row ['F_name']; ?></td>
                <td><?php echo $row ['L_name']; ?></td>
                <td><?php echo $row ['Cnic']; ?></td>
                <td><?php echo $row ['Profile_pic']; ?></td>
                <td><?php echo $row ['Address']; ?></td>
                <td><?php echo $row ['Contact_no']; ?></td>
                <td><?php echo $row ['Email_address']; ?></td>
                <td><?php echo $row ['Username']; ?></td>
                <td><?php echo $row ['Status']; ?></td>
                <td><a class="btn btn-danger btn-sm" href="edit_user_record.php?edit=<?php echo $row ['ID']; ?>">Edit</a></td>
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