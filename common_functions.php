<?php
//include './connect.php';

 
 function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  

function addToCart(){
    global $con;
    if(isset($_GET['add_to_cart'])){
        $ip=getIPAddress();
        $mealid=$_GET['add_to_cart'];
        $sql="select * from cart where ipAdress='$ip' and mealid=$mealid";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
           header("location:index.php");
          
        } else{
            $sql="insert into cart(mealid,ipAdress,quantity)values($mealid,'$ip',0)";
            $result=mysqli_query($con,$sql);
            header("location:index.php");
        }
    }
}
function countRow(){
    global $con;
   $ip=getIPAddress();
            $sql="select * from cart where ipAdress='$ip'";
    $result=mysqli_query($con,$sql);
    if($result){
      $num=mysqli_num_rows($result);
    } if($num==0){
        echo 0;
    } else{
        echo $num;
    }
    

}
   


    

?>
