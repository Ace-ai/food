<?php include './functions/common_functions.php';include './connect.php';

?>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img width="40px" height="40px" src="./img/maclogo.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php  countRow() ?></sup></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user/userRegistration.php">Register</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
        </li>
          <?php
          if(isset($_SESSION['username'])){
            echo '<li class="nav-item">
          <a class="nav-link" href="./user/profile.php">profile</a>
        </li>';
        
          } 
          
          ?>
          
               <form class="d-flex " action="search2.php" method="get" >
         <input type="search" name="mealname" class="w-75 p-1 " placeholder="search anything...">
        <button type="submit" class="btn btn-primary mx-1 ">search</button>
      </form> 
        
    </div>
     
</nav>
  </div>
 