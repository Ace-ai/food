<?php
session_start();
include 'connect.php';

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
  <div class="loader"></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
    
    
    <div class="row w-100 ">
        <div class="col-md-2 ">
             <?php
                if(isset($_SESSION['adminname'])){
                    $adminname=$_SESSION['adminname'];
                        $sql="select * from admins where adminname='$adminname'";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($result);
                $adminid=$row['adminid'];
                $adminimg=$row['adminimg'];
                
                  }
                ?>
              
             
            <ul class="navbar-nav bg-dark p-5 h-100" >
                <li class="nav-item">
                    <img class="rounded-circle mx-auto w-100 " src="<?php echo $adminimg ?>" alt="">
                </li>

             
            
           
                 <li class="nav-item ">
                    <a href="#" class="nav-link text-light"><h3 class=" text-center"> <?php echo $adminname ?></h3></a>
                </li>
                <li class="nav-item mt-4">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
           
                <li class="nav-item">
                    <a href="admin/editAdminAccount.php?adminid=<?php echo $adminid?>" class="nav-link">edit account</a>
                </li>
                <li class="nav-item">
                <button  class="nav-link text-danger border-0 bg-transparent" data-toggle="modal" data-target="#deleteModal">delete account </button>

                </li>
            
                
                <li class="nav-item">
                    <a href="logout.php" class="nav-link text-danger">logout</a>
                </li>
            </ul>

        </div>
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
        <a href="admin/deleteAdminAccount.php?adminid=<?php echo $adminid ?>" class="btn btn-danger">delete</a>
      </div>
    </div>
  </div>
</div>
  
<div class="col-md-10">

    <div class="container-fluid mt-4">
    
      <?php
     
      $sql="select count(*) as count from meal";
      $result=mysqli_query($con,$sql);
      $row=mysqli_fetch_assoc($result);
       ?>
    <div class="card text-white bg-primary mb-3 rounded-5" style="max-width: 10rem;">
  <div class="card-header">number of rows</div>
  <div class="card-body">
    <h1 class="card-text text-center"><?php echo $row['count'] ?></h1>
  </div>
</div>
    </div>
    <hr>

    <div class="container-fluid ">
               <form action="search.php" method="get" >
         <input type="search" name="mealname" class="w-75 p-1 " placeholder="search anything...">
        <button type="submit" class="btn btn-primary mb-1">search</button>
      </form> 
        </div>
       <div class="container-fluid">
     
       <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">meal name</th>
      <th scope="col">meal desc</th>
      <th scope="col">meal price</th>
      <th scope="col">image</th>
      <th scope="col">category</th>
      <th scope="col">operation</th>
    </tr>
  </thead><tbody>
    <?php
 
    include 'connect.php';
    
    $sql="select * from meal";
    $result=mysqli_query($con,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $mealid=$row['mealid'];
            $mealname=$row['mealname'];
            $mealdesc=$row['mealdesc'];
            $mealimg=$row['mealimg'];
            $mealprice=$row['mealprice'];
            $categoryid=$row['categoryid'];
            echo ' 
    <tr>
      <th scope="row">'.$mealid.'</th>
      <td>'.$mealname.'</td>
      <td>'.$mealdesc.'</td>
      <td>'.$mealprice.'$</td>
       <td><img width="60px"height="60px" src='.$mealimg.'></td>
        <td>'.$categoryid.'</td>
       <td>
 <a  class="btn btn-primary m-1 " href="update.php?updateid='.$mealid.'">update</a>
  <a  class="btn btn-danger m-1 " href="delete.php?deleteid='.$mealid.'">delete</a>

     
    
 <a href="view.php?viewid='.$mealid.'"  class="btn btn-outline-primary m-1">view</a>




   

       </td>
    </tr>
 
  ';
        }
    }
?>
<?php

 ?>
    </tbody>  </table>

    <div class="button text-center">
    <a href="index.php" class="btn btn-primary"> Main page</a>
   
<button type="button" class="btn btn-primary" data-bs-target="#additem" data-bs-toggle="modal" >
 add meal
</button>
<button  class="btn btn-primary " data-bs-toggle="modal" >
 <a class=" nav-link text-light" href="category.php">add category</a>
</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" >
 view category
</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" >
<a class=" nav-link text-light" href="drink.php">add drink</a>
</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" >
 view drink
</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" >
 all payments
</button>
<button type="button" class="btn btn-primary" data-bs-target="#listUsers" data-bs-toggle="modal" >
 list users
</button>

</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="listUsers" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Users</h5>
       
      </div>
      <div class="modal-body">
      <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">userid</th>
      <th scope="col">user name</th>
      <th scope="col">user image</th>

    </tr>
  </thead><tbody>
    <?php
    $listusers="select * from users";
    $listUsersResult=mysqli_query($con,$listusers);
    $userCount=mysqli_num_rows($listUsersResult);
    if($listUsersResult){
      while($row=mysqli_fetch_assoc($listUsersResult)){
        $userid=$row['userid'];
        $username=$row['username'];
        $userimg=$row['userimg'];
        $userimg=str_replace("../","",$userimg);
        echo ' <tr>
      <th scope="row">'.$userid.'</th>
      <td>'.$username.'</td>
       <td><img width="60px"height="60px" class="rounded-circle" src='.$userimg.'></td> 
       </tr>';
      }
    }
    ?>
    </tbody></table>
    <p>users:<?php echo $userCount ?></p>
        
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="additem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">add item</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="add.php" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label  class="form-label">meal name</label>
    <input type="text" class="form-control" name="mealname" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label  class="form-label">meal description</label>
    <input type="text" name="mealdesc" class="form-control" required >
  </div>
  <div class="mb-3">
    <label  class="form-label">meal price</label>
    <input type="number" name="mealprice" class="form-control" required >
  </div>
  <div class="mb-3">
    <label  class="form-label">meal image</label>
    <input type="file" name="file" class="form-control" required >
  </div>
  <div class="mb-3">
    <select class="form-select" name="category" id="combobox" required>
      <?php
   
      $sql="select * from category";
      $result=mysqli_query($con,$sql);
      if($result){
        while($row=mysqli_fetch_assoc($result)){
          $categoryid=$row['categoryid'];
          $categoryname=$row['categoryname'];

          echo '  <option value="'.$categoryid.'">'.$categoryname.'</option>';
        }
      }
      ?>
    </select>
  </div>
 
 
  <button type="submit" class="btn btn-primary">Submit</button> 
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</form>
      </div>
    
    </div>
  </div>
</div>
<?php 
include 'connect.php';
$sql="select mealname,mealprice from meal;";
$result=mysqli_query($con,$sql);

foreach($result as $row){
    $mealnamearr[]=$row['mealname'];
    $mealpricearr[]=$row['mealprice'];
}




?>
  <h1 class="text-center mt-5">statistics</h1>
<div class="container-fluid w-50 mt-5">

  <canvas id="myChart"></canvas>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($mealnamearr) ?>,
      datasets: [{
        label: 'price of meals',
        data: <?php echo json_encode($mealpricearr) ?>,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

