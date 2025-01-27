<?php
    include '../functions/common_functions.php';
    include '../connect.php'
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
    $GLOBALS['passwordMismatch']='';

    if(isset($_POST['registeruser'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $hashPassword=password_hash($password,PASSWORD_DEFAULT);
        $conPassword=$_POST['con_password'];
        $userIp=getIPAddress();
        if($password===$conPassword){
            $sql="insert into users(username,userIp,password) values('$username','$userIp','$hashPassword');";
            $result=mysqli_query($con,$sql);
            if($result) {
                header("location:../index.php");
            }
        } else {
             $GLOBALS['passwordMismatch']= '<div class="alert alert-danger mt-3" role="alert"> password mismatch!</div>';
        }
        $_SESSION['username']=$username;
    }
    
    
    ?>
         <h2 class="text-center mt-4">Registration form</h2>
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
  <div class="form-group mt-3">
    <label for="con_password">confirm Password</label>
    <input type="password" class="form-control" id="con_password" name="con_password" placeholder="confirm Password" required>
  </div>
  <button type="submit" name="registeruser" class="btn btn-primary mt-3">Submit</button>
  <?php echo $GLOBALS['passwordMismatch'] ?>
  <p class="small mt-2  ">already have an account? <a href="./userlogin.php" class="text-decoration-none">Login</a></p>
</form>

    </div>
    

 
</body>
</html>