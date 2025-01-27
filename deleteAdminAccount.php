<?php
include '../connect.php';
if(isset($_GET['adminid'])){
    $adminid=$_GET['adminid'];
    $delete="delete from admins where adminid=$adminid";
    $result=mysqli_query($con,$delete);
    if($result){
        header("location:adminRegistration.php");
    }
}
?>