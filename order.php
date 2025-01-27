<?php
include '../connect.php';
include '../functions/common_functions.php';
if(isset($_GET['userid'])){
  $userId=$_GET['userid'];
  echo $userId;
}
$userIp=getIPAddress();
$totalPrice=0;
$sql="select * from cart where ipAdress='$userIp'";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
$invoiceNumber=mt_rand(1,999);
$status="pending";
while($row=mysqli_fetch_assoc($result)){
  $mealid=$row['mealid'];
  $selectMeal="select * from meal where mealid=$mealid";
$result2=mysqli_query($con,$selectMeal);
while($rowMealPrice=mysqli_fetch_assoc($result2)){
  $mealPrice=array($rowMealPrice['mealprice']);
  $mealPriceValues=array_sum($mealPrice);
  $totalPrice+=$mealPriceValues;

}

}

$getQuantity="select * from cart";
$resultQuantity=mysqli_query($con,$getQuantity);
$getItemQuantity=mysqli_fetch_assoc($resultQuantity);
$quantity=$getItemQuantity['quantity'];
if($quantity==0){
  $quantity=1;
  $subtotal=$totalPrice;
} else {
  $quantity=$quantity;
  $subtotal=$quantity*$totalPrice;
}
$insertOrder="insert into userorders (userid,amount,invoiceNumber,totalProducts,
orderDate,orderStatus) values($userId,$subtotal,$invoiceNumber,$count,NOW(),'$status')";
$resultOrder=mysqli_query($con,$insertOrder);
if($result){

}
$insertPendingOrder="insert into orderpending (userid,invoiceNumber,mealid,quantity,orderStatus) values($userId,$invoiceNumber,$mealid,$quantity,'$status')";
$resultPendingOrder=mysqli_query($con,$insertPendingOrder);


$delete="delete from cart where ipAdress='$userIp'";
$deleteResult=mysqli_query($con,$delete);

?>
