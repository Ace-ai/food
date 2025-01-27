<?php
include '../connect.php';
session_start();
if(isset($_GET['adminid'])){
 $adminid=$_GET['adminid'];
$upload='';
$adminname=$_SESSION['adminname'];
$select="select * from admins where adminname='$adminname'";
$selectResult=mysqli_query($con,$select);
$row=mysqli_fetch_assoc($selectResult);
$adminimg=$row['adminimg'];
if(isset($_POST['editadminaccount'])){
  $adminname=$_POST['adminname'];
  $adminimg=$_FILES['adminimg']['name'];
  $adminImgTemp=$_FILES['adminimg']['tmp_name'];
  $upload="img/$adminimg";
  move_uploaded_file($adminImgTemp,$upload);
  $_SESSION['adminname']=$adminname;
  $updateProfile="UPDATE admins SET adminname='$adminname',adminimg='$upload' where adminid=$adminid";
  $result=mysqli_query($con,$updateProfile);
  if($result){
    header("location:../dashboard.php");
  }
 
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <Link href="style.css">
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
		$("#profileModal").modal('show');
	});
    </script>
 



  </head>
<body>
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">edit profile</h5>
     
      </div>
      <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data">
         <div class="mb-3 ">
    <label  class="form-label">edit image:</label>
    <input type="file" name="adminimg" class="form-control mb-3" >
    <img class="img-responsive rounded w-50 mx-auto" src=<?php echo "../$adminimg" ?> alt="">
  </div>
  <div class="mb-3">
    <label  class="form-label">admin name</label>
    <input type="text" class="form-control" name="adminname" aria-describedby="emailHelp" value="<?php echo $adminname ?>">
  </div>

 
  <button type="submit" name="editadminaccount" class="btn btn-primary">Submit</button> 
  <button type="button"  class="btn btn-danger" ><a class="text-decoration-none text-light" href="../dashboard.php">Close</a></button>
</form>
      </div>
   
    </div>
  </div>
</div>
    



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</body>
</html>