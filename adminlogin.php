<?php
session_start();
include '../connect.php';
$invalid='';

if(isset($_POST['login'])){
    $adminname=$_POST['adminname'];
    $password=$_POST['password'];
    $sql="select * from admins where adminname='$adminname'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        if(password_verify($password,$row['password'])){
            $_SESSION['adminname']=$adminname;

            header("location:../dashboard.php");
        } else {
            $invalid='<div class="alert alert-danger mt-3" role="alert">Invalid credentials</div>';
        }

    } else {
        $invalid='<div class="alert alert-danger mt-3" role="alert">not registred <a href="adminRegistration.php" class="btn btn-primary m-3">Register</a></div>';
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
    <h1 class="text-center mt-5">Admin login</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img class="w-75  mx-auto" src="../img/admin.png" alt="">

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
  <p class="small mt-3">Dont have account?<a href="adminRegistration.php" class="text-decoration-none">Register</a></p>

  <button type="submit" name="login" class="btn btn-primary mt-3 w-100 mx-auto">Log in</button>
  <?php echo $invalid?>
  
</form>
                
                </div>
</div>
    
</body>
</html>