<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hello, world!</title>
  </head>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
    <?php include './partials/header.php' ?>
    <div class="container-fluid">
      <h2 class="text-center mt-3">cart <i class="fa-solid fa-cart-shopping "></i> </h2>
     

            <?php
include 'connect.php';
$sql="select quantity,cart.mealid,mealname,mealprice,mealimg,mealdesc from cart,meal where cart.mealid=meal.mealid";
$result=mysqli_query($con,$sql);
$totalPrice=0;
if($result && mysqli_num_rows($result)>0){
  echo '  
  <form action="updatecart.php" method="POST">
  <table class="table table-striped mt-5">
<thead>
  <tr>
    <th scope="col">id</th>
    <th scope="col">meal name</th>
    <th scope="col">meal desc</th>
    <th scope="col">meal price</th>
    <th scope="col">image</th>
    <th scope="col">quantity</th>
    <th scope="col">operation</th>
  </tr>
</thead><tbody>';
    $arrPrice=array();
    while($row=mysqli_fetch_assoc($result)){
        $mealid=$row['mealid'];
        $mealname=$row['mealname'];
        $mealdesc=$row['mealdesc'];
        $mealimg=$row['mealimg'];
        $quantity=$row['quantity'];
        $mealprice=(int)$row['mealprice'];
        array_push($arrPrice,$mealprice);
        $totalPrice=array_sum($arrPrice);
       
        echo ' 
        <tr>
          <th scope="row">'.$mealid.'</th>
          <td>'.$mealname.'</td>
          <td>'.$mealdesc.'</td>
          <td>'.$mealprice.'$</td>
           <td><img width="60px"height="60px" src='.$mealimg.'></td>
            <td><input type="number" class="form-input w-25" name="quantity" ></td>
           <td>
         <a href="removeFromCart.php?removeid='.$mealid.'" class="btn btn-danger m-1">remove</a>
         <button class="btn btn-primary" type="submit" name="updatecart">update</button>
        </tr>
     
      ';
    }
} else {

  $totalPrice=0;
  echo '<h2 class="text-center bg-danger text-white p-4  w-25 mx-auto rounded-pill mt-5"> cart is empty</h2>';

}



?>

</tbody>
     </table>
    </form>
    </div>
<h2 class="text-start m-3">total price :<?php echo $totalPrice?>$</h2>
        </div>
    </div>
    <div class="container-fluid text-center">
      <button class="btn btn-success "><a href="user/checkout.php" class="text-light text-decoration-none">check out</a></button>
      <button class="btn btn-primary"  ><a href="index.php" class="text-light text-decoration-none">continue shopping</a></button>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
  </body>
</html>