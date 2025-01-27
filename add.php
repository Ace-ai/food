<?php
include 'connect.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    $mealname=$_POST['mealname'];
    $mealdesc=$_POST['mealdesc'];
    $mealprice=$_POST['mealprice'];
    $mealimg=$_FILES['file'];
    $categoryid=$_POST['category'];
    $imageFileName=$mealimg['name'];
    $imageTemp=$mealimg['tmp_name'];
    $separator=explode('.',$imageFileName);
    $FileExtension=strtolower(end($separator));
    $extensions=array('jpeg','png','jpg');
    if(in_array($FileExtension,$extensions)){
          $upload='img/'.$imageFileName;
        move_uploaded_file($imageTemp,$upload);
    }

    $sql="insert into meal(mealname,mealimg,mealdesc,mealprice,categoryid) values('$mealname','$upload','$mealdesc','$mealprice',$categoryid);";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:dashboard.php'); 
    }

 }
   

 ?>