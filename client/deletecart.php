<?php

$cartid=$_GET['cartid'];
include_once "../shared/connection.php";

$cmd="delete from cart where cartid=$cartid";

$sql_result=mysqli_query($conn,$cmd);

if($sql_result)
{
    header('location:view_cart.php');
}
else{
    echo "Failed to remove from cart";
    echo mysqli_error($conn);
}
?>