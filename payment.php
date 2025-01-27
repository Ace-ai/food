<?php 
include '../connect.php';
include '../functions/common_functions.php';

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
    <title>payment</title>
    <link href="../style.css" rel="stylesheet">
  </head>
<body>
  
  <?php
  $userIp=getIPAddress();
  $sql="SELECT * FROM users where userIp='$userIp'";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $userId=$row['userid'];
  ?>
  <h1 class="text-center mt-2">choose payment method</h1>
  <div class="container mt-5 ">
    <div class="row">
      <div class="col-md-6">
        <h3 class="text-center">credit card</h3>
        <a href="https://www.paypal.com" target="_blank"><img src="../img/creditcard.jpg" class="w-100 img-responsive mx-auto" alt="credit"></a>
      </div>
      <div class="col-md-6 ">
        <h3 class="text-center">cash on delivery</h3>
        <a href="order.php?userid=<?php echo $userId ?>"><img src="../img/cash2.jpg" class="w-100 h-75 img-responsive" alt="credit"></a>
      </div>
    </div>
  </div>
    
    <?php include '../partials/footer.php' ?>
</body>
</html>