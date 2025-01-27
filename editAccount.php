<?php
include '../connect.php';
session_start();
$upload='';
$username=$_SESSION['username'];
$select="select * from users where username='$username'";
$selectResult=mysqli_query($con,$select);
$row=mysqli_fetch_assoc($selectResult);
$Userid=$row['userid'];
$userimg=$row['userimg'];
if(isset($_POST['editaccount'])){
  $username=$_POST['username'];
  $userimg=$_FILES['userimg']['name'];
  $userImgTemp=$_FILES['userimg']['tmp_name'];
  $upload="../img/$userimg";
  move_uploaded_file($userImgTemp,$upload);
  $_SESSION['username']=$username;
  $updateProfile="UPDATE users SET username='$username',userimg='$upload' where userid=$Userid";
  $result=mysqli_query($con,$updateProfile);
  if($result){
    header("location:profile.php");
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
         <div class="mb-3">
    <label  class="form-label">edit image:</label>
    <input type="file" name="userimg" class="form-control" >
    <img class="img-responsive rounded w-100 mx-auto" src=<?php echo $userimg ?> alt="">
  </div>
  <div class="mb-3">
    <label  class="form-label">user name</label>
    <input type="text" class="form-control" name="username" aria-describedby="emailHelp" value="<?php echo $username ?>">
  </div>

 
  <button type="submit" name="editaccount" class="btn btn-primary">Submit</button> 
  <button type="button"  class="btn btn-danger" ><a class="text-decoration-none text-light" href="profile.php">Close</a></button>
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