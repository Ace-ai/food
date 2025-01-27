
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		$("#category").modal('show');
	});
</script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hello, world!</title>
  </head>
<body>
     <?php
include 'connect.php';
$GLOBALS['alert']='';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $categoryname=$_POST['categoryname'];
    $select="select * from category where categoryname='$categoryname'";
    $selectResult=mysqli_query($con,$select);
    if(mysqli_num_rows($selectResult)>0){
        $GLOBALS['alert']= '<div class="alert alert-danger mt-3" role="alert">'.$categoryname.' already exists</div>';
    }else{
         $sql="insert into category(categoryname) values('$categoryname')";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:dashboard.php'); 
    }
    }

 }
   

 ?>
<div class="modal fade" id="category" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">add category</h1>
        <a class="btn btn-danger" href="dashboard.php">back</a>
      </div>
      <div class="modal-body">
    <form action="category.php" method="POST" >
  <div class="mb-3">
    <label  class="form-label">category name</label>
    <input type="text" class="form-control" name="categoryname" >
  </div>
   <button class="btn btn-primary mt-2" type="submit">Submit</button>
   <?php echo $GLOBALS['alert']?>
</form>
      </div>
    </div>
  </div>
</div>

    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>