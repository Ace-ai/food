<?php session_start(); ?>
<!doctype html>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php include '../food/connect.php' ?>
    <?php include './partials/header.php' ?>
              <div class="container-fluid ">

<nav class="navbar navbar-light bg-light ">
  <?php
  if(!isset($_SESSION['username'])){
    echo '  <h4 class="h4">welcome Guest</h4>
  <a class="navbar-brand " href="user/userlogin.php">Login</a>';
  } else {
    echo '  <h4 class="h4">welcome '.$_SESSION['username'].'</h4>
  <a class="navbar-brand " href="logout.php">Logout</a>';
  }
  ?>

</nav>



  </div>
   
 
     <?php 
     
     addToCart();
     ?>
  
  
</nav>
     </div>
 




    <div id="carouselExampleSlidesOnly" class="carousel slide m-3   " data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/BeefBurger-Deluxe.png" class="img-responsive d-block w-50 mx-auto"   alt="...">
      <h4 class="text-light text-center">big tasty</h4>
    </div>
    <div class="carousel-item">
      <img src="img/BeefBurger.png" class="img-responsive d-block w-50 mx-auto "alt="...">
      <h4 class="text-light text-center">big tasty</h4>
    </div>
    <div class="carousel-item">
      <img src="img/bigmac.png" class="img-responsive d-block w-50 mx-auto"   alt="...">
      <h4 class="text-light text-center">big tasty</h4>
    </div>
  </div>
</div>

   
     <h1 class="text-center">best meals</h1>  <hr>
    <div class="row m-4">
      <h1 class="h1 border border-2 bg-warning ">meals</h1>
    
      
        <?php

      
        $sql="select * from meal;";
        $result=mysqli_query($con,$sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $mealid=$row['mealid'];
                $mealname=$row['mealname'];
                $mealdesc=$row['mealdesc'];
                $mealimg=$row['mealimg'];
                $mealprice=$row['mealprice'];
                echo '   <div class="col-md-3 col-sm-6 mb-5 ">
         <div class="card " >
  <img src="'.$mealimg.'" class="card-img-top" alt="...">
  <div class="card-body">
    <h3 class="card-title">'.$mealname.'</h3>
    <p class="card-text">'.$mealdesc.'</p>
   <h1 class="text-end">'.$mealprice.'$</h1>
    <a href="meals.php?mealid='.$mealid.'" class="btn btn-primary">Go somewhere</a>
     <a href="index.php?add_to_cart='.$mealid.'" class="btn btn-warning m-1">add to cart</a>
  </div>
</div>
    </div>';

            }
        } 
         ?>
         
    </div>
    <div class="row m-4">
      <h1 class="h1 border border-2 bg-warning  ">drinks</h1>
   
      
        <?php

        $sql="select * from drink;";
        $result=mysqli_query($con,$sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $drinkid=$row['drinkid'];
                $drinkname=$row['drinkname'];
                $drinkimg=$row['drinkimg'];
                $drinkprice=$row['drinkprice'];
              
                echo '   <div class="col-md-3 col-sm-6 mb-5 ">
         <div class="card " >
  <img src="'.$drinkimg.'" class="card-img-top" alt="...">
  <div class="card-body">
    <h3 class="card-title">'.$drinkname.'</h3>
   <h1 class="text-end">'.$drinkprice.'$</h1>
    <a href="meals.php?mealid='.$drinkid.'" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
    </div>';

            }
        }  
         ?>
    </div>
    <?php 
  
    echo getIPAddress();
    
    ?>
   
 
   
   <?php include './partials/footer.php' ?>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>