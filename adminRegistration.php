<?php
include '../connect.php';
if(isset($_POST['submitAdmin'])){
    $adminname=$_POST['adminname'];
    $password=$_POST['password'];
    $hashPassword=password_hash($password,PASSWORD_DEFAULT);
    $sql="insert into admins(adminname,password) values('$adminname','$hashPassword')";
    $result=mysqli_query($con,$sql);
    if($result){
        header("location:adminlogin.php");
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  </head>
<body>
    <h1 class="text-center mt-5">Admin Registration</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img class="w-75  mx-auto" src="../img/newadmin.png" alt="">

            </div>
        
        <div class="col-md-6">
        <form class="w-50" action="" method="POST">
  <div class="form-group ">
    <label for="username">Enter name</label>
    <input type="text" class="form-control" id="adminname" name="adminname" placeholder="Enter name" required>
    
  </div>
  <div class="form-group mt-3">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
  </div>
  <p class="small mt-3">already have account?<a href="adminlogin.php" class="text-decoration-none">Login</a></p>

  <button type="submit" name="submitAdmin" class="btn btn-primary mt-3 w-100 mx-auto">sign up</button>

</form>
                
                </div>
</div>
    
</body>
</html>