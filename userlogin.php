<?php 
include '../connect.php' ;
      include '../functions/common_functions.php';
$GLOBALS['invalidCred']='';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hello, world!</title>
  </head>
  
<body> 
  <?php

if(isset($_POST['userlogin'])){
  $username=$_POST['username'];
  $password=$_POST['password'];

  $sql="select * from users where username='$username'";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $userIp=getIPAddress();
  $selectCart="select * from cart where ipAdress='$userIp'";
  $resultCart=mysqli_query($con,$selectCart);
  

  if(mysqli_num_rows($result)>0){
    $_SESSION['username']=$username;
    if(password_verify($password,$row['password'])){
     
      if(mysqli_num_rows($result)==1 and mysqli_num_rows($resultCart)==0){
        $_SESSION['username']=$username;
        header("location:profile.php");
      } elseif(mysqli_num_rows($resultCart)>0){
        $_SESSION['username']=$username;
        header("location:../index.php");
      }

      


    } else {
      $GLOBALS['invalidCred']='<div class="alert alert-danger mt-3" role="alert">Invalid password</div>';

    }

  } else {
   
    $GLOBALS['invalidCred']='<div class="alert alert-danger mt-3" role="alert">Invalid credentials</div>';
  }
 



}
    
    
    ?>
         <h2 class="text-center mt-4">User Login</h2>
    <div class="container-fluid mt-5  w-25 mx-auto border border-2 p-5">
  
    <form action="" method="POST">
  <div class="form-group ">
    <label for="username">Enter name</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter name" required>
    
  </div>
  <div class="form-group mt-3">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
  </div>

  <button type="submit" name="userlogin" class="btn btn-primary mt-3 w-100 mx-auto">Log in</button>
  <?php echo $invalidCred?>
  <p class="small mt-3">Dont have account?<a href="./userRegistration.php" class="text-decoration-none">Register</a></p>
</form>

    </div>
    

   
</body>

</html> 
