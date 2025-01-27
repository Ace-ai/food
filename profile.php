<?php
include '../connect.php';
include '../functions/common_functions.php';
session_start();
$username=$_SESSION['username'];
$select="select * from users where username='$username'";
$selectResult=mysqli_query($con,$select);
$row=mysqli_fetch_assoc($selectResult);
  $Userid=$row['userid'];



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
    <title>profile</title>
  </head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 

    <div class="row w-100 ">
        <div class="col-md-2 ">
             <?php
                if(isset($_SESSION['username'])){
                    $username=$_SESSION['username'];
                    
                }
                $sql="select * from users where username='$username'";
                $resultimg=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($resultimg);
                $userimg=$row['userimg'];
                $userid=$row['userid'];
                ?>
            <ul class="navbar-nav bg-light p-5 h-100 " >
                <li class="nav-item">
                    <img class="rounded-circle mx-auto w-100 " src=<?php echo $userimg ?> alt="">
                </li>

             
            
           
                 <li class="nav-item ">
                    <a href="#" class="nav-link text-dark"><h3 class=" text-center"> <?php echo $username ?></h3></a>
                </li>
                <li class="nav-item mt-4">
                    <a href="../index.php" class="nav-link">Home</a>
                </li>
               
                
                <li class="nav-item ">
                    <a href="profile.php?orders" class="nav-link">orders</a>
                </li>
           
                <li class="nav-item">
                    <a href="editAccount.php?userid=<?php echo $Userid?>" class="nav-link">edit account</a>
                </li>
                <li class="nav-item">
                <button  class="nav-link text-danger border-0 bg-transparent" data-toggle="modal" data-target="#deleteModal">delete account </button>

                </li>
            
                
                <li class="nav-item">
                    <a href="../logout.php" class="nav-link text-danger">logout</a>
                </li>
            </ul>

        </div>
        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
      </div>
      <div class="modal-body">
       <h5>Are you sure?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="deleteAccount.php?userid=<?php echo $Userid ?>" class="btn btn-danger">delete</a>
      </div>
    </div>
  </div>
</div>
   


        <div class="col-md-10"> 
            
          
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">orderid</th>
      <th scope="col">userid</th>
      <th scope="col">amount</th>
      <th scope="col">invoiceNumber</th>
      <th scope="col">totalProducts</th>
      <th scope="col">orderDate</th>
      <th scope="col">orderStatus</th>
      <th scope="col">confirmation</th>
    </tr>
  </thead><tbody>
            <?php
            $select="select * from userorders where userid=$Userid";
            $selectResult=mysqli_query($con,$select);
            $rowCount=mysqli_num_rows($selectResult);
            if($selectResult){
                while($row=mysqli_fetch_assoc($selectResult)){
                    $orderid=$row['orderid'];
                    $userid=$row['userid'];
                    $amount=$row['amount'];
                    $invoiceNumber=$row['invoiceNumber'];
                    $totalProducts=$row['totalProducts'];
                    $orderDate=$row['orderDate'];
                    $orderStatus=$row['orderStatus'];
                
                    echo ' <tr>
      <th scope="row">'.$orderid.'</th>
      <td>'.$userid.'</td>
      <td>'.$amount.'</td>
      <td>'.$invoiceNumber.'</td>
       <td>'.$totalProducts.'</td>
        <td>'.$orderDate.'</td>
          <td>'.$orderStatus.'</td>'
          ?>
          <?php 
          if($orderStatus=="pending"){
            echo ' <td><a href="confirmPayment.php?orderid='.$orderid.'" class="btn btn-outline-success">Confirm</a></td>
       </tr>';
          } else {
            echo '<td><button class="btn-success">Paid</button></td>
       </tr>';

          }
       

                }
            } 
             ?>
          
            
   
            </tbody></table>
              <h5 class="h5 text-start">orders:<?php echo $rowCount; ?></h5> 
                
        </div>
    </div>
    <!-- Button trigger modal -->


<!-- Modal -->



  





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>