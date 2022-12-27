<?php

$pid=$_GET['pid'];

session_start();

$userid=$_SESSION['userid'];

include_once "..//shared/connection.php";
$cmd="insert into cart(pid,userid) values($pid,$userid)";

$sql_status=mysqli_query($conn,$cmd);

if($sql_status){
    echo "Added to Cart";
    header('location:view.php');
}
else{
    echo "Failed to Cart";
    echo mysqli_error($conn);
}
?>