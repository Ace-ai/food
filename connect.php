<?php
$servername="localhost";
$user="root";
$password="";
$database="food";
$con=mysqli_connect($servername,$user,$password,$database);
if(!$con){
    echo "not connected";
}
 ?>