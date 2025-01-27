<?php include '../connect.php';
include '../functions/common_functions.php';
session_start();
if(isset($_GET['orderid'])){
  $orderid=$_GET['orderid'];
  $select="select * from userorders where orderid=$orderid";
  $result=mysqli_query($con,$select);
  $row=mysqli_fetch_assoc($result);
  $invoiceNumber=$row['invoiceNumber'];
  $amount=$row['amount'];

}
if(isset($_POST['confirmPayment'])){
  $invoiceNumber=$_POST['invoiceNumber'];
  $amount=$_POST['amount'];
  $paymentMode=$_POST['paymentMode'];
  $insert="insert into userpayment(orderid,invoiceNumber,amount,paymentMode,date) values($orderid,$invoiceNumber,$amount,'$paymentMode',NOW()) ";
  $insertResult=mysqli_query($con,$insert);
  if($insertResult){
    header("location:profile.php");
  }
  $update="UPDATE userorders SET orderStatus='complete' where orderid=$orderid";
  $updateResult=mysqli_query($con,$update);

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
    <title>confirm payment</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  </head>
<body>
  <div class="container-fluid w-50 mx-auto">
    <h1 class="text-center mb-5">confirm payment</h1>
  <form action="" method="POST">
  <div class="form-group ">

    <input type="text" class="form-control w-25"  name="invoiceNumber" value="<?php echo $invoiceNumber; ?>"  required  readonly>
    
  </div>
  <div class="form-group mt-3">
    <label for="password">amount</label>
    <input type="text" class="form-control"  name="amount"  value="<?php echo $amount ?>" required>
  </div>

  <div class="form-group mt-3">
    <select class="form-select" name="paymentMode" id="combobox" required>
    <option value="paypal">paypal</option>
    <option value="cash">cash on delivery</option>

    </select>
  </div>
  <button type="submit" name="confirmPayment" class="btn btn-primary mt-3 w-100">confirm</button>
  
</form>
      



    </form>



  </div>

    
</body>
</html>