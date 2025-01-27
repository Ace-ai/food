<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $deleteid=$_GET['deleteid'];
    $sql="delete from meal where mealid=$deleteid";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:dashboard.php');
    } else {
        echo "error";
    }

}


?>