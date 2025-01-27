<?php
include '../connect.php';
if(isset($_GET['userid'])){
    $userid=$_GET['userid'];
    $delete="delete from users where userid=$userid";
    $result=mysqli_query($con,$delete);
    if($result){
        session_start();
session_unset();
session_destroy();

        header("location:../index.php");
    }

}

?>